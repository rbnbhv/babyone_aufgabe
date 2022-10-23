<?php
include('includes/functions.php');
include('views/header.php');

$message = '';

const DATEFORMAT_DB = 'Y-m-d H:i';
const DATEFORMAT_FRONTEND = 'd.m.Y H:i';
const TIME_START = '15:00';
const TIME_END = '20:00';

$begin = new DateTime('today ' . TIME_START);
$end = new DateTime('today ' . TIME_END);
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
                                <td><?php echo isReserved($court['id'], $date) ? 'belegt' : 'frei'; ?></td><?php
                            }
                            ?>
                        </tr>
                        <?php
                    }

                    ?>
                </table>
            </div>
        </div>
    </section>

<?php
include('views/footer.php');