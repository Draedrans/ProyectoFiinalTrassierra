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
        $path = '/orientacion/library/csv/';
        $form = new AutoForm(null, array('create' => true));
        if ($this->request->isPost()) {
            $this->flash->notice("Pasa el post");
            if ($form->isValid($this->request->getPost())) {
                $this->flash->notice("Pasa el form validation");
                if ($this->request->hasFiles()) {
                    $this->flash->notice("Pasa el tiene archivo");
                    foreach ($this->request->getUploadedFiles(true) as $file) {
                        $this->flash->notice("coge el archivo");
                        /* @var $file \Phalcon\Http\Request\FileInterface */
                        $fileName = $file->getName();
                        $temporaryName = $file->getTempName();
                        if ($file->moveTo($path . "archivo.csv") and endsWith($file->getTempName(),".csv")) {
                            $this->flash->success("archivo subido correctamente");
                            $fileIsLocatedAt = $path . "archivo.csv";
                        } else {
                            $this->flash->notice("Ha explotado un poquito");
                            // Oops, there's been a problem uploading.
                        }
                    }
                }
            }
        }
    }
}

