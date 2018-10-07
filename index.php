<?php include "./pages/aufbau/html_header.php" ?>
<?php include "./pages/aufbau/header.php" ?>
<?php include "./pages/aufbau/navbar.php" ?>
    <link rel="stylesheet" href="http://localhost/css/style.css">


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://source.unsplash.com/random" alt="First slide">
                <div class="carousel-caption d-none d-md-block bg-section">
                    <h5>Bild1</h5>
                    <p>test_unterueberschrift</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/random" alt="Second slide">
                <div class="carousel-caption d-none d-md-block bg-section">
                    <h5>Bild2</h5>
                    <p>jnvkjntvlkbnlkznljnejf</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/random" alt="Third slide">
                <div class="carousel-caption d-none d-md-block bg-section">
                    <h5>Bild3</h5>
                    <p>ekjvhjtkkltnjkhvhgjhkbgvgh</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

<?php
if (isset($_SESSION['auth'])) {
    echo $_SESSION['auth']['id'];
    echo $_SESSION['auth']['vorname'];
    echo $_SESSION['auth']['nachname'];
} else {
    echo "Bitte melden Sie sich mit Ihrer Service-ID an!";
}
?>

    <div class="jumbotron" id="howTo">
        <h4 class="display-4">Dinner kann so einfach sein!</h4>
        <h6 class="lead">Stellen Sie sich ihr persönliches Dinner zusammen, indem Speisen und Getränke in Ihren persönlichen Warenkorb legen und auf "Bestellen" drücken. <br>
            Natürlich können Sie jederzeit weitere Artikel ordern und bar, via PayPal oder mit Ihrer Karte bezahlen. <hr class="my-4" ></h6>
        <h6 Sie benötigen Unterstützung? Bitte betätigen sie den SOS-Button auf dem Tich oder klicken Sie </h6>
        <a class="btn btn-primary btn-lg" href="#" role="button" id="help_Button">Hier!</a>
    </div>


<?php include "./pages/aufbau/footer.php" ?>
<?php include "./pages/aufbau/html_footer.php" ?>