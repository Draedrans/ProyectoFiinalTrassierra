<?php

class ComentariosController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle("Comentarios");
        parent::initialize();
        $this->view->setVar("admin", $this->session->get("auth")["is_admin"]);
        $this->assets->addJs("js/modals.js");
    }

    public function editAction($date)
    {
        $Incidencia=Comentarios::findFirst(array(
            'date = '=>$date,
            'users_username = '=> $this->session->get("auth")["username"]
        ));
//        $Incidencia->;
        $Incidencia->users_username=$this->session->get("auth")["username"];
        $this->view->form = new ComentariosForm($Incidencia, array('edit' => true));
        $this->view->setVar("NIE", $Incidencia->alumnos_NIE);
    }

    public function saveAction()
    {

    }

    public function newAction($NIE)
    {
        $Incidencia=new Comentarios();
        $Incidencia->alumnos_NIE=$NIE;
        $Incidencia->users_username=$this->session->get("auth")["username"];
        $this->view->form = new ComentariosForm($Incidencia, array('create' => true));
        $this->view->setVar("NIE", $NIE);
    }

    public function createAction()
    {

    }

}

