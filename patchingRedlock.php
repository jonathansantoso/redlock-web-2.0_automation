<?php

$host = "172.17.0.2:3306";
$dbname = "redlock";
$username = "user1";
$password = 'pass1';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
  die("connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$res = mysqli_query($conn,$sql);

$total  = count(mysqli_fetch_all($res));

echo "<h1>total user: {$total}</h1>";

mysqli_close($conn);

?>