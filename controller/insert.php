<?php
/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2017/3/24
 * Time: 10:09
 */
$pdo = new PDO('sqlite:D:/projects/Gofit/temp.db');
for ($i = 0; $i < 100; $i++) {
    $username = "user" . $i;
    $num = $i % 7 + 1;
    $path = "user" . $num;
    $query = "update user set avatar='$path' where username='$username';";
    $statement = $pdo->prepare($query);
    if (!$statement) {
        die("Execute query error, because: " . print_r($pdo->errorInfo(), true));
    }
    $statement->execute();

}
