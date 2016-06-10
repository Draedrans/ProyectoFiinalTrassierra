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
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Form;

class FamiliaForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $ID= new Hidden("Fam_ID", array('class' => 'form-control'));
        $ID->setLabel("");
        $alumnos_NIE = new Text("alumnos_NIE",array( 'class' => 'form-control'));
        $alumnos_NIE->setLabel("NIE del alumno");
        $alumnos_NIE->setAttribute("readonly", true);
        $Relacion = new Select("Relacion", array("Familiares" => array('0' => "Hij@ del alumn@", '1' => "Herman@ del alumn@", '2' => "Madre/Padre del alumn@")), array('class' => 'form-control'));
        $Nombre = new Text("Nombre", array('class' => 'form-control'));
        $Nombre->setLabel("Nombre");
        $apellidos = new Text("apellidos", array('class' => 'form-control'));
        $apellidos->setLabel("Apellidos");
        $DNI=new Text("DNI", array('class' => 'form-control'));
        $fecna = new Date("Fecna", array('class' => 'form-control'));
        $fecna->setLabel("Fecha de Nacimiento");
        $Direccion = new Text("Direccion", array('class' => 'form-control'));
        $Direccion->setFilters(array("striptags", "string"));
        $Direccion->setLabel("Direccion");
        $Localidad = new Text("Localidad", array('class' => 'form-control'));
        $Localidad->setFilters(array("striptags", "string"));
        $Localidad->setLabel("Localidad");
        $fecna->setFilters(array("striptags", "string"));
        $DNI->setFilters(array("striptags", "string"));
        $Nombre->setFilters(array("striptags", "string"));
        $alumnos_NIE->setFilters(array("striptags", "string"));
        $apellidos->setFilters(array("striptags", "string"));
        $Tlf = new Text("Tlf", array('class' => 'form-control'));
        $Tlf->setFilters(array("striptags", "string"));
        $Tlf->setLabel("Telefono");

        $this->add($ID);
        $this->add($alumnos_NIE);
        $this->add($Nombre);
        $this->add($apellidos);
        $this->add($DNI);
        $this->add($fecna);
        $this->add($Direccion);
        $this->add($Localidad);
        $this->add($Tlf);
        $this->add($Relacion);
    }
}