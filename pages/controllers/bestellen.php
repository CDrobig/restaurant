<?php

session_start();

require_once 'DatabaseController.php';

$tabelle = $_POST['tabelle'];
$id = $_POST['gericht_id'];

$tisch = $_SESSION['auth']['tischnummer'];

$db = new \App\DatabaseController();
// insert into betsllung -> tabelle & id

$db->bestell_position_einfuegen($tisch, $tabelle, $id);
