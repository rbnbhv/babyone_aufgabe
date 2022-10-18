<?php

require "mysql.php";

if (!isset($_GET['id'])) {
    echo 'Error! Keine ID verfügbar';
}

else {
$id = $_GET['id'];

$stmt = $mysql->prepare("select * FROM member_v1 WHERE `id` = :id");

$stmt->bindParam(':id', $id);

$stmt->execute();
$result = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="col-md-12 mt-4 card">
        <div class="card-header">
            <h3>Mitgliederdaten</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <div class=form-group>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vorname</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stmt = $mysql->prepare("SELECT * FROM member_v1 WHERE id = :id");
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                    $result = $stmt->fetchAll();
                    if ($result) {
                        foreach ($result as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->id ?></td>
                        <td><?php echo $row->forename ?></td>
                        <td><?php echo $row->email ?></td>
                    </tr>
                    </tbody>

                    <?php }
                    }
} ?>
                    <br>
            </table>
        </div>
        <a href="list.php">Zurück zur Mitgliederliste</a>
    </div>
</div>
</body>
</html>