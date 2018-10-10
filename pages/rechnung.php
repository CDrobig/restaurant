<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>

<?php

require_once "./controllers/DatabaseController.php";
$positions = (new \App\DatabaseController())->showRechnung();
$summe = 0;

foreach ($positions as $position) {
    $summe += $position["Preis"];
}
echo $summe;

?>