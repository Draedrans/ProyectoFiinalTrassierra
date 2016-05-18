<?php

class UserpanelController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle("User panel");
        parent::initialize();
    }

    public function indexAction()
    {

    }

    public function changepasswordAction()
    {
        $form = new ChangePasswordForm();
        $this->view->form = $form;
    }

    public function linkAction()
    {
        echo "<ul class='pager'>";
        echo "<li class='previous'>";
        echo $this->tag->linkTo("users/search", "Go back");
        echo "</li>";
        echo "</ul>";
        $this->forward("userpanel/index");
    }

    public function savepassAction()
    {
        if (!$this->request->isPost()) {
            return $this->forward("userpanel/index");
        }
        $username = $this->session->get('auth')['username'];
        $user = Users::findFirst(array(
            "username = :username:",
            'bind' => array('username' => $username)
        ));
        $form = new ChangePasswordForm();
        if (!$form->isValid($_POST)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->success($message);
            }
            $form->clear(array('password', 'repeatPassword'));
            $this->view->form = $form;
            return $this->forward("userpanel/changepassword");
        } else {
            $pwd = password_hash($this->request->getPost("password"), PASSWORD_DEFAULT);
            $user->password = $pwd;
            if(!$user->save()){
                foreach ($user->getMessages() as $message) {
                    $this->flash->message("danger",$message);
                }
            }else{
                $this->flash->success("Password updated");
            }
        }
        return $this->forward("userpanel/index");
    }

}

