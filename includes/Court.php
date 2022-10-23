<?php
require_once('functions.php');

class Court
{
    const TIME_START = '15:00';
    const TIME_END = '20:00';

    public static function getAll(): array
    {
        $mysql = getMysqlConnection();
        $stmt = $mysql->prepare("SELECT * FROM court");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function isReserved(int $court, string $date): bool
    {
        $mysql = getMysqlConnection();
        $stmt = $mysql->prepare("SELECT * FROM reservation WHERE court_id = :courtId AND date = :date");
        $stmt->bindParam(':courtId', $court);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $item = $stmt->fetch();
        return is_array($item);
    }

    public static function reserve(string $datetime, int $courtId, int $memberId, int $partnerId): bool
    {
        if (self::isReserved($courtId, $datetime)) {
            return false;
        }
        $mysql = getMysqlConnection();
        $stmt = $mysql->prepare("INSERT INTO reservation (date, court_id, member_id, partner) VALUES (:date, :court_id, :member_id, :partner)");
        $stmt->bindParam(':date', $datetime);
        $stmt->bindParam(':court_id', $courtId);
        $stmt->bindParam(':member_id', $memberId);
        $stmt->bindParam(':partner', $partnerId);
        $stmt->execute();
        return true;
    }
}