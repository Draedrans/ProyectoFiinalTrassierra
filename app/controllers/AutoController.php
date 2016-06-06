<?php


class AutoController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle("Student");
        parent::initialize();
        $this->view->setVar("admin", $this->session->get("auth")["is_admin"]);
        $this->assets->addJs("js/modals.js");
    }

    public function indexAction()
    {

    }

    public function addAction()
    {
        $this->view->form = new AutoForm(null, array('create' => true));
    }

    public function endsWith($haystack, $needle)
    {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }

    public function uploadAction()
    {
        $form = new AutoForm(null, array('create' => true));
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                if ($this->request->hasFiles()) {
                    $uploads = $this->request->getUploadedFiles();
                    $kaboom = array();
                    foreach ($uploads as $file) {
                        $this->flash->notice("coge el archivo");
                        /* @var $file \Phalcon\Http\Request\FileInterface */
                        $fileName = $file->getName();
                        $temporaryName = $file->getTempName();
                        $fila = 1;
                        $counterino = 0;
                        $wrongerino = 0;
                        if (($gestor = fopen($file->getTempName(), "r")) !== FALSE) {
                            $this->flash->notice("Abre el tiene archivo");
                            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                                $numero = count($datos);
                                if ($fila > 1) {
                                    $alumno = new Alumnos();
                                    array_push($kaboom, array(\ForceUTF8\Encoding::toUTF8($datos[14])));
                                    $alumno->NIE = \ForceUTF8\Encoding::toUTF8($datos[2]);
                                    $alumno->DNI = \ForceUTF8\Encoding::toUTF8($datos[3]);
                                    $alumno->Direccion = \ForceUTF8\Encoding::toUTF8($datos[4]);
                                    $alumno->Localidad = \ForceUTF8\Encoding::toUTF8($datos[6]);
                                    $alumno->Fecna = \ForceUTF8\Encoding::toUTF8(substr($datos[7], 6, 4) . "-" . substr($datos[7], 3, 2) . "-" . substr($datos[7], 0, 2));
                                    $alumno->Provincia = \ForceUTF8\Encoding::toUTF8($datos[8]);
                                    $alumno->Tlf = \ForceUTF8\Encoding::toUTF8($datos[9]);
                                    $alumno->TlfUrg = \ForceUTF8\Encoding::toUTF8($datos[10]);
                                    $alumno->Tutor = $this->request->getPost("Tutor");
                                    $alumno->CursoActual = \ForceUTF8\Encoding::toUTF8($datos[14]);
                                    $alumno->apellidos = \ForceUTF8\Encoding::toUTF8(trim($datos[15] . " " . $datos[16]));
                                    $alumno->Nombre = \ForceUTF8\Encoding::toUTF8($datos[17]);
                                    $alumno->Lugna = \ForceUTF8\Encoding::toUTF8($datos[28]);
                                    $alumno->UltimaMatricula = \ForceUTF8\Encoding::toUTF8($datos[29]);
                                    if ($alumno->save()) {
                                        $counterino++;
                                    } else {
                                        $wrongerino++;
                                    }
                                }
                                $fila++;
                            }
                            fclose($gestor);
                            $this->flash->success("$counterino alumnos guardados");
                            if ($wrongerino>0) {
                                $this->flash->error("$wrongerino alumnos no guardados");
                            }
                        }
                    }
                }
                $this->view->setVar("kaboom", $kaboom);
            }
        }
    }
}

