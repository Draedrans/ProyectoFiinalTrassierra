<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Welcome');
        parent::initialize();
    }

    public function indexAction()
    {
        if($this->session->get('auth')){
            $this->view->pick("index/home");
        }
    }
    public function eastereggAction()
    {

    }

}

