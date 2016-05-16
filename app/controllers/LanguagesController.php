<?php

class LanguagesController extends ControllerBase
{

    public function SpanishAction()
    {
        parent::initialize();
        $this->session->set("language", 1);
        $this->response->redirect("index");
    }
    public function EnglishAction()
    {
        parent::initialize();
        $this->session->set("language", 0);
        $this->response->redirect("index");
    }

}

