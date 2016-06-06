<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 6/3/16
 * Time: 5:16 AM
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class AutoForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $csv = new File("photos", array('class' => 'form-control'));
        $csv->setLabel("Archivo de Clase");
        $tutor = new Select("Tutor", Users::find(), array("using" => array("username", "username"), 'class' => 'form-control'));
        $tutor->setFilters(array("striptags", "string"));
        $tutor->Setlabel("Tutor");
        $this->add($csv);
        $NIE =new Hidden("NIE", array('class' => 'form-control'));
        if (isset($options['photo'])) {
            $csv->setLabel("Foto");
            $this->add($NIE);
        }
        if (isset($options['create'])) {
            $this->add($tutor);
        }
    }
} 