<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 10/06/16
 * Time: 20:37
 */


use Phalcon\Forms\Form;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class NecesidadesForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $NIE = new Hidden("alumnos_NIE", array('class' => 'form-control'));
        $NEE = new Select("NEE", array("NEE" => array('Médicas Específicas' => "Médicas Específicas", 'Recursos Específicos' => "Recursos Específicos")), array('class' => 'form-control'));
        $MedRec = new Select("MedRec", array(   ), array('class' => 'form-control'));


        $this->add($NIE);
        $this->add($NEE);
    }
}