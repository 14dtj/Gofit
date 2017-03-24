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
        $query = "select avatar,user_following.username,gender,motto,location,interest,level,birth from user,user_following where user_following.username='$username' and user_following.following=user.username;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);

    }

    function getFollower($username)
    {
        $query = "select avatar,user_follower.username,gender,motto,location,interest,level,birth from user,user_follower where user_follower.username='$username' and user_follower.follower=user.username;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function getUserInfo($username)
    {
        $query = "select avatar,username,gender,motto,location,interest,level,birth from user where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function getFollowerNum($username)
    {
        $query = "select count(*) as counts from user_follower where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function getFollowingNum($username)
    {
        $query = "select count(*) as counts from user_following where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function getAchievedGoal($username)
    {
        $query = "select sum(achieved_goal) as goalSum,sum(distance) as distanceSum,sum(calorie) as calorieSum,sum(time) as timeSum from sports_record where username='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return json_encode($row);
    }

    function followUser($username, $following)
    {
        $query = "insert into user_follower(username,follower) values('$following','$username');";
        $statement = $this->pdo->prepare($query);
        $result = $statement->execute();
        $query = "insert into user_following(username,following) values('$username','$following');";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        if (!$result) {
            return 'You have followed him/her already!';
        } else {
            return 'Followed successfully!';
        }
    }

    function unFollow($username, $following)
    {
        $query = "delete from user_follower where username='$following' and follower='$username';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $query = "delete from user_following where username='$username' and following='$following';";
        $statement = $this->pdo->prepare($query);
        $result = $statement->execute();
        if ($result) {
            return 'UnFollowed!';
        }
    }

    function isFollow($username, $following)
    {
        $query = "select * from user_following where username='$username' and following='$following';";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return "unFollow";
        } else {
            return "follow";
        }
    }

    function getTodayRank()
    {
        $today = date("Y-m-d");
        $query = "select user.username,avatar,motto,sum(distance) as sum_distance from user,sports_record where sports_record.username=user.username and date='$today' GROUP by sports_record.username order by sum_distance DESC ;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function getLastWeekRank()
    {
        $query = "select user.username,avatar,motto,sum(distance) as sum_distance from user,sports_record where sports_record.username=user.username GROUP by sports_record.username order by sum_distance DESC ;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

    function getLastMonthRank()
    {
        $query = "select user.username,avatar,motto,sum(distance) as sum_distance from user,sports_record where sports_record.username=user.username GROUP by sports_record.username order by sum_distance DESC ;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        return json_encode($results);
    }

}