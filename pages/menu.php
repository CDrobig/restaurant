<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>
<link rel="stylesheet" href="./../css/style.css">

<ul>


    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h5>Vorspeise</h5></th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>€</h6></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $menu = (new \App\DatabaseController())->showVorspeise();
        foreach ($menu as $dish): ?>
            <tr>
                <th scope="row"><h4><?php echo $dish['ID']?></h4></th>
                <td><h4><?php echo $dish['name']?></h4></td>
                <td><h4><?php echo $dish['ingredients'] ?></h4></td>
                <td><h4><?php echo $dish['€']?></h4></td>

            </tr>
        <?php endforeach; ?>

        </tbody>

    </table>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h5>Hauptgang</h5></th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>€</h6></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $menu = (new \App\DatabaseController())->showHauptgang();
        foreach ($menu as $dish): ?>
            <tr>
                <th scope="row"><h4><?php echo $dish['ID']?></h4></th>
                <td><h4><?php echo $dish['name']?></h4></td>
                <td><h4><?php echo $dish['ingredients'] ?></h4></td>
                <td><h4><?php echo $dish['€']?></h4></td>

            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h5>Dessert</h5></th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>€</h6></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $menu = (new \App\DatabaseController())->showDessert();
        foreach ($menu as $dish): ?>
            <tr>
                <th scope="row"><h4><?php echo $dish['ID']?></h4></th>
                <td><h4><?php echo $dish['name']?></h4></td>
                <td><h4><?php echo $dish['ingredients'] ?></h4></td>
                <td><h4><?php echo $dish['€']?></h4></td>

            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h5>Special</h5></th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>€</h6></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $menu = (new \App\DatabaseController())->showSpecial();
        foreach ($menu as $dish): ?>
            <tr>
                <th scope="row"><h4><?php echo $dish['ID']?></h4></th>
                <td><h4><?php echo $dish['name']?></h4></td>
                <td><h4><?php echo $dish['ingredients'] ?></h4></td>
                <td><h4><?php echo $dish['€']?></h4></td>

            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</ul>

<?php include "./aufbau/footer.php" ?>
<?php include "./aufbau/html_footer.php" ?>

