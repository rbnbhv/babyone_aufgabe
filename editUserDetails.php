<?php
require('includes/functions.php');
require('views/header.php');

session_start();
$message = '';

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
}
$id = $_POST['id'];

$serverrankUser = getRank($_SESSION['email']);
if (!($serverrankUser == 1)) {
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    $forename = $_POST['forename'];
    $email = $_POST['email'];
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("UPDATE `member_v1` SET `forename` =:forename, `email` =:email WHERE `id` = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':forename', $forename);
    $stmt->bindParam(':email', $email);
    if ($stmt->execute()) {
        header("Location: list.php");
    } else {
        $message = 'Query überprüfen.';
    }
}

if (isset($_POST['deleteUser'])) {
    $mysql = getMysqlConnection();
    $stmt = $mysql->prepare("DELETE FROM `member_v1` WHERE id = :id");
    $stmt->bindParam(':id', $id);
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
                    if (isset($_SESSION["email"])) {
                        if (!isset($_GET['id'])) {
                            $message = 'Keine ID verfügbar.';
                        } else {
                            $mysql = getMysqlConnection();
                            $stmt = $mysql->prepare("select * FROM member_v1 WHERE `id` = :id");
                            $stmt->bindParam(':id', $_GET['id']);
                            $stmt->execute();
                            $result = $stmt->fetch();
                            ?>
                            <table class="table">
                                <form action="editUserDetails.php" method="post">
                                    <div class=form-group>
                                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>"><br>
                                        <label for="fname">Vorname</label><br>
                                        <input type="text" name="forename" value="<?php echo $result['forename'] ?>"
                                               placeholder="Vorname"
                                               class="form-control" required><br>
                                        <label for="email">Email</label><br>
                                        <input type="email" name="email" value="<?php echo $result['email'] ?>"
                                               placeholder="Email"
                                               class="form-control" required><br>
                                        <button type="submit" name="submit" class="edit-user-btn">Daten Editieren
                                        </button>
                                        <button type="submit" name="deleteUser" class="edit-user-btn">Mitglied löschen
                                        </button>
                                </form>

                                <br>
                            </table>
                        <?php }
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