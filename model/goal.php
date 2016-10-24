<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/10/24
 * Time: 23:30
 */
class goal{
    public $username;
    public $date;
    public $type;
    public $value;

    public function __construct($username, $date, $type, $value){
        $this->username = $username;
        $this->date = $date;
        $this->type = $type;
        $this->value = $value;
    }

}