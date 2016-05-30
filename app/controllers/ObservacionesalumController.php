<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ObservacionesalumController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle('Observaciones');
        parent::initialize();
    }

    public function editAction($ID)
    {
        if (isset($ID)) {
            $observacion = ObservacionesAlum::findFirst($ID);
            $this->view->setVar("NIE", $observacion->alumnos_NIE);
            if (!$this->request->isPost()) {
                if (!$observacion) {
                    $this->flash->error("Observacion no encontrada");

                    /** @noinspection PhpVoidFunctionResultUsedInspection */
                    return $this->dispatcher->forward(array(
                        "controller" => "alumnos",
                        "action" => "verObservaciones",
                        "params" => $ID
                    ));
                }

                $this->view->form = new ObservacionesalumForm($observacion, array('edit' => true));

            }

        } else
            return $this->response->redirect("alumnos/");
    }


    public function newAction($NIE)
    {
        $this->view->setVar("NIE", $NIE);
        $Observacion = new ObservacionesAlum();
        $Observacion->alumnos_NIE = $NIE;
        $this->view->form = new ObservacionesalumForm($Observacion, array('edit' => true));
    }

    public function createAction($NIE)
    {
        if (!$this->request->isPost()) {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }

        $Observacion = new ObservacionesAlum();
        $Observacion->Observacion = $this->request->getPost("Observacion");
        $Observacion->Acceso = $this->request->getPost("Acceso");
        $Observacion->alumnos_NIE = $this->request->getPost("alumnos_NIE");
        if (!$Observacion->save()) {
            foreach ($Observacion->getMessages() as $message) {
                $this->flash->error($message);
            }
        }
    }

    public function saveAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        } else {
            $ID = $this->request->getPost("ID");
            $Observacion = ObservacionesAlum::findFirst($ID);
            if (!$Observacion) {
                $this->flash->error("La Observacion no existe");

                /** @noinspection PhpVoidFunctionResultUsedInspection */
                return $this->dispatcher->forward(array(
                    "controller" => "alumnos",
                    "action" => "index"
                ));
            }
            $form = new ObservacionesalumForm($Observacion, array('edit' => true));
            if (!$form->isValid($_POST)) {
                $this->flash->error($form->getMessages()[0]);
                $this->forward("observacionesalum/edit/$ID");
            } else {
                $Observacion->ID = $ID;
                $Observacion->alumnos_NIE = $this->request->getPost("alumnos_NIE");
                $Observacion->Acceso = $this->request->getPost("Acceso");
                $Observacion->Observacion = $this->request->getPost("Observacion");
                if (!$Observacion->save()) {
                    foreach ($Observacion->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    /** @noinspection PhpVoidFunctionResultUsedInspection */
                    return $this->dispatcher->forward(array(
                        "controller" => "alumnos",
                        "action" => "verObservaciones",
                        "params" => array($Observacion->alumnos_NIE)
                    ));
                } else {
                    $form->clear(array(
                        'alumnos_NIE', 'Observacion', 'Acceso', 'ID'
                    ));
                    return $this->response->redirect("alumnos/verObservaciones/$Observacion->alumnos_NIE");
                }

                $this->flash->success("Observacion ha sido actualizada");

                /** @noinspection PhpVoidFunctionResultUsedInspection */
            }
            return $this->response->redirect("alumnos/verObservaciones/$Observacion->alumnos_NIE");
            $this->view->form = $form;

        }
    }
}

