<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>
<link rel="stylesheet" href="./../css/style.css">

<ul>


    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h5>Alkoholfrei</h5></th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>liter</h6></th>
            <th scope="col"><h6>€</h6></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $drinks = (new \App\DatabaseController())->showAlkoholfrei();
        foreach ($drinks as $drink): ?>
            <tr>
                <th scope="row"><h4><?php echo $drink['ID']?></h4></th>
                <td><h4><?php echo $drink['name']?></h4></td>
                <td><h4><?php echo $drink['ingredients'] ?></h4></td>
                <td><h4><?php echo $drink['quantity'] ?></h4></td>
                <td><h4><?php echo $drink['€']?></h4></td>

            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>


    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h5>Heißgetränke</h5></th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>liter</h6></th>
            <th scope="col"><h6>€</h6></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $drinks = (new \App\DatabaseController())->showHeißgetränke();
        foreach ($drinks as $drink): ?>
            <tr>
                <th scope="row"><h4><?php echo $drink['ID']?></h4></th>
                <td><h4><?php echo $drink['name']?></h4></td>
                <td><h4><?php echo $drink['ingredients']?></h4></td>
                <td><h4><?php echo $drink['quantity']?></h4></td>
                <td><h4><?php echo $drink['€']?></h4></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>


    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h5>Bier</h5></th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>liter</h6></th>
            <th scope="col"><h6>€</h6></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $drinks = (new \App\DatabaseController())->showBier();
        foreach ($drinks as $drink): ?>
            <tr>
                <th scope="row"><h4><?php echo $drink['ID']?></h4></th>
                <td><h4><?php echo $drink['name']?></h4></td>
                <td><h4><?php echo $drink['ingredients'] ?></h4></td>
                <td><h4><?php echo $drink['quantity'] ?></h4></td>
                <td><h4><?php echo $drink['€']?></h4></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>


    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h5>Wein</h5></th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"><h6>liter</h6></th>
            <th scope="col"><h6>€</h6></th>
        </tr>
        </thead>
        <tbody>

        <?php
        require_once "./controllers/DatabaseController.php";
        $drinks = (new \App\DatabaseController())->showWein();
        foreach ($drinks as $drink): ?>
            <tr>
                <th scope="row"><h4><?php echo $drink['ID']?></h4></th>
                <td><h4><?php echo $drink['name']?></h4></td>
                <td><h4><?php echo $drink['ingredients'] ?></h4></td>
                <td><h4><?php echo $drink['quantity'] ?></h4></td>
                <td><h4><?php echo $drink['€']?></h4></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

</ul>

<?php include "./aufbau/footer.php" ?>
<?php include "./aufbau/html_footer.php" ?>
