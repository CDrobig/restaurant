<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>
<link rel="stylesheet" href="./../css/style.css">

<br>

<div class="container" data-tabelle="drinks">

    <h5 class="table-header">Alkoholfrei</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><h6>liter</h6></th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $drinks = (new \App\DatabaseController())->showAlkoholfrei();
        foreach ($drinks as $drink): ?>
            <tr>
                <td scope="row"><h4><?php echo $drink['ID'] ?></h4></td>
                <td><h4><?php echo $drink['name'] ?></h4></td>
                <td><h4><?php echo $drink['ingredients'] ?></h4></td>
                <td><h4><?php echo $drink['quantity'] ?></h4></td>
                <td><h4><?php echo $drink['price'] ?></h4></td>
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

    <h5 class="table-header">Heißgetränke</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><h6>liter</h6></th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $drinks = (new \App\DatabaseController())->showHeißgetränke();
        foreach ($drinks as $drink): ?>
            <tr>
                <td scope="row"><h4><?php echo $drink['ID'] ?></h4></td>
                <td><h4><?php echo $drink['name'] ?></h4></td>
                <td><h4><?php echo $drink['ingredients'] ?></h4></td>
                <td><h4><?php echo $drink['quantity'] ?></h4></td>
                <td><h4><?php echo $drink['price'] ?></h4></td>
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

    <h5 class="table-header">Bier</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><h6>liter</h6></th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $drinks = (new \App\DatabaseController())->showBier();
        foreach ($drinks as $drink): ?>
            <tr>
                <td scope="row"><h4><?php echo $drink['ID'] ?></h4></td>
                <td><h4><?php echo $drink['name'] ?></h4></td>
                <td><h4><?php echo $drink['ingredients'] ?></h4></td>
                <td><h4><?php echo $drink['quantity'] ?></h4></td>
                <td><h4><?php echo $drink['price'] ?></h4></td>
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

    <h5 class="table-header">Wein</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><h6>liter</h6></th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $drinks = (new \App\DatabaseController())->showWein();
        foreach ($drinks as $drink): ?>
            <tr>
                <td scope="row"><h4><?php echo $drink['ID'] ?></h4></td>
                <td><h4><?php echo $drink['name'] ?></h4></td>
                <td><h4><?php echo $drink['ingredients'] ?></h4></td>
                <td><h4><?php echo $drink['quantity'] ?></h4></td>
                <td><h4><?php echo $drink['price'] ?></h4></td>
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
