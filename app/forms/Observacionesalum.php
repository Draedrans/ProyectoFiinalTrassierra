<?php
/**
 * Created by PhpStorm.
 * User: alumno
 * Date: 5/25/16
 * Time: 12:28 AM
 */
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Alnum;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Date;

class ObservacionesalumForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
//        $ID=new Hidden("ID", array('class' => 'form-control'));
//        $ID->setFilters(array("striptags", "string"));
        $Acceso = new Select("Acesso", array(
            '0' => "Profesor",
            '1' => "Direccion/Orientacion"
        ));
        $Acceso->setLabet("Nivel de Accesso");
        $Observacion=new TextArea("ID", array('class' => 'form-control'));
        $Observacion->setFilters(array("striptags", "string"));
        $Observacion->setLabel("Introduzca la Observación aqui");
        $NIE = new Numeric("alumnos_NIE", array('class' => 'form-control'));
        $NIE->setLabel("NIE");
        $NIE->setFilters(array("striptags", "string"));
        $NIE->addValidator(new PresenceOf(array(
            'message' => 'Hace falta el NIE'
        )));

        $this->add($Observacion);
        $this->add($Acceso);
        $this->add($ID);
    }
}