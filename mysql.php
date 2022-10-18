<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "tennis_digital";

try {

  $mysql = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
  // echo "Connected Successfully";

} catch(PDOException $e) {

  echo "Connection Failed" .$e->getMessage();
}