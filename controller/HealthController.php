<?php

/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/10
 * Time: 10:47
 */
class HealthController
{
    var $pdo;

    public function __construct()
    {
        $this->pdo = db::getPdo();
    }

    function getBMI($username)
    {
        $query = "select weight,height from user where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function getSleepCondition($username, $date)
    {
        $query = "select start_time,end_time,rate,sleep_time from sleep_condition where username='$username' and date='$date';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function getWellSleepNights($username)
    {
        $query = "select count(*) as counts from sleep_condition where username='$username' and rate>=0.5;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function updateBMI($username, $weight, $height)
    {
        $query = "update user set weight='$weight',height='$height' where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    function getLastWeekSleep($username)
    {

        $query = "select sleep_time from sleep_condition where username='$username' order by date desc limit 7;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }
}