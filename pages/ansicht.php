<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>

<div class="container mt-4">
    <h9>Bestellungen</h9>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Preis</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once "./controllers/DatabaseController.php";
        $orders = (new \App\DatabaseController())->show_bestellungen();
        foreach ($orders as $key => $value): ?>
        <tr>
            <td colspan="3">Tisch <?php echo $key?></td>
        </tr>
            <?php foreach ($value as $positon): ?>
            <tr>
                <td scope="row"><h4><?php echo $positon['ID'] ?></h4></td>
                <td><h4><?php echo $positon['Name'] ?></h4></td>
                <td><h4><?php echo $positon['Preis'] ?></h4></td>
            </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
    </table>

</div>

<?php include "./aufbau/footer.php" ?>
<?php include "./aufbau/html_footer.php" ?>
