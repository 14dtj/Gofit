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
        $query = "select * from user where username='$username' and password='$password';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "IntValue:" . $data['username'] . "";
        }
    }


}