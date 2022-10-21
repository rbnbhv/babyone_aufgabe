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

function registerUser(string $forename, string $email, string $password, bool $isTrainer, string $phonenumber): void
{
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("INSERT INTO member_v1 (forename, email, password, isTrainer, phonenumber) VALUES (:forename, :email, :password, :isTrainer, :phonenumber)");
    $stmt->bindParam(':forename', $forename);
    $stmt->bindParam(':email', $email);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $hash);
    $stmt->bindParam(':isTrainer', $isTrainer);
    $stmt->bindParam(':phonenumber', $phonenumber);
    $stmt->execute();
}

function getUserInformation(string $id): array
{
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("select * FROM member_v1 WHERE `id` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

function editUserDetails(int $id, string $forename, string $phonenumber): bool
{
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("UPDATE member_v1 SET forename = :forename, phonenumber = :phonenumber WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':forename', $forename);
    $stmt->bindParam(':phonenumber', $phonenumber);
    $stmt->execute();
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
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