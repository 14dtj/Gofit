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
        $query = "update user set name='$name',gender='$gender',birth='$birth',location='$loc',interest='$interest',motto='$motto' where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    function showBasicInfo($username)
    {
        $query = "select name,gender,birth,location,interest,motto,avatar from user where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function storeAvatar($username, $avatar)
    {
        $query = "update user set avatar='$avatar' where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    function getBriefInfo($username)
    {
        $query = "select user.username,count(user_follower.username) as friends,avatar,level,credit from user left outer join user_follower on user_follower.username=user.username where user.username='$username' group by user_follower.username;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function getAllUsers()
    {
        $query = "select username,password,level,credit  from user;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function updateUserInfo($username, $password, $level)
    {
        $query = "update user set password='$password',level='$level' where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }
}