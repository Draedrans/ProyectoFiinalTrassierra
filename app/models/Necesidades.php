<?php

class Necesidades extends \Phalcon\Mvc\Model
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
    public $NEE;

    /**
     *
     * @var integer
     */
    public $MedRec;

    /**
     *
     * @var integer
     */
    public $Tipo;

    /**
     *
     * @var string
     */
    public $Comentario;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("Necesidades");
        $this->belongsTo('alumnos_NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Necesidades';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Necesidades[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Necesidades
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
