<?php
require("mysql.php");
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $forename = $_POST['forename'];
    $email = $_POST['email'];

    $stmt = $mysql->prepare("UPDATE `member_v1` SET `forename` =:forename, `email` =:email WHERE `id` = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':forename', $forename);
    $stmt->bindParam(':email', $email);
    if ($stmt->execute()) {
        header("Location: list.php");
    }
    else {
        echo 'Error!!';
    }
}
else {
    echo 'Error!';
}

if (isset ($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $mysql->prepare("DELETE FROM `member_v1` WHERE id = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        header("Location: register.php");
    }
    else {
        echo 'Error!! Kann nicht gelöscht werden!';
    }
}
else {
    echo 'Error, kann nicht gelöscht werden!';
}