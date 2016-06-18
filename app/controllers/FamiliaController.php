<?php

class FamiliaController extends ControllerBase
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
        $this->view->form = new FamiliaForm($familiar, null);
        $this->view->setVar("ID", $ID);
    }



    public function deletefamiliarAction($ID)
    {
        $familiar = Familiares::findFirst($ID);
        $NIE=$familiar->alumnos_NIE;
        if ($familiar->delete()) {
            $this->flash->success("El familiar ha sido borrado");
        }
        return $this->response->redirect("alumnos/verFamilia/$NIE");
    }

    public function deleteAction()
    {
        $NIE=$this->request->get("NIE");
        $aNIE=$this->request->get("aNIE");
        $familiar=Famalumno::findFirst(array(
            '(alumnos_NIE = :NIE:) AND (alumnos_NIE_Familiar = :aNIE:)',
            'bind' => array('NIE' => $NIE, 'aNIE' => $aNIE)
        ));
        $familiar->delete();
        return $this->response->redirect("alumnos/verFamilia/$NIE");
    }

    public function editalumAction()
    {
        $NIE=$this->request->get("NIE");
        $aNIE=$this->request->get("aNIE");
        $familiar=Famalumno::findFirst(array(
            '(alumnos_NIE = :NIE:) AND (alumnos_NIE_Familiar = :aNIE:)',
            'bind' => array('NIE' => $NIE, 'aNIE' => $aNIE)
        ));
        $alumnos=Alumnos::find();
        $this->view->setVar("alumnos",$alumnos);
        $this->view->setVar("NIE",$NIE);
        $this->view->setVar("aNIE",$aNIE);
        $this->view->form = new FamalumnoForm($familiar, null);
    }

    public function saveAction()
    {
        $familiar=new Famalumno();
        $familiar->alumnos_NIE=$this->request->getPost("alumnos_NIE");
        $NIE=$this->request->getPost("alumnos_NIE");
        $familiar->alumnos_NIE_Familiar=$this->request->getPost("alumnos_NIE_Familiar");
        $familiar->Relacion=$this->request->getPost("Relacion");
        if ($familiar->save()) {
            $this->flash->success("Relacion creada");
        }
        return $this->response->redirect("alumnos/verFamilia/$NIE");
    }
    public function savefamiliarAction()
    {
        $familiar=new Familiares();
        $ID=$this->request->getPost("Fam_ID");
            $familiar->Fam_ID=$ID;
        $familiar->alumnos_NIE=$this->request->getPost("alumnos_NIE");
        $familiar->Nombre=$this->request->getPost("Nombre");
        $familiar->apellidos=$this->request->getPost("apellidos");
        $familiar->Relacion=$this->request->getPost("Relacion");
        $familiar->Localidad=$this->request->getPost("Localidad");
        $familiar->DNI=$this->request->getPost("DNI");
        $familiar->Fecna=$this->request->getPost("Fecna");
        $familiar->Tlf=$this->request->getPost("Tlf");
        $familiar->Direccion=$this->request->getPost("Direccion");
        $NIE=$this->request->getPost("alumnos_NIE");
        if ($familiar->save()) {
            $this->flash->success("Familiar creado");
        }
        return $this->response->redirect("alumnos/verFamilia/$NIE");
    }


    public function createAction($NIE)
    {
        $alumnos=Alumnos::find();
        $this->view->setVar("alumnos",$alumnos);
        $familiar=new Famalumno();
        $familiar->alumnos_NIE=$NIE;
        $this->view->form = new FamalumnoForm($familiar, null);
    }

    public function newAction($NIE){
        $familiar=new Familiares();
        $familiar->alumnos_NIE=$NIE;
        $this->view->form = new FamiliaForm($familiar, null);
    }

}

