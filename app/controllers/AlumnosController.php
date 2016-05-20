<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class AlumnosController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle("Manage users");
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
                        "controller" => "users",
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
//            Imprime solo el primer mensaje
            $this->flash->error($form->getMessages()[0]);
            /*            foreach ($form->getMessages() as $message) {
                            $this->flash->error($message);
                            break;
                        }*/
            $this->forward("alumnos/new");
        } else {
            $alumno->apellidos = $this->request->getPost("apellidos");
            $alumno->Nombre = $this->request->getPost("nombre");
            $alumno->Direccion = $this->request->getPost("direccion");
            $alumno->DNI = $this->request->getPost("DNI");
            $alumno->Fecna = $this->request->getPost("fecna");
            $alumno->Localidad = $this->request->getPost("localidad");
            $alumno->Provincia = $this->request->getPost("provincia");
            $alumno->Lugna = $this->request->getPost("lugna");
            $alumno->Pasaporte = $this->request->getPost("pass");
            $alumno->UltimaMatricula = date("Y");
            $alumno->Tlf = $this->request->getPost("tlf");
            $alumno->TlfUrg = $this->request->getPost("tlfurg");
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
        $apellidos = $alumno->apellidos;
        $nombre = $alumno->Nombre;
        $direccion = $alumno->Direccion;
        $DNI = $alumno->DNI;
        $Fecna = $alumno->Fecna;
        $localidad = $alumno->Localidad;
        $provincia = $alumno->Provincia;
        $lugna = $alumno->Lugna;
        $pass = $alumno->Pasaporte;
        $mat = $alumno->UltimaMat;
        $tlf = $alumno->Tlf;
        $tlfUrg = $alumno->TlfUrg;
        $form = new Alumnos($alumno, array('edit' => true));
        if (!$form->isValid($_POST)) {
            $this->flash->error($form->getMessages()[0]);
            $this->forward("alumnos/edit/" . $alumno->NIE);
        } else {
            $alumno->NIE = $this->request->getPost("NIE");
            $alumno->apellidos = $this->request->getPost("apellidos");
            $alumno->Nombre = $this->request->getPost("nombre");
            $alumno->Direccion = $this->request->getPost("direccion");
            $alumno->DNI = $this->request->getPost("DNI");
            $alumno->Fecna = $this->request->getPost("fecna");
            $alumno->Localidad = $this->request->getPost("localidad");
            $alumno->Provincia = $this->request->getPost("provincia");
            $alumno->Lugna = $this->request->getPost("lugna");
            $alumno->Pasaporte = $this->request->getPost("pass");
            $alumno->UltimaMatricula = $this->request->getPost("matricula");
            $alumno->Tlf = $this->request->getPost("tlf");
            $alumno->TlfUrg = $this->request->getPost("tlfurg");
            if ($apellidos == $alumno->apellidos) {
                $this->flash->success("Apellidos modificados");
            }
            if ($nombre!=$alumno->Nombre) {
                $this->flash->success("Nombre modificado");
            }
            if ($DNI!=$alumno->DNI) {
                $this->flash->success("DNI modificado");
            }
            if ($direccion!=$alumno->Direccion) {
                $this->flash->success("Direccion modificada");
            }
            if ($Fecna!=$alumno->Fecna) {
                $this->flash->success("Fecha de nacimiento modificada");
            }
            if ($localidad!=$alumno->Localidad) {
                $this->flash->success("Localidad modificada");
            }
            if ($provincia!=$alumno->Provincia) {
                $this->flash->success("Provincia modificada");
            }
            if ($lugna!=$alumno->Lugna) {
                $this->flash->success("Lugar de nacimiento modificado");
            }
            if ($pass!=$alumno->Pasaporte) {
                $this->flash->success("Pasaporte modificado");
            }
            if ($mat!=$alumno->UltimaMatricula) {
                $this->flash->success("Matricula modificada");
            }
            if ($tlf!=$alumno->Tlf or $tlfUrg!=$alumno->TlfUrg){
                $this->flash->success("Tlfs modificados");
            }
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
                    'NIE', 'apellidos', 'nombre','direccion','DNI','fecna','localidad','provincia','lugna','pass','matricula','tlf','tlfurg'
                ));
            }

            $this->flash->success("El alumno ha sido actualizado");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->response->redirect("alumnos/index");
        }
        $this->view->form = $form;

    }

    /**
     * Deletes a user
     *
     * @param string $username
     */
    public
    function deleteAction($NIE)
    {
        $user = Users::findFirst($NIE);
        if (!$user) {
            $this->flash->error("Alumno no encontrado");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "index"
            ));
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "alumnos",
                "action" => "search"
            ));
        }

        $this->flash->success("User was deleted successfully");

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->dispatcher->forward(array(
            "controller" => "alumnos",
            "action" => "index"
        ));
    }

}
