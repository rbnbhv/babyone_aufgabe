<?php
session_start();
include('Court.php');
include('User.php');

const SERVERNAME = 'localhost';
const USERNAME = 'root';
const PASSWORD = 'root';
const DATABASE = 'tennis_digital';
const DATEFORMAT_DB = 'Y-m-d H:i';
const DATEFORMAT_FRONTEND = 'd.m.Y H:i';

function getMysqlConnection(): PDO
{
    $mysql = new PDO('mysql:host=' . SERVERNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $mysql;
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