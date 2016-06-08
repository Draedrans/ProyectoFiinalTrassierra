<?php

class FamiliaController extends \Phalcon\Mvc\Controller
{

    
    
    public function initialize()
    {
        $this->tag->setTitle("Student");
        parent::initialize();
        $this->view->setVar("admin", $this->session->get("auth")["is_admin"]);
        $this->assets->addJs("js/modals.js");
    }

    public function editAction($ID)
    {
        $familiar = Familiares::findFirst($ID);
        $this->view->form = new FamiliaForm($familiar, array('photo' => true));
    }
    
    public function editalumAction()
    {
        $familiar = Familiares::findFirst($ID);
        $this->view->form = new FamiliaForm($familiar, array('photo' => true));
    }


}

