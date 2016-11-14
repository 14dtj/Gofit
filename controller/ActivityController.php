<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/14
 * Time: 8:37
 */
class ActivityController
{
    var $pdo;

    public function __construct()
    {
        $this->pdo = db::getPdo();
    }

    function getAllActivities()
    {
        $query = "select id,name,type,number,picture from activity;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function getSingleActivities()
    {
        $query = "select id,name,type,number,picture from activity where type='single';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function getTeamActivities()
    {
        $query = "select id,name,type,number,picture from activity where type='team';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function getMultiActivities()
    {
        $query = "select id,name,type,number,picture from activity where type='multi';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function joinActivity($username, $id)
    {
        $query = "insert into user_activity(activity_id, username) values('$id','$username');";
        $statement = $this->pdo->prepare($query);
        $result = $statement->execute();
        if (!$result) {
            return 'You have joined the activity already!';
        } else {
            return 'Joined successfully!';
        }
    }

}