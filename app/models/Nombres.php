<?php

class Nombres extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $users_username;

    /**
     *
     * @var string
     */
    public $Nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("Nombres");
        $this->belongsTo('users_username', 'Users', 'username', array('alias' => 'Users'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Nombres';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nombres[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nombres
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
