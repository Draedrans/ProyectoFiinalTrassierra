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
        $NIE = $this->request->getPost("alumnos_NIE");
        $Necesidad= new Necesidades();
        $Necesidad->alumnos_NIE=$NIE;
        $Necesidad->NEE= $this->request->getPost("NEE");
        $Necesidad->MedRec= $this->request->getPost("MedRec");
        $Necesidad->Tipo= $this->request->getPost("Tipo");
        $Necesidad->save();
        $this->flash->success("Necesidad añadida");
        return $this->response->redirect("alumnos/verNecesidades/$NIE");
    }

    public function deleteAction()
    {
        $NIE = $this->request->get("alumnos_NIE");
        $NEE= $this->request->get("NEE");
        $MedRec= $this->request->get("MedRec");
        $Tipo= $this->request->get("Tipo");
        $Necesidad=Necesidades::findFirst(array(
            "(alumnos_NIE = :NIE:) AND (NEE = :NEE:) AND (MedRec = :MedRec:)",
            'bind' => array('NIE' => $NIE, 'NEE' => $NEE, 'MedRec' => $MedRec)
        ));
        $this->view->setVar("NEE", $NEE);
        $this->view->setVar("MedRec", $MedRec);
        $this->view->setVar("Tipo", $Tipo);
        $this->view->setVar("need", $Necesidad);
        $Necesidad->delete();
        return $this->response->redirect("alumnos/verNecesidades/$NIE");
    }


}

