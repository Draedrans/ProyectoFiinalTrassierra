<?php

class Tutor extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $Tutor;

    /**
     *
     * @var integer
     */
    public $NIE;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("Tutor");
        $this->belongsTo('Tutor', 'Users', 'username', array('alias' => 'Users'));
        $this->belongsTo('NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Tutor';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tutor[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tutor
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
