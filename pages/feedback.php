<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>

<div class="container mt-4">
    <h9>Gästebewertung</h9>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Timestamp</th>
            <th scope="col">Bewertung</th>
            <th scope="col">Kommentar</th>
        </tr>
        </thead>
        <tbody>

        <?php
       require_once "./controllers/DatabaseController.php";
        $fbs = (new \App\DatabaseController())->showFeedback();
        foreach ($fbs as $fb): ?>
            <tr>
                <td scope="row"><h4><?php echo $fb['stamp'] ?></h4></td>
                <td><h4><?php echo $fb['value'] ?></h4></td>
                <td><h4><?php echo $fb['message'] ?></h4></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php include "./aufbau/footer.php" ?>
<?php include "./aufbau/html_footer.php" ?>
