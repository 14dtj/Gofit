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

    function getOrganized($username)
    {
        $query = "select id,name,type,number,picture from activity where organizer='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function getJoined($username)
    {
        $query = "select id,name,type,number,picture from activity,user_activity where username='$username' and activity_id=id;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function createActivity($name, $number, $award, $type, $pic, $sports, $organizer, $intro, $start, $end)
    {
        $query = "insert into activity(name,number,award,type,picture,sports,organizer,introduction,start_time,end_time) values('$name','$number','$award','$type','$pic','$sports','$organizer','$intro','$start','$end');";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    function getActivity($id)
    {
        $query = "select * from activity where id='$id';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function quitActivity($id, $username)
    {
        $query = "delete from user_activity where activity_id='$id' and username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

}