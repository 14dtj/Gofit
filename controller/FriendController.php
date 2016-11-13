<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/13
 * Time: 10:46
 */
class FriendController
{
    var $pdo;

    public function __construct()
    {
        $this->pdo = db::getPdo();
    }

    function getFollowing($username)
    {
        $query = "select following,avatar,motto from user,user_following where user_following.username='$username' and user_following.following=user.username;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);

    }

    function getFollower($username)
    {
        $query = "select follower,avatar,motto from user,user_follower where user_follower.username='$username' and user_follower.follower=user.username;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }
}