<?php

$_SESSION['auth'] = array(
    'id' => $_POST["id"],
    'pw' => $_POST["passwort"],
    'nr' => $_POST["tischnummer"]
);

header('Location: http://localhost:8888/restaurant/')

?>
