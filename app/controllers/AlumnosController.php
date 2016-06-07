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
            $this->flash->error("El alumno ya existe");
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->forward("alumnos/new");
        }
        $form = new AlumnosForm(null, array('create' => true));
        if (!$form->isValid($_POST)) {
            $this->flash->error($form->getMessages());
            $this->forward("alumnos/new");
        } else {
            $alumno->NIE = $this->request->getPost("NIE");
            $alumno->apellidos = $this->request->getPost("apellidos");
            $alumno->Nombre = $this->request->getPost("Nombre");
            $alumno->Direccion = $this->request->getPost("Direccion");
            $alumno->DNI = $this->request->getPost("DNI");
            $alumno->Fecna = $this->request->getPost("Fecna");
            $alumno->Localidad = $this->request->getPost("Localidad");
            $alumno->Provincia = $this->request->getPost("Provincia");
            $alumno->Lugna = $this->request->getPost("Lugna");
            $alumno->CursoActual = $this->request->getPost("CursoActual");
            $alumno->UltimaMatricula = date("Y");
            $alumno->Tlf = $this->request->getPost("Tlf");
            $alumno->TlfUrg = $this->request->getPost("TlfUrg");
            $alumno->Tutor = $this->request->getPost("Tutor");
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
            $alumno->NIE = $this->request->getPost("NIE");
            $alumno->apellidos = $this->request->getPost("apellidos");
            $alumno->Nombre = $this->request->getPost("Nombre");
            $alumno->Direccion = $this->request->getPost("Direccion");
            $alumno->DNI = $this->request->getPost("DNI");
            $alumno->NIE = $this->request->getPost("NIE");
            $alumno->Fecna = $this->request->getPost("Fecna");
            $alumno->Localidad = $this->request->getPost("Localidad");
            $alumno->Provincia = $this->request->getPost("Provincia");
            $alumno->Lugna = $this->request->getPost("Lugna");
            $alumno->CursoActual = $this->request->getPost("CursoActual");
            $alumno->Tlf = $this->request->getPost("Tlf");
            $alumno->TlfUrg = $this->request->getPost("TlfUrg");
            $alumno->UltimaMatricula = $this->request->getPost("UltimaMatricula");
            $alumno->Tutor = $this->request->getPost("Tutor");
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
                    'NIE', 'apellidos', 'Nombre', 'Direccion', 'DNI', 'Fecna', 'Localidad', 'Provincia', 'Lugna', 'CursoActual', 'Tlf', 'TlfUrg'
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
        $fecha = date("Y") - 4;
        $alumnos = $this->modelsManager->executeQuery("SELECT * FROM Alumnos WHERE UltimaMatricula < :date:", array(
            'date' => "$fecha"
        ));
        if (count($alumnos) == 0) {
            $this->flash->notice("No se han borrado alumnos ");
            return $this->response->redirect("auto");
        }
        foreach ($alumnos as $alumno) {
            if ($alumno->delete()) {
            }
        }
        $this->flash->success("Se han borrado " . count($alumnos) . " alumnos");
        return $this->response->redirect("auto");
    }

    public function verObservacionesAction($NIE)
    {
        $this->view->setTemplateAfter('AlumPerfil');
        $alumno = Alumnos::findFirst($NIE);
        $this->view->setVar("alumno", $alumno);
        $this->view->setVar("Tutor", strtolower($alumno->Tutor));
        $observaciones = ObservacionesAlum::findByalumnos_NIE($NIE);
        $this->view->setVar("observaciones", $observaciones);
        $this->view->setVar("Profesor", strtolower($this->session->get("auth")["username"]));
    }

    public function verIncidenciasAction($NIE)
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Comentarios', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }

        $this->view->setTemplateAfter('AlumPerfil');
        $alumno = Alumnos::findFirst($NIE);
        $this->view->setVar("alumno", $alumno);
        $this->view->setVar("Tutor", strtolower($alumno->Tutor));
        $Incidencias = Comentarios::find(array(
            'alumnos_NIE = ' . $NIE . '',
            'order' => 'date desc'
        ));
        $this->view->setVar("Incidencias", $Incidencias);
        $this->view->setVar("Profesor", strtolower($this->session->get("auth")["username"]));
        $paginator = new Paginator(array(
            "data" => $Incidencias,
            "limit" => 1,
            "page" => $numberPage
        ));
        $this->view->page = $paginator->getPaginate();
    }

    public function verPerfilAction($NIE)
    {
        $this->view->setTemplateAfter('AlumPerfil');
        $alumno = Alumnos::findFirst($NIE);
        $this->view->setVar("alumno", $alumno);
        $this->view->setVar("Tutor", strtolower($alumno->Tutor));
        $this->view->setVar("Profesor", strtolower($this->session->get("auth")["username"]));
        $foto = Fotos::findFirst($NIE);
        //date in mm/dd/yyyy format; or it can be in other formats as well
        $birthDate = $alumno->Fecna;
        //explode the date to get month, day and year
        $birthDate = explode("-", $birthDate);
        $birthDate=array_reverse($birthDate);
        $aux=$birthDate[0];
        $birthDate[0]=$birthDate[1];
        $birthDate[1]=$aux;
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
        $this->view->setVar("edad", $age);
        $this->view->setVar("foto", $foto->Direccion);
    }

    public function verExpedienteAction($NIE)
    {
        $this->view->setTemplateAfter('AlumPerfil');
        $alumno = Alumnos::findFirst($NIE);
        $this->view->setVar("alumno", $alumno);
        $this->view->setVar("Tutor", strtolower($alumno->Tutor));
        $this->view->setVar("Profesor", strtolower($this->session->get("auth")["username"]));
        $trassierra = Mtrassierra::findByAlumnos_NIE($NIE);
        $this->view->setVar("trassierra", $trassierra);
        $expediente = Expediente::find($NIE);
        $this->view->setVar("expediente", $expediente);
    }
    public function verFamiliaAction($NIE)
    {
        $this->view->setTemplateAfter('AlumPerfil');
        $alumno = Alumnos::findFirst($NIE);
        $this->view->setVar("alumno", $alumno);
        $this->view->setVar("Tutor", strtolower($alumno->Tutor));
        $this->view->setVar("Profesor", strtolower($this->session->get("auth")["username"]));
        $trassierra = Mtrassierra::findByAlumnos_NIE($NIE);
        $this->view->setVar("trassierra", $trassierra);
        $expediente = Expediente::find($NIE);
        $this->view->setVar("expediente", $expediente);
    }

}
