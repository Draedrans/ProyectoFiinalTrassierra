<?php

/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 5/25/16
 * Time: 2:35 AM
 */

use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Alnum;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Date;
class ObservacionesalumForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $ID = new Hidden("ID", array('class' => 'form-control'));
        $NIE = new Hidden("alumnos_NIE", array('class' => 'form-control'));
        $NIE->setLabel("NIE");
        $NIE->setFilters(array("striptags", "string"));
        $NIE->addValidator(new PresenceOf(array(
            'message' => 'Hace falta el NIE'
        )));
        $Observacion = new TextArea("Observacion", array('class' => 'form-control'));
        $Observacion->addValidator(new PresenceOf(array(
            'message' => 'Tienes que escribir algo en el campo de observacion'
        )));
        $isAdmin = new Select("Acceso", array(
            '0' => "Profesor",
            '1' => "Direccion/Orientacion/Tutor"
        ));
        $isAdmin->setLabel("Nivel de Acceso");


        $this->add($ID);
        $this->add($NIE);
        $this->add($Observacion);
        $this->add($isAdmin);

    }

}