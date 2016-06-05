<?php

class Comentarios extends \Phalcon\Mvc\Model
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
    public $date;

    /**
     *
     * @var integer
     */
    public $acceso;

    /**
     *
     * @var string
     */
    public $Incidencia;

    /**
     *
     * @var integer
     */
    public $alumnos_NIE;

    /**
     *
     * @var string
     */
    public $Moitivo;

    /**
     *
     * @var string
     */
    public $Asistentes;

    /**
     *
     * @var string
     */
    public $Acuerdos;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("Comentarios");
        $this->belongsTo('users_username', 'Users', 'username', array('alias' => 'Users'));
        $this->belongsTo('alumnos_NIE', 'Alumnos', 'NIE', array('alias' => 'Alumnos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'Comentarios';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Comentarios[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Comentarios
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
