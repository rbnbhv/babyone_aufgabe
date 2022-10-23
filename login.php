<?php
require_once('includes/functions.php');
include('views/header.php');

$message = '';

if (isset($_POST['submit_login'])) {
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("SELECT * FROM member_v1 WHERE email = :email");
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 1) {
        $row = $stmt->fetch();
        if (password_verify($_POST['pw'], $row['password'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            header('Location: list.php');
        } else {
            $message = 'Die Zugangsdaten sind nicht korrekt!';
        }
    } else {
        $message = 'Diese Email ist unbekannt!';
    }
}
?>

<!-- login Section -->
<section id="login">
    <div class="login container">
        <div class="login-header">
            <h1 class="section-title"><span>Jetzt</span> Einloggen</h1>
            <div class="card-header">
                <h2><?php echo $message ?></h2>
            </div>
            <div class="member-bottom">
                <div>
                    <form action="/login.php" method="post">
                        <label for="email">Email</label><br>
                        <input type="email" name="email" placeholder="Bitte Email eingeben" required><br>
                        <label for="password">Passwort</label><br>
                        <input type="password" name="pw" placeholder="Bitte Passwort eingeben" required><br>
                        <button type="submit" name="submit_login" class="login-btn">Login</button>
                    </form>
                </div>
                <div class="links">
                    <a href="/register.php">Noch nicht registriert?</a><br>
                    <a href="/list.php">Zeige Liste unserer Mitglieder</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END login Section -->