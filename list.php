<?php
include('mysql.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mitgliederliste</title>
</head>
<body>

<div class="container">
    <div class="col-md-12 mt-4 card">
        <div class="card-header">
            <h3>Mitgliederliste</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Vorname</th>
                    <th>Email</th>
                    <th>Mitgliedsdetails</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM member_v1";
                $stmt = $mysql->prepare($query);
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                $result = $stmt->fetchAll();
                if ($result) {
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->forename ?></td>
                            <td><?php echo $row->email ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row->id ?>" class="btn btn-primary">Details anzeigen</a>
                                <a href="edit.php?id=<?php echo $row->id ?>" class="btn btn-warning">Details bearbeiten</a>
                            </td>
                        </tr>
                        <?php
                    }

                } else {
                    ?>
                    <tr>
                        <td colspan="5">Kein Eintrag gefunden</td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>