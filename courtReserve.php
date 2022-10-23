<?php
include('includes/functions.php');
if (!User::isLoggedIn()) {
    header('Location: login.php');
}


$message = '';
$users = User::getAll();
$courts = Court::getAll();
if ($_POST) {
    $datetime = $_POST['date'] . ' ' . $_POST['time'];

    if (Court::reserve($datetime, $_POST['court'], $_SESSION['id'], $_POST['partner'])) {
        $message = 'Der Platz wurde für dich reserviert!';
    } else {
        $message = 'Der Platz konnte leider nicht reserviert werden!';
    }
}

include('views/header.php');
?>

    <section id="court-reserve">
        <div class="court-reserve container">
            <div class="court-reserve-header">
                <h1 class="section-title"><span>Platz</span> Buchen</h1>
                <div class="card-header">
                    <h2><?php echo $message; ?></h2>
                </div>
                <div class="court-reserve-bottom">
                    <form action="courtReserve.php" method="post">
                        <label for="date">Datum auswählen</label><br>
                        <input type="date" name="date"/><br>

                        <label for="date">Zeit auswählen</label>
                        <select name="time">
                            <?php
                            $begin = new DateTime('today ' . Court::TIME_START);
                            $end = new DateTime('today ' . Court::TIME_END);
                            for ($time = $begin; $time <= $end; $time->modify('+1 hour')) {
                                $dateFrontend = $time->format('H:i');
                                echo '<option value="' . $dateFrontend . '">' . $dateFrontend . '</option>';
                            }
                            ?>
                        </select>

                        <label for="court">Platz auswählen</label><br>
                        <select name="court">
                            <?php
                            foreach ($courts as $court) { ?>
                                <option value="<?php echo $court['id']; ?>"><?php echo $court['courtNumber']; ?></option>
                            <?php }
                            ?>
                        </select><br>
                        <label for="partner">Spielpartner auswählen</label><br>
                        <select name="partner">
                            <?php
                            foreach ($users as $user) {
                                if ($user['id'] == $_SESSION['id']) {
                                    continue;
                                }
                                ?>
                                <option value="<?php echo $user['id']; ?>"><?php echo $user['forename']; ?></option>
                            <?php }
                            ?>
                        </select><br>
                        <button class="court-reserve-btn" type="submit" name="submit">Abschicken</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section  -->


<?php
include('views/footer.php');