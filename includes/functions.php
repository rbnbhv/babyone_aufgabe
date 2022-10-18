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

function registerUser(string $forename, string $email, string $password): void
{
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("INSERT INTO member_v1 (FORENAME, EMAIL, PASSWORD) VALUES (:forename, :email, :password)");
    $stmt->bindParam(":forename", $forename);
    $stmt->bindParam(":email", $email);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(":password", $hash);
    $stmt->execute();
}

function getCryptedPassword(string $password) : string
{
    $cryptedPassword = password_hash($password, PASSWORD_BCRYPT);
    return $cryptedPassword;
}