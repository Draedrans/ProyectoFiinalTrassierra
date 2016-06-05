<?php

class Mtrassierra extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $Year;

    /**
     *
     * @var integer
     */
    public $Alumnos_NIE;

    /**
     *
     * @var string
     */
    public $Curso;

    /**
     *
     * @var integer
     */
    public $Repite;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("MTrassierra");
        $this->belongsTo('Alumnos_NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'MTrassierra';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mtrassierra[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mtrassierra
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
