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
                <img class="d-block w-100" img src="burger.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block bg-section">
                    <h5>Schwarze Bohnen Burger - 6,90 €</h5>
                    <p>mit Rotkohlsalat und Cashew-Creme</p>
                    <a class="btn btn-small plusSpecial" href="http://localhost/restaurant/pages/menu.php#special">
                        <i class="fas fa-plus-circle"  aria-hidden="true"></i> Bestell mich!
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" img src="spaghetti.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block bg-section">
                    <h5>Spaghetti Bolognese - 9,90 €</h5>
                    <p>mit Rinderhackfleisch, frischen Tomaten, Basilikum und italienischem Parmesan</p>
                    <a class="btn btn-small plusSpecial" href="http://localhost/restaurant/pages/menu.php#special">
                        <i class="fas fa-plus-circle" aria-hidden="true"></i> Bestell mich!
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" img src="cake.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block bg-section">
                    <h5>Schokoladen-Kirsch-Kuchen - 3,40 €</h5>
                    <p>mit frischen Kirschen und geschmolzener Schokolade</p>
                    <a class="btn btn-small plusSpecial" href="http://localhost/restaurant/pages/menu.php#special">
                        <i class="fas fa-plus-circle" aria-hidden="true"></i> Bestell mich!
                    </a>
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
        <h6 class="lead">Stellen Sie sich ihr persönliches Dinner zusammen, indem Speisen und Getränke in Ihren
            persönlichen Warenkorb legen und auf "Bestellen" drücken. <br>
            <br>
            Natürlich können Sie jederzeit weitere Artikel ordern und bar, via PayPal oder mit Ihrer Karte bezahlen.
            <br>
            <br>
            Sie benötigen Unterstützung? Bitte betätigen sie den Service-Button auf dem Tich oder klicken Sie </h6>
    </div>


<?php include "./pages/aufbau/footer.php" ?>
<?php include "./pages/aufbau/html_footer.php" ?>