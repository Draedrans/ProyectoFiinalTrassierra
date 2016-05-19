<?php

class Famalumno extends \Phalcon\Mvc\Model
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
    public $alumnos_NIE_Familiar;

    /**
     *
     * @var integer
     */
    public $Relacion;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("FamAlumno");
        $this->belongsTo('alumnos_NIE_Familiar', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
        $this->belongsTo('alumnos_NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'FamAlumno';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Famalumno[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Famalumno
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
