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
            $query = "update user set credit=credit+10 where username='$username';";
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            $query = "update user set level=level+1,credit = credit-30 where username='$username' and credit>=30;";
            $statement = $this->pdo->prepare($query);
            $statement->execute();
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

    function editActivity($id, $name, $number, $award, $type, $sports, $intro, $start, $end)
    {
        $query = "update activity set name='$name',number='$number',award='$award',type='$type',sports='$sports',introduction='$intro',start_time='$start',end_time='$end' where id='$id';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    function isQualified($username)
    {
        $query = "select level from user where username='$username' and level>1;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return 1;
        } else {
            return 0;
        }
    }

    function getJoinedUsers($id)
    {
        $query = "select user.username,user.avatar from user,user_activity where user.username=user_activity.username and activity_id='$id';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }
}