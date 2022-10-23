<?php
include('includes/functions.php');
include('views/header.php');

$message = '';
$id = $_GET['id'];

if (!User::isLoggedIn()) {
    header('Location: login.php');
}
$isTrainer = User::isTrainer($_SESSION['id']);
if (!($id == $_SESSION['id'] || $isTrainer)) {
    header('Location: index.php');
}


if (isset($_POST['submit_member'])) {
    User::editUserDetails($_POST['id'], $_POST['forename'], $_POST['phonenumber']);
    $message = 'Die Daten wurden erfolgreich geändert!';
}

?>

    <section id="members">
        <div class="members container">
            <div class="members-header">
                <h1 class="section-title"><span>Informationen</span> Mitglied</h1>
                <div class="card-header">
                    <h2><?php echo $message; ?></h2>
                </div>
                <div class="member-bottom">
                    <?php
                    if (isset($_SESSION['email'])) {
                        if (!isset($_GET['id'])) {
                            $message = 'Keine ID verfügbar';
                        } else {
                            $mysql = getMysqlConnection();
                            $stmt = $mysql->prepare("select * FROM member_v1 WHERE `id` = :id");
                            $stmt->bindParam(':id', $_GET['id']);
                            $stmt->execute();
                            $result = $stmt->fetch();
                            ?>

                            <table class="table">
                                <form action="viewMemberDetails.php?id=<?php echo $_GET['id'] ?>" method="post">
                                    <thead>
                                    <tr>
                                        <th>Mitgliedsnr</th>
                                        <th>Vorname</th>
                                        <th>Email</th>
                                        <th>Telefonnr</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stmt = $mysql->prepare("SELECT * FROM member_v1 WHERE id = :id");
                                    $stmt->bindParam(':id', $_GET['id']);
                                    $stmt->execute();
                                    $result = $stmt->fetch();
                                    ?>
                                    <tr>
                                        <td><?php echo $result['id'] ?></td>
                                        <td><?php echo $result['forename'] ?></td>
                                        <td><?php echo $result['email'] ?></td>
                                        <td><input type="tel" minlength="10"
                                                   title="Die Telefonnummer muss mindestens 10 Zeichen haben"
                                                   name="phonenumber" value="<?php echo $result['phonenumber'] ?>"
                                                   pattern="0(17|25)([0-9]{0,})([-]{0,1})([0-9]{4,})"/></td>
                                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                                        <input type="hidden" name="forename" value="<?php echo $result['forename'] ?>">
                                    </tr>

                                    </tbody>
                                    <br>
                            </table>
                            <button type="submit" name="submit_member" class="edit-user-btn">Telefonnummer ändern</button>
                            <?php


                        }
                    } else {
                        $message = 'Keine gültige Session!';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php
include('views/footer.php');