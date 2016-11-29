<?php
function randomDate($begintime, $endtime)
{
    $begin = strtotime($begintime);
    $end = $endtime == "" ? mktime() : strtotime($endtime);
    $timestamp = rand($begin, $end);
    return date("Y-m-d", $timestamp);
}

function randomTime($begintime, $endtime)
{
    $begin = strtotime($begintime);
    $end = $endtime == "" ? mktime() : strtotime($endtime);
    $timestamp = rand($begin, $end);
    return date("H:i", $timestamp);
}

function getInterest()
{
    $index = rand(0, 13);
    $interest = array("Running", "Basketball", "Volleyball", "Sleeping", "Swimming", "Photography",
        "Drawing", "Computer game", "Football", "Walking", "Eating", "Tennis", "Badminton", "Handwriting");
    return $interest[$index];
}

function insertUser()
{
    $pdo = new PDO("sqlite:temp.db");
    for ($i = 50; $i < 100; $i++) {
        $name = "user" . $i;
        $password = "123456";
        $level = rand(0, 30);
        $credit = rand(0, 30);
        $gender = rand(0, 1);
        if ($gender == 0) {
            $gender = "female";
        } else {
            $gender = "male";
        }
        $birth = randomDate();
        $location = "Nanjing";
        $interest = getInterest();
        $motto = "Life lies in movement";
        $height = rand(140, 210);
        $weight = rand(40, 100);
        $sql = "INSERT INTO user(username,password,level,credit,name,gender,birth,location,interest,motto,weight,height)
VALUES ('$name','$password','$level','$credit','$name','$gender','$birth','$location','$interest','$motto','$weight','$height');";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }
}

function insertSports()
{
    $pdo = new PDO("sqlite:temp.db");
    for ($i = 0; $i < 100; $i++) {
        for ($j = 0; $j < 50; $j++) {
            $date = randomDate("2016-01-01", "2016-11-30");
            $distance = rand(0, 10);
            $time = rand(0, 5);
            $calorie = rand(500, 5000);
            $steps = rand(10, 30000);
            $username = "user" . $i;
            $goal = rand(0, 40);
            $sql = "INSERT INTO sports_record(date,distance,time,calorie,steps,username,achieved_goal)
VALUES ('$date','$distance','$time','$calorie','$steps','$username','$goal');";
            $statement = $pdo->prepare($sql);
            $statement->execute();
        }
    }
}

function insertHealth()
{
    $pdo = new PDO("sqlite:temp.db");
    for ($i = 0; $i < 30; $i++) {
        $date = date("Y-m-d", strtotime("-" . $i . " day"));
        $start_time = randomTime("0:00", "01:00");
        $end_time = randomTime("6:00", "10:00");
        $sleep_time = round((strtotime($end_time) - strtotime($start_time)) / 3600, 1);
        $rate = round(randomFloat(), 2);
        $sql = "INSERT INTO sleep_condition(username,date,start_time,end_time,rate,sleep_time)
VALUES('tj','$date','$start_time','$end_time','$rate','$sleep_time');";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }
    echo 'done';
}

function randomFloat($min = 0, $max = 1)
{
    return $min + mt_rand() / mt_getrandmax() * ($max - $min);
}

function insertAvatar()
{
    $pdo = new PDO("sqlite:temp.db");
    for ($i = 0; $i < 100; $i++) {
        $name = "user" . $i;
        $avatar = "user.jpg";
        $sql = "UPDATE user set motto='2333' where username='$name';";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }
    echo 'done';
}

function insertMySports()
{
    $pdo = new PDO("sqlite:temp.db");
    for ($i = 0; $i < 30; $i++) {
        $date = date("Y-m-d", strtotime("-" . $i . " day"));
        $distance = rand(1, 5);
        $time = round(randomFloat(1, 3), 1);
        $calorie = rand(30, 1000);
        $steps = rand(10, 10000);
        $achieved_goal = rand(0, 1);
        $sql = "INSERT INTO sports_record(date,distance,time,calorie,steps,username,achieved_goal)
VALUES('$date','$distance','$time','$calorie','$steps','tj','$achieved_goal');";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }
    echo 'done';
}

insertMySports();