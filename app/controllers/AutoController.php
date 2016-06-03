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
}

