<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UsersController extends ControllerBase
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
        $this->view->form = new UsersForm();
    }

    /**
     * Searches for users
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Users', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $actualUser = $this->session->get('auth')['username'];
        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "username";
        if (isset($parameters['bind'])) {
            $query = $parameters['bind']['username'];
            $users = Users::findAllWithFirst($actualUser, $query);
        } else {
            $users = Users::findAllWithFirst($actualUser);
        }
        if (count($users) == 0) {
            $this->flash->notice("The search did not find any users");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }
        $paginator = new Paginator(array(
            "data" => $users,
            "limit" => 3,
            "page" => $numberPage
        ));
        $this->view->setVar("actual_user", $actualUser);
        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        $this->view->form = new UsersForm(null, array('create' => true));
    }

    /**
     * Edits a user
     *
     * @param string $username
     */
    public function editAction($username)
    {
        if (isset($username)) {
            if (!$this->request->isPost()) {

                $user = Users::findFirstByusername($username);
                if (!$user) {
                    $this->flash->error("User not found");

                    /** @noinspection PhpVoidFunctionResultUsedInspection */
                    return $this->dispatcher->forward(array(
                        "controller" => "users",
                        "action" => "index"
                    ));
                }

                $this->view->form = new UsersForm($user, array('edit' => true));

            }

        } else
            return $this->response->redirect("users/index");
    }

    /**
     * Creates a new user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }

        $user = new Users();

        $user->username = $this->request->getPost("username");

        $foundUser = Users::findFirstByusername($user->username);
        if ($foundUser) {
            $this->flash->error("This user already exists.");
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->forward("users/new");
        }

        $form = new UsersForm(null, array('create' => true));
        if (!$form->isValid($_POST)) {
//            Imprime solo el primer mensaje
            $this->flash->error($form->getMessages()[0]);
            /*            foreach ($form->getMessages() as $message) {
                            $this->flash->error($message);
                            break;
                        }*/
            $this->forward("users/new");
        } else {
            $user->password = password_hash($this->request->getPost("password"), PASSWORD_DEFAULT);
            $user->is_admin = $this->request->getPost("is_admin");
            if (!$user->save()) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error($message);
                }

                /** @noinspection PhpVoidFunctionResultUsedInspection */
                return $this->dispatcher->forward(array(
                    "controller" => "users",
                    "action" => "new"
                ));
            }

            $this->flash->success("user was created successfully");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "users",
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
                "controller" => "users",
                "action" => "index"
            ));
        }


        $username = $this->request->getPost("username");
        $user = Users::findFirstByusername($username);
        if (!$user) {
            $this->flash->error("User $username does not exist");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }
        $userpwd = $user->password;
        $form = new UsersForm($user, array('edit' => true));
        if (!$form->isValid($_POST)) {
            $this->flash->error($form->getMessages()[0]);
            $this->forward("users/edit/" . $user->username);
        } else {
            $user->username = $this->request->getPost("username");
            $pwd = $this->request->getPost("password");
            $user->is_admin = $this->request->getPost("is_admin");
            if ($pwd == $userpwd) {
                $this->flash->message("info", "Password was not changed");
            } else {
                $this->flash->message("info", "Password was updated");
                $user->password = password_hash($pwd, PASSWORD_DEFAULT);
            }
            if (!$user->save()) {

                foreach ($user->getMessages() as $message) {
                    $this->flash->error($message);
                }

                /** @noinspection PhpVoidFunctionResultUsedInspection */
                return $this->dispatcher->forward(array(
                    "controller" => "users",
                    "action" => "edit",
                    "params" => array($user->username)
                ));
            } else {
                $form->clear(array(
                    'username', 'password', 'is_admin'
                ));
            }

            $this->flash->success("user was updated successfully");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->response->redirect("users/index");
        }
        $this->view->form = $form;

    }

    /**
     * Deletes a user
     *
     * @param string $username
     */
    public
    function deleteAction($username)
    {
        $user = Users::findFirstByusername($username);
        if (!$user) {
            $this->flash->error("User was not found");

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "index"
            ));
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            return $this->dispatcher->forward(array(
                "controller" => "users",
                "action" => "search"
            ));
        }

        $this->flash->success("User was deleted successfully");

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->dispatcher->forward(array(
            "controller" => "users",
            "action" => "index"
        ));
    }

}
