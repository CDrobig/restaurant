<?php include "./aufbau/html_header.php" ?>
<?php include "./aufbau/header.php" ?>
<?php include "./aufbau/navbar.php" ?>
<link rel="stylesheet" href="./../css/style.css">

<br>
<div class="container" data-tabelle="kids">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Desktops and Tablets</title>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                initialize();
            });


            /**
             * x und y position festlegen
             * @param mouseEvent
             * @param sigCanvas
             * @returns {{X: number, Y: number}}
             */
            function getPosition(mouseEvent, sigCanvas) {
                var x, y;
                if (mouseEvent.pageX != undefined && mouseEvent.pageY != undefined) {
                    x = mouseEvent.pageX;
                    y = mouseEvent.pageY;
                } else {
                    x = mouseEvent.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
                    y = mouseEvent.clientY + document.body.scrollTop + document.documentElement.scrollTop;
                }

                return { X: x - sigCanvas.offsetLeft, Y: y - sigCanvas.offsetTop };
            }

            function initialize() {
                /**
                 * canvas refenrenzieren
                 * @type {HTMLElement}
                 */
                var sigCanvas = document.getElementById("canvasSignature");
                var context = sigCanvas.getContext("2d");
                context.strokeStyle = 'Black';

                // definition und optimierung für touchscreen
                var is_touch_device = 'ontouchstart' in document.documentElement;

                if (is_touch_device) {
                    // bildschirmberührungen überwachen und verfolgen
                    var drawer = {
                        isDrawing: false,
                        touchstart: function (coors) {
                            context.beginPath();
                            context.moveTo(coors.x, coors.y);
                            this.isDrawing = true;
                        },
                        touchmove: function (coors) {
                            if (this.isDrawing) {
                                context.lineTo(coors.x, coors.y);
                                context.stroke();
                            }
                        },
                        touchend: function (coors) {
                            if (this.isDrawing) {
                                this.touchmove(coors);
                                this.isDrawing = false;
                            }
                        }
                    };

                    /**
                     * bildschirmberührungen als event speichern
                     * @param event
                     */
                    function draw(event) {

                        /**
                         * koordinaten abrufen
                         * @type {{x: number, y: number}}
                         */
                        var coors = {
                            x: event.targetTouches[0].pageX,
                            y: event.targetTouches[0].pageY
                        };

                        var obj = sigCanvas;

                        if (obj.offsetParent) {

                            do {
                                coors.x -= obj.offsetLeft;
                                coors.y -= obj.offsetTop;
                            }

                            while ((obj = obj.offsetParent) != null);
                        }

                        // koordinaten übergeben
                        drawer[event.type](coors);
                    }

                    sigCanvas.addEventListener('touchstart', draw, false);
                    sigCanvas.addEventListener('touchmove', draw, false);
                    sigCanvas.addEventListener('touchend', draw, false);

                    sigCanvas.addEventListener('touchmove', function (event) {
                        event.preventDefault();
                    }, false);
                }
                else {

                    // mausbewegung in zeichungselement umwandeln
                    $("#canvasSignature").mousedown(function (mouseEvent) {
                        var position = getPosition(mouseEvent, sigCanvas);

                        context.moveTo(position.X, position.Y);
                        context.beginPath();

                        /* eventhandler implementieren */
                        $(this).mousemove(function (mouseEvent) {
                            drawLine(mouseEvent, sigCanvas, context);
                        }).mouseup(function (mouseEvent) {
                            finishDrawing(mouseEvent, sigCanvas, context);
                        }).mouseout(function (mouseEvent) {
                            finishDrawing(mouseEvent, sigCanvas, context);
                        });
                    });

                }
            }

            /**
             * linie zeichnen
             * @param mouseEvent
             * @param sigCanvas
             * @param context
             */
            function drawLine(mouseEvent, sigCanvas, context) {

                var position = getPosition(mouseEvent, sigCanvas);

                context.lineTo(position.X, position.Y);
                context.stroke();
            }

            /**
             * koordinieren der events
             * @param mouseEvent
             * @param sigCanvas
             * @param context
             */
            function finishDrawing(mouseEvent, sigCanvas, context) {

                drawLine(mouseEvent, sigCanvas, context);

                context.closePath();

                /* zeichen-vorgang beenden*/
                $(sigCanvas).unbind("mousemove")
                    .unbind("mouseup")
                    .unbind("mouseout");
            }
        </script>

    </head>

    <body>

    <h5>Zeichne dein Lieblingsessen</h5>

    <div id="canvasDiv">
        <!-- größe des canvas festlegen -->
        <canvas id="canvasSignature" width="500px" height="300px" style="border:2px solid #000000;"></canvas>
    </div>
    <!-- "radiergummi" implementieren -->
    <a href="http://localhost/restaurant/pages/kids.php" id="delete">
        <i class="fas fa-eraser" id="delete_icon"></i></a>
    </body>
    </html>
    <br>
    <br>
    <h9 class="table-header"> <br> Für unsere kleinen Gäste </br></h9>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><h6>€</h6></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        // ausgabe der kindergerichte

        require_once "./controllers/DatabaseController.php";
        $kids = (new \App\DatabaseController())->showKindergericht();
        foreach ($kids as $kids): ?>

            <tr>
                <td scope="row"><h4><?php echo $kids['ID'] ?></h4></td>
                <td><h4><?php echo $kids['name'] ?></h4></td>
                <td><h4><?php echo $kids['ingredients'] ?></h4></td>
                <td><h4><?php echo $kids['price'] ?></h4></td>
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

<br>
<br>
<br>
<!-- svg-datei (im kids_footer) einbinden -->
<?php include "./aufbau/kids_footer.php" ?>
