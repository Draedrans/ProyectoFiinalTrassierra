<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 19/06/16
 * Time: 21:17
 */
class CambiarfondoController extends ControllerBase
{

    public function indexAction()
    {
        $fondo = $this->session->get("fondo");
        if ($fondo==0) {
            $this->session->set("fondo", 1);
        }else{
            $this->session->set("fondo", 0);
        }
        $this->response->redirect("index");
    }

}

