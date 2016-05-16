<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 31/01/16
 * Time: 11:51
 */

use Phalcon\Flash\Session as Flash;

class FlashNotification extends Flash
{
    public function message($type, $message)
    {
        $layout = "<script type='text/javascript'>$.notify({
            message:\"$message\"
        },{
            type: '$type',
            placement: {
		from: 'bottom',
		align: 'right'
		},
		animate: {
		    enter: 'animated fadeInRight',
		    exit: 'animated fadeOutRight'
	    }
	}
        )</script>";
        parent::message($type, $layout);
    }

    public function error($message){
        $this->message("danger", $message);
    }
    public function notice($message){
        $this->message("info", $message);
    }
    public function warning($message){
        $this->message("warning", $message);
    }
    public function success($message){
        $this->message("success", $message);
    }
}