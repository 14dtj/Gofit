<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/10/24
 * Time: 22:09
 */
class user{
    public $username;
    public $password;
    public $level;
    public $credit;
    public $name;
    public $gender;
    public $birth;
    public $location;
    public $interest;
    public $motto;
    public $weight;
    public $height;
    public $avatar;

    public function __construct($username, $password, $level, $credit, $name, $gender, $birth, $location, $interest, $motto, $weight, $height,$avatar){
        $this->username = $username;
        $this->password = $password;
        $this->level = $level;
        $this->credit = $credit;
        $this->name = $name;
        $this->gender = $gender;
        $this->birth = $birth;
        $this->location = $location;
        $this->interest = $interest;
        $this->motto = $motto;
        $this->weight = $weight;
        $this->height = $height;
        $this->avatar = $avatar;
    }


}