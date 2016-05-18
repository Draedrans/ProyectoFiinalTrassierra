<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 30/01/16
 * Time: 14:07
 */

use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class UsersForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        if (isset($options['create'])) {
            $name = new Text("username", array(
                'class' => 'form-control'
            ));

        } else {
            $name = new Text("username", array(
                'class' => 'form-control',
                'placeholder' => 'Leave blank to list all users'
            ));
        }

        $name->setLabel("Username");
        $name->setFilters(array('striptags', 'string'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Username is required'
            ))
        ));
        if (isset($options['create'])) {
            $name->addValidator(new \Phalcon\Validation\Validator\Alpha(array(
                'message' => 'Username must contain only letters'
            )));
        }
        $this->add($name);

        if (isset($options['edit']) || isset($options['create'])) {
            // Password
            $password = new Password('password', array(
                'class' => 'form-control'
            ));

            $password->setLabel('New password');

            $this->add($password);

            // Confirm Password
            $repeatPassword = new Password('repeatPassword', array(
                'class' => 'form-control'
            ));
            $repeatPassword->setLabel('Confirm password');

            if (isset($options['edit'])) {
                $name->setAttribute("readonly", true);
                $repeatPassword->setDefault($entity->password);
            }

            $repeatPassword->addValidators(array(
                new \Phalcon\Validation\Validator\Confirmation(array(
                    'message' => "Passwords don't match",
                    'with' => 'password'
                ))
            ));
            $this->add($repeatPassword);

            $password->addValidator(new Phalcon\Validation\Validator\PresenceOf(array(
                'message' => 'Password is required'
            )));
            $repeatPassword->addValidator(new Phalcon\Validation\Validator\PresenceOf(array(
                'message' => 'Confirm password is mandatory'
            )));


        }
        if (isset($options['edit'])) {

            $isAdmin = new Select("is_admin", array(
                '1' => "School supervisor",
                '0' => "Head of Department"
            ));
            $isAdmin->setLabel("Role");
            $this->add($isAdmin);
        } elseif (isset($options['create'])) {
            $isAdmin = new Select("is_admin", array(
                '1' => "School supervisor",
                '0' => "Head of Department"
            ));
            $isAdmin->setLabel("Role");
            $this->add($isAdmin);
        }
    }

}