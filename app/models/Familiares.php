<?php

use Phalcon\Mvc\Model\Resultset\Simple as ResultSet;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Validation\Message;

class Familiares extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $alumnos_NIE;

    /**
     *
     * @var integer
     */
    public $Fam_ID;

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
    public $Tlf;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("Familiares");
        $this->belongsTo('alumnos_NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Familiares';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Familiares[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Familiares
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
