<?php

session_start();

require_once 'DatabaseController.php';
// Daten von ajax
$tabelle = $_POST['tabelle'];
$gericht_id = $_POST['gericht_id'];
// Daten aus Sassion aus Anmeldung
$tisch = $_SESSION['auth']['tischnummer'];

$db = new \App\DatabaseController();
// insert into bestellung -> tabelle & id

$bestell_id = $db->bestell_position_einfuegen($tisch, $tabelle, $gericht_id);

header('Content-type: application/json');
http_response_code(200);
echo json_encode(array('id' => $bestell_id));