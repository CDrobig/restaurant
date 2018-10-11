<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>

<link rel="stylesheet" href="./../css/style.css">

<br>

<div class="container" data-tabelle="drinks">

    <h9 class="table-header">Ihre Rechnung</h9>
    <br>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Position</th>
            <th scope="col">€</th>


        </tr>
        </thead>
        <tbody>

        <?php
        $betrag = 0;
        $pos =1;
        require_once "./controllers/DatabaseController.php";
        $bill = (new \App\DatabaseController())->showRechnung();
        foreach ($bill as $bills): ?>
            <tr>
                <td scope="row"><h4><?php echo $pos ?></h4></td>
                <td><h4><?php echo $bills['Name'] ?></h4></td>
                <td><h4><?php echo $bills['Preis'] ?></h4></td>
                <?php $pos +=1; ?>
            </tr>

            <?php
                $betrag += $bills['Preis'];
            ?>

        <?php endforeach; ?>
        <tr></tr>

        <tr>
            <td scope="row" colspan="2"> <br> <h6>Summe: </h6></td>
            <td> <br> <h6> <?php echo $betrag?> </h6></td>
        </tr>

        </tbody>
        Tischnummer: <?php echo $bills['Tischnummer'] ?>


    </table>

<br>
    <div class="col-md-12"> Bitte wählen Sie ihre Zahlungsweise:
        <a href="https://www.paypal.com/de/signin" target="_blank" id="pp-link">
            <i class="fab fa-cc-paypal" id="pp_icon"></i>
            <!-- Icon wird erstellt und benötigt eine ID um die Formatierung via CSS zu verändern-->
        </a>
        <a href="https://sumup.de" target="_blank" id="visa-link">
            <i class="fab fa-cc-visa" id="visa_icon"></i>

        </a>
        <a href="https://sumup.de" target="_blank" id="mc-link">
            <i class="fab fa-cc-mastercard" id="mc_icon"></i>

        </a>
        <a href="https://sumup.de" target="_blank" id="amex-link">
            <i class="fab fa-cc-amex" id="amex_icon"></i>

        </a>
        <a href="https://sumup.de" target="_blank" id="card-link">
            <i class="fas fa-money-check" id="card_icon"></i>

        </a>
        <a href="#">
            <i class="fas fa-euro-sign" id="euro_icon"></i>
        </a>

    </div>
</div>




<?php include "./aufbau/footer.php" ?>
<?php include "./aufbau/html_footer.php" ?>
