x<?php

/**
 * Created by PhpStorm.
 * User: Greg
 * Date: 1/02/16
 * Time: 17:59
 */

use Phalcon\Forms\Form;
class ChangePasswordForm extends Form
{
    public function initialize($entity = null, $params = array())
    {
        $pwd = new \Phalcon\Forms\Element\Password("password", array(
            'class' => 'form-control'
        ));
        $pwd->setLabel("New password");
        $pwd->addValidator(new \Phalcon\Validation\Validator\PresenceOf(array(
            'message' => 'Password is required'
        )));
        $this->add($pwd);
        $repPwd = new \Phalcon\Forms\Element\Password("repeatPassword", array(
            'class' => 'form-control'
        ));
        $repPwd->setLabel("Password confirmation");
        $repPwd->addValidators(array(
            new \Phalcon\Validation\Validator\PresenceOf(array(
                'message' => 'Password confirmation is required'
            )),
            new \Phalcon\Validation\Validator\Confirmation(array(
                'message' => 'Passwords don\'t match',
                'with' => 'password'
            ))
        ));
        $this->add($repPwd);
    }
}