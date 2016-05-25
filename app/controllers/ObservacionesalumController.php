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

}

