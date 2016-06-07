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

    public function addexpedienteAction($NIE)
    {
        $alumno = Alumnos::findFirst($NIE);
        $this->view->form = new AutoForm($alumno, array('photo' => true));
    }

    public function uploadexpedienteAction()
    {
        $form = new AutoForm(null, array('photo' => true));
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                if ($this->request->hasFiles()) {
                    $uploads = $this->request->getUploadedFiles();
                    foreach ($uploads as $file) {
                        $fila = 1;
                        $counterino = 0;
                        $wrongerino = 0;
                        if (($gestor = fopen($file->getTempName(), "r")) !== FALSE) {
                            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                                $numero = count($datos);
                                if ($fila > 1) {
                                    $NIE = $this->request->getPost("NIE");
                                    $alumno = Alumnos::findFirst($NIE);
                                    if ($alumno) {
                                        if (\ForceUTF8\Encoding::toUTF8($datos[6])=="Ordinaria") {
                                            $xp = new Expediente();
                                            $xp->alumnos_NIE = $NIE;
                                            $xp->year = \ForceUTF8\Encoding::toUTF8($datos[2]);
                                            $xp->curso = \ForceUTF8\Encoding::toUTF8($datos[1]);
                                            $xp->asignatura = \ForceUTF8\Encoding::toUTF8($datos[5]);
                                            $xp->centro = \ForceUTF8\Encoding::toUTF8($datos[3]);
                                            $xp->calificacion = \ForceUTF8\Encoding::toUTF8($datos[7]);
                                            if ($xp->save()) {
                                                $counterino++;
                                            }else{
                                                $wrongerino++;
                                            }
                                        }
                                    }
                                }
                                $fila++;
                            }
                            fclose($gestor);
                            $this->flash->success("$counterino asignaturas añadidas");
                            if ($wrongerino > 0) {
                                $this->flash->error("$wrongerino asignaturas con fallos");
                            }

                        }
                    }
                    return $this->response->redirect("alumnos/verExpediente/$NIE");
                }
            }
        }
    }

    public function addAction()
    {
        $this->view->form = new AutoForm(null, array('create' => true));
    }

    public function endsWith($haystack, $needle)
    {
        // funcion endsWith como seria en Java/vb.net
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }

    public function addphotoAction($NIE)
    {
        $alumno = Alumnos::findFirst($NIE);
        $this->view->form = new AutoForm($alumno, array('photo' => true));
    }

    public function uploadphotoAction()
    {
        $form = new AutoForm(null, array('photo' => true));
        if ($this->request->isPost()) {
            $NIE = $this->request->getPost("NIE");
            if ($form->isValid($this->request->getPost())) {
                if ($this->request->hasFiles()) {
                    $uploads = $this->request->getUploadedFiles();
                    foreach ($uploads as $file) {
                        $photo = Fotos::findFirst($NIE);
                        if ($photo) {
                            chmod("/var/www/html/orientacion/public/photos/", 0777);
                            unlink("/var/www/html/orientacion/public/photos/" . $photo->Direccion);
                            chmod("/var/www/html/orientacion/public/photos/", 0755);
                        } else {
                            $photo = new Fotos();
                        }
                        $Nombre = substr($file->getName(), strrpos($file->getName(), "."));
                        $photo->alumnos_NIE = $NIE;
                        $photo->Direccion = ($NIE . $Nombre);
                        $file->moveTo("/var/www/html/orientacion/public/photos/" . $NIE . $Nombre);
                        if (!$photo->save()) {
                            $this->flash->error("fallo al guardar los datos");
                            return $this->response->redirect("auto/addphoto/$NIE");
                        }
                        $this->flash->success("foto guardada correctamente");
                        return $this->response->redirect("alumnos/verPerfil/$NIE");
                    }
                }
            }
            $this->flash->error($form->getMessages()[0]);
            return $this->response->redirect("auto/addphoto/$NIE");
        }

    }


    public function uploadAction()
    {
        $form = new AutoForm(null, array('create' => true));
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                if ($this->request->hasFiles()) {
                    $uploads = $this->request->getUploadedFiles();
                    foreach ($uploads as $file) {
                        $fileName = $file->getName();
                        $temporaryName = $file->getTempName();
                        $fila = 1;
                        $counterino = 0;
                        $wrongerino = 0;
                        if (($gestor = fopen($file->getTempName(), "r")) !== FALSE) {
                            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                                $numero = count($datos);
                                if ($fila > 1) {
                                    $alumno = new Alumnos();
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
                                        $matricula = new Mtrassierra();
                                        $matricula->Alumnos_NIE = $alumno->NIE;
                                        $matricula->Year = $alumno->UltimaMatricula;
                                        $matricula->Curso = $alumno->CursoActual;
                                        $matricula->Repite = (\ForceUTF8\Encoding::toUTF8($datos[30]) != "1");
                                        $matricula->save();
                                    } else {
                                        $wrongerino++;
                                    }
                                }
                                $fila++;
                            }
                            fclose($gestor);
                            $this->flash->success("$counterino alumnos guardados");
                            if ($wrongerino > 0) {
                                $this->flash->error("$wrongerino alumnos no guardados");
                            }

                        }
                    }
                    return $this->response->redirect("auto");
                }
            }
        }
    }
}

