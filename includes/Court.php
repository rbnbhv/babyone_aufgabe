<?php

class Court
{
    public static function getAll()
    {
        $mysql = getMysqlConnection();
        $stmt = $mysql->prepare("SELECT * FROM court");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}