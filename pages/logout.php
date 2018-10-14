<?php
// nicht eingebunden, da jeder service-mitarbeiter eine neue browsersession pro tisch startet (nach bezahlvorgang)
session_start();
unset($_SESSION['auth']);

header('Location: http://localhost:8888/restaurant/');
