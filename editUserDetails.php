<?php
require('includes/functions.php');
require('views/header.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $forename = $_POST['forename'];
    $email = $_POST['email'];

    $mysql = getMysqlConnection();
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
    $mysql = getMysqlConnection();
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


$message = '';
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
                    session_start();
                    if (isset($_SESSION["email"])) {
                        if (!isset($_GET['id'])) {
                            $message = 'Error! Keine ID verfügbar';
                        } else {
                            $id = $_GET['id'];

                            $mysql = getMysqlConnection();
                            $stmt = $mysql->prepare("select * FROM member_v1 WHERE `id` = :id");

                            $stmt->bindParam(':id', $id);

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
                                        <button type="submit" name="submit" class="edit-user-btn">Daten Editieren</button>
                                        <button type="submit" name="delete" class="edit-user-btn">Mitglied löschen</button>
                                </form>

                                <br>
                            </table>
                        <?php }
                    } else {
                        $message = 'Keine gültige Session!';
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