

<nav class="navbar navbar-dark bg-dark navbar-expand" id="header">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/restaurant/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/restaurant/pages/drinks.php">Drinks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/restaurant/pages/menu.php">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/restaurant/pages/kids.php">Kids</a>
            </li>
        </ul>
    </div>
    <div class="container">
        <hr>
        <div class="row">
            <!-- Footer wird in Abschnitte (12tel) aufgeteilt um die Position Festzulegen -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="col-md-6">
                        <a href="#" data-toggle="modal" data-target="#einkaufswagenModal">
                            <i class="fas fa-shopping-cart" id="warenkorb_icon"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="einkaufswagenModal" tabindex="-1" role="dialog" aria-labelledby="einkaufswagenModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h9 class="modal-title" id="exampleModalLabel">Deine Bestellung</h9>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <table class="table table-hover" id="einkaufstabelle">
                   <thead>
                   <tr>
                       <th>ID</th>
                       <th>Name</th>
                       <th></th>
                   </tr>
                   </thead>
                   <tbody>

                   </tbody>
               </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="orderBtn">Bestellung absenden</button>
            </div>
        </div>
    </div>
</div>