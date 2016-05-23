<?php
/**
 * Created by PhpStorm.
 * User: Greg
 * Date: 5/22/16
 * Time: 10:30 AM
 */

use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Alnum;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Date;

class ComentariosForm extends Form{
    public function initialize($entity = null, $options = array())
    {
        if (!isset($options) || $options == null){
        }
    }
}