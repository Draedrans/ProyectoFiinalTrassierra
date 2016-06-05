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

    public function endsWith($haystack, $needle) {
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
                    $kaboom=array();
                    foreach ($uploads as $file) {
                        $this->flash->notice("coge el archivo");
                        /* @var $file \Phalcon\Http\Request\FileInterface */
                        $fileName = $file->getName();
                        $temporaryName = $file->getTempName();
                        $fila=1;
                        if (($gestor = fopen($file->getTempName(), "r")) !== FALSE) {
                            $this->flash->notice("Abre el tiene archivo");
                            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                                $numero = count($datos);
                                if ($fila>1) {
                                    array_push($kaboom, array($datos[2],$datos[3]));
                                }
                                $fila++;
                            }
                            fclose($gestor);
                        }
                    }
                }
                $this->view->setVar("kaboom", $kaboom);
            }
        }
    }
}

