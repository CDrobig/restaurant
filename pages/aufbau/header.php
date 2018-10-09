<link rel="stylesheet" href="./../css/style.css">
<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light main-nav" id="header">
    <ul class="nav navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/restaurant/index.php"><h1>The Dish </h1></a>
            <h2>“Part of the secret of success in life <br> is to eat what you love”<br>
                - Mark Twain - </h2>
        </li>
    </ul>
    <!-- <ul class="nav navbar-nav">
         <li class="nav-item">
             <a class="nav-link" href="../restaurant/pages/login.php" >Kellner</a>
         </li>
     </ul> -->

    <?php if (!isset($_SESSION['auth'])): ?>
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a href="http://localhost/restaurant/pages/login.php">
                    <i class="fas fa-user" aria-hidden="true" id="user_icon"></i>
                </a>
            </li>
        </ul>
    <?php endif; ?>
</nav>
