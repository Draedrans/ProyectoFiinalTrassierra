<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 8/06/16
 * Time: 18:20
 */

use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Form;

class FamiliaForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $alumnos_NIE= new Select("alumnos_NIE", Alumnos::find(), array("using" => array("NIE", "NIE"),'class' => 'form-control'));
        $alumnos_NIE->setLabel("NIE del alumno");
        $this->add($alumnos_NIE);
    }
}