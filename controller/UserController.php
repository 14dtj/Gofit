<?php
require 'db.php';

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/2
 * Time: 19:32
 */
class UserController
{
    var $pdo;

    public function __construct()
    {
        $this->pdo = db::getPdo();
    }

    function login($username, $password)
    {
        $query = "select username from user where username='$username' and password='$password';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        if ($results) {
            return 1;
        }
        return 0;
    }


    function register($username, $password)
    {
        $query = "insert into user(username,password) values('$username','$password');";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    function editProfile($username, $name, $gender, $birth, $loc, $interest, $motto)
    {

    }


}