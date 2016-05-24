<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class AlumnosController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle("Student");
        parent::initialize();
        $this->view->setVar("admin", $this->session->get("auth")["is_admin"]);
        $this->assets->addJs("js/modals.js");
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
        $this->view->form = new AlumnosForm();
    }

    /**
     * Searches for users
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Alumnos', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "apellidos";

        $alumnos = Alumnos::find($parameters);
        if (count($alumnos) == 0) {
            $this->flash->notice("The search did not find any levels");

            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }
        $paginator = new Paginator(array(
            "data" => $alumnos,
            "limit" => 3,
            "page" => $numberPage
        ));
        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        $this->view->form = new AlumnosForm(null, array('create' => true));
    }

    /**
     * Edits a user
     *
     * @param string $username
     */
    public function editAction($NIE)
    {
        if (isset($NIE)) {
            if (!$this->request->isPost()) {

                $alumno = Alumnos::findFirst($NIE);
                if (!$alumno) {
                    $this->flash->error("Alumno no encontrado");

                    /** @noinspection PhpVoidFunctionResultUsedInspection */
                    return $this->dispatcher->forward(array(
                        "controller" => "alumnos",
                        "action" => "index"
                    ));
                }

                $this->view->form = new AlumnosForm($alumno, array('edit' => true));

            }

        } else
            return $this->response->redirect("alumnos/index");
    }

    /**
     * Creates a new user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }

        $alumno = new Alumnos();

        $alumno->NIE = $this->request->getPost("NIE");

        $foundAlumno = Alumnos::findFirst($alumno->NIE);
        if ($foundAlumno) {
            $this->flash->error("El usuario ya existe");
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->forward("alumnos/new");
        }

        $form = new AlumnosForm(null, array('create' => true));
        if (!$form->isValid($_POST)) {
            $this->flash->error($form->getMessages());
            $this->forward("alumnos/new");
        } else {
            $alumno->apellidos = $this->request->getPost("apellidos");
            $alumno->Nombre = $this->request->getPost("Nombre");
            $alumno->Direccion = $this->request->getPost("Direccion");
            $alumno->DNI = $this->request->getPost("DNI");
            $alumno->Fecna = $this->request->getPost("Fecna");
            $alumno->Localidad = $this->request->getPost("Localidad");
            $alumno->Provincia = $this->request->getPost("Provincia");
            $alumno->Lugna = $this->request->getPost("Lugna");
            $alumno->Pasaporte = $this->request->getPost("Pasaporte");
            $alumno->UltimaMatricula = date("Y");
            $alumno->Tlf = $this->request->getPost("Tlf");
            $alumno->TlfUrg = $this->request->getPost("TlfUrg");
            $alumno->Tutor=$this->request->getPost("Tutor");
            if (!$alumno->save()) {
                foreach ($alumno->getMessages() as $message) {
                    $this->flash->error($message);
                }

                /** @noinspection PhpVoidFunctionResultUsedInspection */
                return $this->dispatcher->forward(array(
                    "controller" => "alumnos",
                    "action" => "new"
                ));
            }

            $this->flash->success("El alumno ha sido creado");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }
        $this->view->form = $form;
    }


    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }


        $NIE = $this->request->getPost("NIE");
        $alumno = Alumnos::findFirst($NIE);
        if (!$alumno) {
            $this->flash->error("El NIE no está registrado");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }
        $form = new AlumnosForm($alumno, array('edit' => true));
        if (!$form->isValid($_POST)) {
            $this->flash->error($form->getMessages()[0]);
            $this->forward("alumnos/edit/ $alumno->NIE");
        } else {
            $alumno->NIE=$this->request->getPost("NIE");
            $alumno->apellidos = $this->request->getPost("apellidos");
            $alumno->Nombre = $this->request->getPost("Nombre");
            $alumno->Direccion = $this->request->getPost("Direccion");
            $alumno->DNI = $this->request->getPost("DNI");
            $alumno->NIE = $this->request->getPost("NIE");
            $alumno->Fecna = $this->request->getPost("Fecna");
            $alumno->Localidad = $this->request->getPost("Localidad");
            $alumno->Provincia = $this->request->getPost("Provincia");
            $alumno->Lugna = $this->request->getPost("Lugna");
            $alumno->Pasaporte = $this->request->getPost("Pasaporte");
            $alumno->Tlf = $this->request->getPost("Tlf");
            $alumno->TlfUrg = $this->request->getPost("TlfUrg");
            $alumno->UltimaMatricula = $this->request->getPost("UltimaMatricula");
            $alumno->Tutor=$this->request->getPost("Tutor");
            if (!$alumno->save()) {
                foreach ($alumno->getMessages() as $message) {
                    $this->flash->error($message);
                }
                /** @noinspection PhpVoidFunctionResultUsedInspection */
                return $this->dispatcher->forward(array(
                    "controller" => "alumnos",
                    "action" => "edit",
                    "params" => array($alumno->NIE)
                ));
            } else {
                $form->clear(array(
                    'NIE', 'apellidos', 'Nombre', 'Direccion', 'DNI', 'Fecna', 'Localidad', 'Provincia', 'Lugna', 'Pasaporte', 'Tlf', 'TlfUrg'
                ));
                return $this->response->redirect("alumnos/verPerfil/$NIE");
            }

            $this->flash->success("El alumno ha sido actualizado");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
        }
        return $this->response->redirect("alumnos/verPerfil/$NIE");
        $this->view->form = $form;

    }

    /**
     * Deletes a user
     *
     * @param string $username
     */
    public function deleteAction($NIE)
    {
        $alumno = Alumnos::findFirst($NIE);
        if (!$alumno) {
            $this->flash->error("Alumno no encontrado");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }

        if (!$alumno->delete()) {

            foreach ($alumno->getMessages() as $message) {
                $this->flash->error($message);
            }

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "search"
            ));
        }

        $this->flash->success("Alumno borrado");

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->dispatcher->forward(array(
            "controller" => "alumnos",
            "action" => "index"
        ));
    }
    public function verPerfilAction($NIE){
        $alumno=Alumnos::findFirst($NIE);
        $this->view->setVar("alumno",$alumno);
    }
    
    public function verObservaciones($NIE){
        $alumno=Alumnos::findFirst($NIE);
        $this->view->setVar("alumno",$alumno);
        $observaciones=Observacionesalum::findByalumnos_NIE($NIE);
        $this->view->setVar("observaciones",$observaciones);
        $this->view->setVar("Tutor", $this->session->get("auth")["username"]);
        
    }
        

}
