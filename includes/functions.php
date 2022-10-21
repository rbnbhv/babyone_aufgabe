<?php

const SERVERNAME = 'localhost';
const USERNAME = 'root';
const PASSWORD = 'root';
const DATABASE = 'tennis_digital';

function getMysqlConnection(): PDO
{
    $mysql = new PDO('mysql:host=' . SERVERNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $mysql;
}

function registerUser(string $forename, string $email, string $password, int $isTrainer): void
{
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("INSERT INTO member_v1 (forename, email, password, isTrainer) VALUES (:forename, :email, :password, :isTrainer)");
    $stmt->bindParam(':forename', $forename);
    $stmt->bindParam(':email', $email);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $hash);
    $stmt->bindParam(':isTrainer', $isTrainer);
    $stmt->execute();
}

function isTrainer(string $id): bool
{
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("SELECT isTrainer FROM member_v1 WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetch();
    return $item['isTrainer'];
}