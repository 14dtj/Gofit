<?php
$Database = new PDO("sqlite:temp.db");

$SelectQuery = "INSERT INTO activity(name,number,award,type,sports) 
VALUES ('running man',12,'kindle','team','running');";

$Statement = $Database->prepare($SelectQuery);
$Statement->execute();
