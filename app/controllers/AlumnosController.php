<?php

class AlumnosController extends \Phalcon\Mvc\Controller
{

    public function initialize()
    {
        $this->tag->setTitle("Alumnos");
        parent::initialize();
        $this->view->setVar("admin", $this->session->get("auth")["is_admin"]);
        $this->assets->addJs("js/modals.js");
    }

    public function indexAction()
    {
        $this->persistent->parameters = null;
        $this->view->form = new UsersForm();
    }

}

