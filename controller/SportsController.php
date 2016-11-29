<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/13
 * Time: 9:25
 */
class SportsController
{
    var $pdo;

    public function __construct()
    {
        $this->pdo = db::getPdo();
    }

    function getAchievedGoal($username)
    {
        $query = "select sum(achieved_goal) as goalSum,sum(distance) as distanceSum,sum(calorie) as calorieSum,sum(time) as timeSum from sports_record where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function getRecord($username, $date)
    {
        $query = "select distance,time,calorie,steps from sports_record where username='$username' and date='$date';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function saveGoal($username, $type, $value)
    {
        $date = date("Y-m-d");

        $query = "insert into weekly_goal(username,date,type,value) values('$username','$date','$type','$value');";

        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $query = "update user set credit=credit+5 where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $query = "update user set level=level+1,credit = credit-30 where username='$username' and credit>=30;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }
}