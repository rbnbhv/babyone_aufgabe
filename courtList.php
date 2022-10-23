<?php
include('includes/functions.php');
include('views/header.php');

if (!User::isLoggedIn()) {
    header('Location: login.php');
}

$message = '';

$begin = new DateTime('today ' . Court::TIME_START);
$end = new DateTime('today ' . Court::TIME_END);
$courts = Court::getAll();
?>
    <section id="list">
        <div class="list container">
            <div class="list-header">
                <h1 class="section-title"><span>BTV </span>Platzkalender</h1>
                <h2><?php echo $message ?></h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Zeit</th>
                        <?php

                        foreach ($courts as $court) { ?>
                            <th><?php echo $court['courtNumber'] ?></th>
                            <?php
                        }
                        ?>
                    </tr>
                    </thead>

                    <?php
                    for ($time = $begin; $time <= $end; $time->modify('+1 hour')) {
                        $date = $time->format(DATEFORMAT_DB);
                        $dateFrontend = $time->format(DATEFORMAT_FRONTEND);

                        ?>
                        <tr>
                            <td><?php echo $dateFrontend; ?></td>
                            <?php
                            foreach ($courts as $court) {
                                ?>
                                <td><?php
                                $reservation = Court::getReservation($court['id'], $date);
                                if ($reservation) {
                                    echo User::getUserInformation($reservation['member_id'])['forename'] . '<br/>vs<br/>' . User::getUserInformation($reservation['partner'])['forename'];
                                } else {
                                    echo 'frei'; ?></td><?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }

                    ?>
                </table>
                <a href="/courtReserve.php" type="button" class="cta-reserve">Platz buchen</a>
            </div>
        </div>
    </section>

<?php
include('views/footer.php');