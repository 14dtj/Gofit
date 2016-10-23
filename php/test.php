<?php
$Database = new PDO("sqlite:temp.db");

$SelectQuery = "SELECT * FROM user;";

$Statement = $Database->prepare($SelectQuery);
$Statement->execute();

while ($Data = $Statement->fetch(PDO::FETCH_ASSOC)) {
    echo "username:" . $Data['username'] . "<br>";
    echo "password:" . $Data['password'] . "<br>";
    echo "level:" . $Data['level'] . "<br>";
}
?>