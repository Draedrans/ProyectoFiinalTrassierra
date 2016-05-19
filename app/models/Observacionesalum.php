<?php

class Observacionesalum extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $ID;

    /**
     *
     * @var integer
     */
    public $alumnos_NIE;

    /**
     *
     * @var integer
     */
    public $Acceso;

    /**
     *
     * @var string
     */
    public $Observacion;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("ObservacionesAlum");
        $this->belongsTo('alumnos_NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ObservacionesAlum';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Observacionesalum[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Observacionesalum
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
