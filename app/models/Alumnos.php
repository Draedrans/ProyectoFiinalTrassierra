<?php

class Alumnos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $NIE;

    /**
     *
     * @var string
     */
    public $Nombre;

    /**
     *
     * @var string
     */
    public $apellidos;

    /**
     *
     * @var string
     */
    public $DNI;

    /**
     *
     * @var string
     */
    public $Pasaporte;

    /**
     *
     * @var string
     */
    public $Direccion;

    /**
     *
     * @var string
     */
    public $Localidad;

    /**
     *
     * @var string
     */
    public $Provincia;

    /**
     *
     * @var string
     */
    public $Lugna;

    /**
     *
     * @var string
     */
    public $Fecna;

    /**
     *
     * @var string
     */
    public $Tlf;

    /**
     *
     * @var string
     */
    public $TlfUrg;

    /**
     *
     * @var integer
     */
    public $UltimaMatricula;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('NIE', 'Comentarios', 'alumnos_NIE', array('alias' => 'Comentarios'));
        $this->hasMany('NIE', 'FamAlumno', 'alumnos_NIE_Familiar', array('alias' => 'FamAlumno'));
        $this->hasMany('NIE', 'FamAlumno', 'alumnos_NIE', array('alias' => 'FamAlumno'));
        $this->hasMany('NIE', 'Familiares', 'alumnos_NIE', array('alias' => 'Familiares'));
        $this->hasMany('NIE', 'Necesidades', 'alumnos_NIE', array('alias' => 'Necesidades'));
        $this->hasMany('NIE', 'ObservacionesAlum', 'alumnos_NIE', array('alias' => 'ObservacionesAlum'));
        $this->hasMany('NIE', 'Expediente', 'alumnos_NIE', array('alias' => 'Expediente'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'alumnos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Alumnos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Alumnos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
