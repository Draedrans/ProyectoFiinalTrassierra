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

class AutoForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $csv = new File("csv", array('class' => 'form-control'));
        $csv->setLabel("Archivo de Clase");
        $tutor= new Select("Tutor", Users::find(), array("using" => array("username", "username")));
        $tutor->setFilters(array("striptags", "string"));
        $tutor->Setlabel("Tutor");
        $this->add($tutor);
        $this->add($csv);
    }
}