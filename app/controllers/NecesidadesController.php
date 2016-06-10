<?php

class NecesidadesController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle("Needs");
        parent::initialize();
        $this->view->setVar("admin", $this->session->get("auth")["is_admin"]);
        $this->assets->addJs("js/modals.js");
    }


    public function newAction($NIE)
    {
        $this->assets->addJs("js/form.js");
        $Necesidad= new Necesidades();
        $Necesidad->alumnos_NIE=$NIE;
        $this->view->form= new NecesidadesForm($Necesidad);
    }

    public function saveAction()
    {

    }

    public function deleteAction()
    {

    }


}

