<?php

class Expediente extends \Phalcon\Mvc\Model
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
    public $año;

    /**
     *
     * @var string
     */
    public $curso;

    /**
     *
     * @var string
     */
    public $asignatura;

    /**
     *
     * @var string
     */
    public $centro;

    /**
     *
     * @var string
     */
    public $calificacion;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('alumnos_NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'expediente';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Expediente[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Expediente
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
