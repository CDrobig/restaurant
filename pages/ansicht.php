<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>

<div class="container mt-4">
    <h9>Bestellungen</h9>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Preis</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once "./controllers/DatabaseController.php";
        $orders = (new \App\DatabaseController())->show_bestellungen();
        foreach ($orders as $order): ?>
            <tr>
                <td scope="row"><h4><?php echo $order['ID'] ?></h4></td>
                <td><h4><?php echo $order['name'] ?></h4></td>
                <td><h4><?php echo $order['preis'] ?></h4></td>
                <td>
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <button class="btn btn-small addCartBtn">
                                <i class="fas fa-plus-circle" aria-hidden="true" id="plus"></i>
                            </button>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

</div>

<?php include "./aufbau/footer.php" ?>
<?php include "./aufbau/html_footer.php" ?>
