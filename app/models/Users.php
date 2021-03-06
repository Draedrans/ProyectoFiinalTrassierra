<?php

use Phalcon\Mvc\Model\Resultset\Simple as ResultSet;
use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Validation\Message;

class Users extends \Phalcon\Mvc\Model
{



    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var integer
     */
    public $is_admin;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function findAllWithFirst($username, $query = "%")
    {

        // A raw SQL statement
        $sql = "SELECT * FROM users WHERE username='$username' UNION" .
            " SELECT * FROM users WHERE username<>'$username' AND username LIKE '$query'";

        // Base model
        $robot = new Users();

        // Execute the query
        return new Resultset(null, $robot, $robot->getReadConnection()->query($sql));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

    public function validation()
    {
        $this->validate(new Uniqueness(array(
            "field" => "username",
            "message" => "This user is already registered"
        )));/*
        $this->validate(new \Phalcon\Mvc\Model\Validator\Inclusionin(array(
            "field" => "is_admin",
            "domain" => array('0', '1')
        )));*/
        return $this->validationHasFailed() != true;
    }
}