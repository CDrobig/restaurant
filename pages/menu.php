<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>
<link rel="stylesheet" href="./../css/style.css">

<ul>

    <h5 class="table-header">Vorspeise</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $menu = (new \App\DatabaseController())->showVorspeise();
        foreach ($menu as $dish): ?>
            <tr>
                <td scope="row"><h4><?php echo $dish['ID']?></h4></td>
                <td><h4><?php echo $dish['name']?></h4></td>
                <td><h4><?php echo $dish['ingredients'] ?></h4></td>
                <td><h4><?php echo $dish['€']?></h4></td>
                <td>
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a button class="btn btn-small addCartBtn" >
                                <i class="fas fa-plus-circle"  aria-hidden="true" id="plus"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>

    </table>


    <h5 class="table-header">Hauptgang</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $menu = (new \App\DatabaseController())->showHauptgang();
        foreach ($menu as $dish): ?>
            <tr>
                <td scope="row"><h4><?php echo $dish['ID']?></h4></td>
                <td><h4><?php echo $dish['name']?></h4></td>
                <td><h4><?php echo $dish['ingredients'] ?></h4></td>
                <td><h4><?php echo $dish['€']?></h4></td>
                <td>
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a button class="btn btn-small addCartBtn" >
                                <i class="fas fa-plus-circle"  aria-hidden="true" id="plus"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>



    <h5 class="table-header">Dessert</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $menu = (new \App\DatabaseController())->showDessert();
        foreach ($menu as $dish): ?>
            <tr>
                <td scope="row"><h4><?php echo $dish['ID']?></h4></td>
                <td><h4><?php echo $dish['name']?></h4></td>
                <td><h4><?php echo $dish['ingredients'] ?></h4></td>
                <td><h4><?php echo $dish['€']?></h4></td>
                <td>
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a button class="btn btn-small addCartBtn" >
                                <i class="fas fa-plus-circle"  aria-hidden="true" id="plus"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>



    <h5 class="table-header">Special</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $menu = (new \App\DatabaseController())->showSpecial();
        foreach ($menu as $dish): ?>
            <tr>
                <td scope="row"><h4><?php echo $dish['ID']?></h4></td>
                <td><h4><?php echo $dish['name']?></h4></td>
                <td><h4><?php echo $dish['ingredients'] ?></h4></td>
                <td><h4><?php echo $dish['€']?></h4></td>
                <td>
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a button class="btn btn-small addCartBtn" >
                                <i class="fas fa-plus-circle"  aria-hidden="true" id="plus"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</ul>

<?php include "./aufbau/footer.php" ?>
<?php include "./aufbau/html_footer.php" ?>

