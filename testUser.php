<?php
/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2017/1/5
 * Time: 11:14
 */
$pdo = new PDO("sqlite:temp.db");
$username = 'shishuo';
$query = "select user.username,count(user_follower.username) as friends,avatar,level,credit from user left outer join user_follower on user_follower.username=user.username where user.username='$username' group by user_follower.username;";
$statement = $pdo->prepare($query);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);