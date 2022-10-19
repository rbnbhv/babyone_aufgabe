<?php

const SERVERNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "root";
const DATABASE = "tennis_digital";

function getMysqlConnection(): PDO
{
    $mysql = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DATABASE, USERNAME, PASSWORD);
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $mysql;
}

function registerUser(string $forename, string $email, string $password, int $serverrank): void
{
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("INSERT INTO member_v1 (forename, email, password, serverrank) VALUES (:forename, :email, :password, :serverrank)");
    $stmt->bindParam(":forename", $forename);
    $stmt->bindParam(":email", $email);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(":password", $hash);
    $stmt->bindParam(":serverrank", $serverrank);
    $stmt->execute();
}

function getRank($email): int
{
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("SELECT * FROM member_v1 WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row['serverrank'];
}