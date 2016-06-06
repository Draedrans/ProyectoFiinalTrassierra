<?php

class Fotos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $Direccion;

    /**
     *
     * @var integer
     */
    public $alumnos_NIE;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("Fotos");
        $this->belongsTo('alumnos_NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Fotos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Fotos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Fotos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
