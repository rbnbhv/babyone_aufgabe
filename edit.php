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
            <h3>Daten bearbeiten</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <form action="editPost.php" method="post">
                    <div class=form-group>
                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>"><br>
                        <input type="text" name="forename" value="<?php echo $result['forename'] ?>"
                               placeholder="Vorname"
                               class="form-control" required><br>
                        <input type="email" name="email" value="<?php echo $result['email'] ?>"
                               placeholder="Email"
                               class="form-control" required><br>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Daten Editieren
                        </button>
                        <button type="submit" name="delete" class="btn btn-danger btn-block">Mitglied löschen
                        </button>
                </form>
                <br>
            </table>
            <?php } ?>
        </div>
        <a href="list.php">Zur Mitgliederliste</a>
    </div>
</div>
</body>
</html>