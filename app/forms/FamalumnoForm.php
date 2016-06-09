<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 9/06/16
 * Time: 10:16
 */


use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Form;

class FamalumnoForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $alumnos_NIE = new Text("alumnos_NIE", array( 'class' => 'form-control'));
        $alumnos_NIE->setLabel("NIE del alumno");
        $alumnos_NIE_Familiar = new Select("alumnos_NIE_Familiar", Alumnos::find(), array("using" => array("NIE", "NIE"), 'class' => 'form-control'));
        $alumnos_NIE_Familiar->setLabel("NIE del alumno");
        $alumnos_NIE->setAttribute("readonly", true);
        $Relacion = new Select("Relacion", array("Familiares" => array('0' => "Hij@ del alumn@", '1' => "Herman@ del alumn@", '2' => "Madre/Padre del alumn@")), array('class' => 'form-control'));
        $this->add($alumnos_NIE);
        $this->add($alumnos_NIE_Familiar);
        $this->add($Relacion);
    }
}