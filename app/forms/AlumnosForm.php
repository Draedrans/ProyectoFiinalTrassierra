<?php

/**
 * Created by PhpStorm.
 * User: Draedrans
 * Date: 2/3/16
 * Time: 8:27 PM
 */
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Alnum;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Date;

class AlumnosForm extends Form
{
    public function initialize($entity = null, $options = array())
    {
        $NIE = new Numeric("NIE", array('class' => 'form-control'));
        $NIE->setLabel("NIE");
        $NIE->setFilters(array("striptags", "string"));
        $NIE->addValidator(new PresenceOf(array(
            'message' => 'Hace falta el NIE'
        )));
        $nombre = new Text("Nombre", array('class' => 'form-control'));
        $nombre->setLabel("Nombre");
        $nombre->setFilters(array('striptags', 'string'));
        $nombre->addValidator(new PresenceOf(array(
            'message' => 'NIE tiene que ser un numero   '
        )));
        $apellidos = new Text("apellidos", array('class' => 'form-control'));
        $apellidos->setFilters(array("striptags", "string"));
        $apellidos->setLabel("Apellidos");
        $DNI = new Text("DNI", array('class' => 'form-control'));
        $DNI->setFilters(array("striptags", "string"));
        $DNI->setLabel("DNI");
        $Direccion = new Text("Direccion", array('class' => 'form-control'));
        $Direccion->setFilters(array("striptags", "string"));
        $Direccion->setLabel("Direccion");
        $Localidad = new Text("Localidad", array('class' => 'form-control'));
        $Localidad->setFilters(array("striptags", "string"));
        $Localidad->setLabel("Localidad");
        $Provincia = new Text("Provincia", array('class' => 'form-control'));
        $Provincia->setFilters(array("striptags", "string"));
        $Provincia->setLabel("Provincia");
        $Lugna = new Text("Lugna", array('class' => 'form-control'));
        $Lugna->setFilters(array("striptags", "string"));
        $Lugna->setLabel("Lugar de nacimiento");
        $Pasaporte = new Text("Pasaporte", array('class' => 'form-control'));
        $Pasaporte->setFilters(array("striptags", "string"));
        $Pasaporte->setLabel("Pasaporte");
        $Tlf = new Text("Tlf", array('class' => 'form-control'));
        $Tlf->setFilters(array("striptags", "string"));
        $Tlf->setLabel("Telefono");
        $TlfUrg = new Text("TlfUrg", array('class' => 'form-control'));
        $TlfUrg->setFilters(array("striptags", "string"));
        $TlfUrg->setLabel("Telefono en caso de urgencia");
        $fecna = new Date("Fecna", array('class' => 'form-control'));
        $fecna->setFilters(array("striptags", "string"));
        $fecna->setLabel("Fecha de Nacimiento");
        $tutor= new Text("Tutor", array('class' => 'form-control'));
        $tutor->setFilters(array("striptags", "string"));
        $tutor->Setlabel("Tutor");


        if (!isset($options) || $options == null) {
            $NIE->setAttribute("placeholder",
                "Cualquier campo que se deje en blanco no se aplicará como filtro");
            $nombre->setAttribute("placeholder",
                "Cualquier campo que se deje en blanco no se aplicará como filtro");
            $apellidos->setAttribute("placeholder",
                "Cualquier campo que se deje en blanco no se aplicará como filtro");
        }

        if (isset($options['edit'])) {
            $NIE->setAttribute("readonly", true);
            $UltimaMatricula = new Numeric("UltimaMatricula", array('class' => 'form-control'));
            $UltimaMatricula->setLabel("Año de ultima matricula");
            $UltimaMatricula->addValidator(new PresenceOf(array(
                'message' => 'El año de matrriculacion tieneque estar presente tiene que ser un numero   '
            )));
        }


        $this->add($nombre);
        $this->add($apellidos);
        $this->add($NIE);


        if ((isset($options['create'])) or (isset($options['edit']))) {
            $this->add($DNI);
            $this->add($Direccion);
            $this->add($Localidad);
            $this->add($Provincia);
            $this->add($Lugna);
            $this->add($fecna);
            $this->add($Pasaporte);
            $this->add($Tlf);
            $this->add($TlfUrg);
            if (isset($UltimaMatricula))
                $this->add($UltimaMatricula);
            $this->add($tutor);
        }

    }
}

