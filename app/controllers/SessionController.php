<?php

class SessionController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle('Sign In');
        parent::initialize();
    }

    public function indexAction()
    {
        $auth = $this->session->get("auth");
        if($auth){
            $this->response->redirect("index");
        }
    }


    public function startAction()
    {
        if ($this->request->isPost()) {

            $username = $this->request->get('username');
            $password = $this->request->get('password');

            $user = Users::findFirst(array(
                "username = :username:",
                'bind' => array('username' => $username)
            ));
            if ($user != false && password_verify($password, $user->password)) {
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->username);
                return $this->forward('index/index');
            }

            $this->flash->error('Wrong email/password');
        }

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->forward('session/index');
    }

    private function _registerSession(Users $user)
    {
        $this->session->set('auth', array(
            'username' => $user->username,
            'is_admin' => $user->is_admin
        ));
    }

    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Logged out succesfully');
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->forward('index/index');
    }
}

