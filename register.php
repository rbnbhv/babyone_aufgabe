<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Mitglied registrieren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
if (isset($_POST["submit"])) {
    require("mysql.php");
    //Mail überprüfen
    $stmt = $mysql->prepare("SELECT * FROM member_v1 WHERE email = :email");
    $stmt->bindParam(":email", $_POST["email"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 0) {
        // Email ist frei
        $stmt = $mysql->prepare("INSERT INTO member_v1 (forename, email) VALUES (:name, :email)");
        $stmt->bindParam(":name", $_POST["forename"]);
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        echo "Die Registrierung war erfolgreich!";
    } else {
        echo "Das Mitglied ist bereits eingetragen!";
    }
}
?>

<div class="container">
    <div class="col-md-12 mt-4 card">
        <div class="card-header">
            <h3>Mitglied registrieren</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <form action="register.php" method="post">
                    <input type="text" name="forename" placeholder="Vorname" class="form-control" required><br>
                    <input type="email" name="email" placeholder="Email" class="form-control" required><br>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Registrieren</button>
                </form>
                <br>
            </table>
        </div>
        <a href="list.php">Zeige Liste unserer Mitglieder</a>
    </div>
</div>
</body>
</html>