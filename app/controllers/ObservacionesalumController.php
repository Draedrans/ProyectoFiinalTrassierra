<?php

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
            if (!$this->request->isPost()) {
                $observacion = ObservacionesAlum::findFirst($ID);
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
            return $this->response->redirect("alumnos/verObservaciones/$ID");
    }


    public function newAction($NIE)
    {
        $Observacion=new ObservacionesAlum();
        $Observacion-$NIE=$NIE;
        $this->view->form = new ObservacionesalumForm($Observacion, array('edit' => true));
    }



    public function saveAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }
        $ID=$this->request->getPost("ID");
        if(!$ID or $ID==0 or ID==""){
            echo "holi";
        }
    }

}

