<?php
require('includes/functions.php');
require('views/header.php');

$message = '';

if (!User::isLoggedIn()) {
    header('Location: login.php');
}

$isTrainer = User::isTrainer($_SESSION['id']);
if (!$isTrainer) {
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    User::editUserDetails($_POST['id'], $_POST['forename'], $_POST['phonenumber']);
    $message = 'Die Daten wurden erfolgreich geändert!';
}

if (isset($_POST['deleteUser'])) {
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("DELETE FROM `member_v1` WHERE id = :id");
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        header("Location: list.php");
    } else {
        $message = 'Query überprüfen.';
    }
}
?>

    <!-- edit-user Section -->
    <section id="edit-user">
        <div class="edit-user container">
            <div class="edit-user-header">
                <h1 class="section-title"><span>Daten</span> Bearbeiten</h1>
                <div class="card-header">
                    <h2><?php echo $message; ?></h2>
                </div>
                <div class="edit-user-bottom">
                    <?php
                    if (isset($_SESSION['id'])) {
                        if (!isset($_GET['id'])) {
                            $message = 'Keine ID verfügbar.';
                        } else {
                            $result = User::getUserInformation($_GET['id']);
                            ?>
                            <table class="table">
                                <form action="editUserDetails.php?id=<?php echo $_GET['id'] ?>" method="post">
                                    <div class=form-group>
                                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>"><br>
                                        <label for="fname">Vorname</label><br>
                                        <input type="text" name="forename"
                                               value="<?php echo $result['forename'] ?>"
                                               placeholder="Vorname"
                                               class="form-control" required><br>
                                        <label for="email">Email</label><br>
                                        <input type="email" name="email" value="<?php echo $result['email'] ?>"
                                               placeholder="Email"
                                               class="form-control" required><br>
                                        <label for="phone">Telefonnummer</label><br>
                                        <input type="tel" minlength="10"
                                               title="Die Telefonnummer muss mindestens 10 Zeichen haben"
                                               name="phonenumber" value="<?php echo $result['phonenumber'] ?>"
                                               pattern="0(17|25)([0-9]{0,})([-]{0,1})([0-9]{4,})"/><br>
                                        <button type="submit" name="submit" class="edit-user-btn">Daten
                                            Editieren
                                        </button>
                                        <button type="submit" name="deleteUser" class="edit-user-btn">Mitglied löschen
                                        </button>
                                </form>
                                <br>
                            </table>
                            <?php

                        }
                    } else {
                        $message = 'Keine gültige Session.';
                    }
                    ?>
                    <div class="links">
                        <a href="list.php">Zur Mitgliederliste</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End edit-user Section -->

<?php
include('views/footer.php');