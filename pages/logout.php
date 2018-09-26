<?php
session_start();
unset($_SESSION['auth']);

header('Location: http://localhost:8888/restaurant/');
