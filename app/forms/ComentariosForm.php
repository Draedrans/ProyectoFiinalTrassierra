<?php
/**
 * Created by PhpStorm.
 * User: Greg
 * Date: 5/22/16
 * Time: 10:30 AM
 */

use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Form;

class ComentariosForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $Username = new Text("users_username", array('class' => 'form-control'));
        $Username->setLabel("Profesor");
        $Date = new Text("date", array('class' => 'form-control'));
        $Date->setLabel("Fecha y hora");
        $NIE = new Hidden("alumnos_NIE", array('class' => 'form-control'));
        $NIE->setLabel("NIE");
        $NIE->setAttribute("readonly", true);
        $Date->setAttribute("readonly", true);
        $Username->setAttribute("readonly", true);
        $isAdmin = new Select("acceso", array(
            '0' => "Profesor",
            '1' => "Direccion/Orientacion/Tutor"
        ));
        $isAdmin->setLabel("Nivel de Acceso");
        $Incidencia = new Select("Incidencia", array(
            '0' => "Profesor",
            '1' => "Direccion/Orientacion/Tutor"
        ));
        $Incidencia->setLabel("Tipo de Incidencia");
        $Motivo = new TextArea("Motivo", array('class' => 'form-control'));
        $Motivo->setLabel("Descripción");
        $Asistentes = new TextArea("Asistentes", array('class' => 'form-control'));
        $Asistentes->setLabel("Asistentes");
        $Acuerdos = new TextArea("Acuerdos", array('class' => 'form-control'));
        $Acuerdos->setLabel("Acuerdos");

        if (isset($options['edit'])) {
            $this->add($NIE);
            $this->add($Username);
            $this->add($Date);
        }
        $this->add($isAdmin);
        $this->add($Incidencia);
        $this->add($Motivo);
        $this->add($Asistentes);
        $this->add($Acuerdos);
    }
}