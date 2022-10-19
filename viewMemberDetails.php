<?php
include('includes/functions.php');
include('views/header.php');

session_start();
$message = '';
$id = $_GET['id'];


if (!isset($_SESSION['email'])) {
    header('Location: index.php');
}
$serverrankUser = getRank($_SESSION['email']);
if (!($id == $_SESSION['id'] || ($serverrankUser == 1))) {
    header('Location: index.php');
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
                    if (isset($_SESSION["email"])) {
                        if (!isset($_GET['id'])) {
                            $message = 'Keine ID verfügbar';
                        } else {
                            $id = $_GET['id'];
                            $mysql = getMysqlConnection();
                            $stmt = $mysql->prepare("select * FROM member_v1 WHERE `id` = :id");
                            $stmt->bindParam(':id', $id);
                            $stmt->execute();
                            $result = $stmt->fetch();
                            ?>

                            <table class="table">
                            <thead>
                            <tr>
                                <th>Mitgliedsnr</th>
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
                                    <br>
                                    </table>
                                    <?php
                                }
                            }
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