<?php

use Phalcon\Mvc\Controller;


class ControllerBase extends Controller
{


    protected function initialize()
    {
        $language=$this->session->get("language");
        if ($language==null){
            $this->session->set("language" ,0);
        }
        if ($language==0){
            $this->view->setVar("language",True);
        } else{
            $this->view->setVar("language",False);
        }
        $this->tag->prependTitle('Orientacion | ');
        $this->view->setTemplateAfter('main');
    }

    protected function forward($uri)
    {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->dispatcher->forward(
            array(
                'controller' => $uriParts[0],
                'action' => $uriParts[1],
                'params' => $params
            )
        );
    }

}
