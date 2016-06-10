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


    public function indexAction()
    {

    }

}

