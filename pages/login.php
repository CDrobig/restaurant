<html>
<head>
    <title>Service Login</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="login-css">

    <link rel="stylesheet" href="http://localhost/restaurant/css/login.css">


</head>
<body>


<form action="login.php" method="POST">

    <?php

    if (isset($_SESSION['auth'])) {
        unset($_SESSION['auth']);
    }

    if (isset($_SESSION['login'])) {
        if ($_SESSION['login'] == false) {
            echo '<div class="alert alert-danger">Falsche Anmeldedaten</div>';
            unset($_SESSION['login']);
        }
    }
    ?>

    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Service Login</h2>
                    <p>Bitte geben Sie Ihre Service-ID, Passwort und den zu bedienenden Tisch ein</p>
                </div>
                <form id="Login">

                    <div class="form-group">


                        <input type="text" class="form-control" name="id" placeholder="Service-ID">

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" name="passwort" placeholder="Passwort">

                    </div>

                    <div class="form-group">

                        <input type="tischnummer" class="form-control" name="tischnummer" placeholder="Tischnummer">

                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                    </div>
        </div>
    </div>

</form>

<?php

require_once "./controllers/DatabaseController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    session_start();

    $user = $_POST['id'];
    $passwort = $_POST['passwort'];
    $tisch = $_POST['tischnummer'];
    $pw_encoded = md5($passwort);

    $db = new \App\DatabaseController();
    $result = $db->compare_user_credentials($user, $pw_encoded);

    if ($result == false) {
        $_SESSION['login'] = false;
        echo false;
        echo '<div class="alert alert-danger">Falsche Anmeldedaten</div>';

    } else {
        $_SESSION['auth'] = array(
            'id' => $parsed[0]['id'],
            'vorname' => $parsed[0]['vorname'],
            'nachname' => $parsed[0]['nachname'],
            'tischnummer' => $tisch
        );
        header('Location: http://localhost/restaurant/');
        return true;
        /*
        for ($i = 0; $i < count($parsed); $i++) {
            foreach ($parsed[$i] as $key => $value) {
                echo $key . ' - ' . $value . '<br>';
            }
        }
        */
    }

}

?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
