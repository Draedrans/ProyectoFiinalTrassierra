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
        $Incidencia = Comentarios::findFirstBydate($date);
        if (!$Incidencia) {
            $this->flash->error("Incidencia no encontrada");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }
        $Incidencia->users_username = $this->session->get("auth")["username"];
        $this->view->form = new ComentariosForm($Incidencia, array('edit' => true));
        $this->view->setVar("NIE", $Incidencia->alumnos_NIE);
    }

    public function saveAction()
    {
        if (!$this->request->isPost()) {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "verIncidencias"
            ));
        }
        $date = $this->request->getPost("date");
        $Incidencia = Comentarios::findFirstBydate($date);
        if (!$Incidencia) {
            $this->flash->error("Incidencia no encontrada");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }
        $form = new ComentariosForm($Incidencia, array('edit' => true));
        if (!$form->isValid($_POST)) {
            $this->flash->error($form->getMessages()[0]);
            $this->forward("alumnos/index");
        }
        $Incidencia->alumnos_NIE = $this->request->getPost("alumnos_NIE");
        $Incidencia->acceso = $this->request->getPost("acceso");
        $Incidencia->Incidencia = $this->request->getPost("Incidencia");
        $Incidencia->Moitivo = $this->request->getPost("Moitivo");
        $Incidencia->Asistentes = $this->request->getPost("Asistentes");
        $Incidencia->Acuerdos = $this->request->getPost("Acuerdos");
        $Incidencia->date = $this->request->getPost("date");
        $Incidencia->users_username = $this->request->getPost("users_username");
        if (!$Incidencia->save()) {
            foreach ($Incidencia->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "verIncidencias",
                "params" => array($Incidencia->alumnos_NIE)
            ));
        } else {
            $form->clear(array(
                'alumnos_NIE', 'Incidencia', 'acceso', 'date', 'users_username', 'Moitivo', 'Asistentes', 'Acuerdos'
            ));
            return $this->response->redirect("alumnos/verIncidencias/$Incidencia->alumnos_NIE");
        }

        $this->flash->success("Incidencia actualizada");

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->response->redirect("alumnos/verIncidencias/$Incidencia->alumnos_NIE");
        $this->view->form = $form;
    }


    public function newAction($NIE)
    {
        $Incidencia = new Comentarios();
        $Incidencia->alumnos_NIE = $NIE;
        $Incidencia->users_username = $this->session->get("auth")["username"];
        $this->view->form = new ComentariosForm($Incidencia, array('create' => true));
        $this->view->setVar("NIE", $NIE);
    }

    public function createAction($NIE)
    {
        if (!$this->request->isPost()) {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "verIncidencias"
            ));
        }
        $Incidencia = new Comentarios();
        $Incidencia->users_username = $this->session->get("auth")["username"];
        $Incidencia->date = date("Y-m-d H:i:s");
        $Incidencia->alumnos_NIE = $this->request->getPost("alumnos_NIE");
        $Incidencia->acceso = $this->request->getPost("acceso");
        $Incidencia->Incidencia = $this->request->getPost("Incidencia");
        $Incidencia->Moitivo = $this->request->getPost("Moitivo");
        $Incidencia->Asistentes = $this->request->getPost("Asistentes");
        $Incidencia->Acuerdos = $this->request->getPost("Acuerdos");
        $form = new ComentariosForm(null, array('create' => true));
        if (!$form->isValid($_POST)) {
            $this->flash->error($form->getMessages()[0]);
            return $this->response->redirect("alumnos/verIncidencias/$Incidencia->alumnos_NIE");

        }
        if (!$Incidencia->save()) {
            foreach ($Incidencia->getMessages() as $message) {
                $this->flash->error($message);

            }
        }
        return $this->response->redirect("alumnos/verIncidencias/$Incidencia->alumnos_NIE");

    }

}

