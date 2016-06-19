<?php

use Phalcon\Mvc\Controller;


class ControllerBase extends Controller
{
    protected function beforeExecuteRoute($dispatcher)
    {
        $language = $this->session->get("language");
        if (!$language) {   
            $this->view->setVar("language", False);
        }
        if ($language == 0) {
            $this->view->setVar("language", True);
        } else {
            $this->view->setVar("language", False);
        }
        $fondo = $this->session->get("fondo");

        if ($fondo == 0) {
            $this->view->setVar("fondo", False);
        } else {
            $this->view->setVar("fondo", True);
        }
    }

    protected function initialize()
    {
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
