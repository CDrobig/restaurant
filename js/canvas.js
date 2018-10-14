$(document).ready(function() {
    initialize();
});

/**
 * verarbeitung der maus-koordinaten
 * @param mouseEvent
 * @param sigCanvas
 * @returns {{X: number, Y: number}}
 */

function getPosition(mouseEvent, sigCanvas) {
    var rect = sigCanvas.getBoundingClientRect();
    return {
        X: mouseEvent.clientX - rect.left,
        Y: mouseEvent.clientY - rect.top
    };

    function initialize() {
        /**
         * zeichnung erstellen
         * @type {HTMLElement}
         */
        var sigCanvas = document.getElementById("canvas");
        var context = sigCanvas.getContext("2d");
        context.strokeStyle = "#f8920f";
        context.lineJoin = "round";
        context.lineWidth = 10;

        /**
         * hintergrundeinbundung
         * @type {HTMLImageElement}
         */
        var background = new Image();
        background.src = "https://3.bp.blogspot.com/_jFM-Fd8NDFE/TLhmRK1h8AI/AAAAAAAAKcU/NKNPe051PbA/s1600/OldCanvas-5.jpg";
        // Make sure the image is loaded first otherwise nothing will draw.
        background.onload = function () {
            context.drawImage(background, 0, 0);
        }

        /**
         * touchscreen-optimierung
         * @type {boolean}
         */
        var is_touch_device = 'ontouchstart' in document.documentElement;

        if (is_touch_device) {
            /**
             * zeichnung aus touch-element
             * @type {{isDrawing: boolean, touchstart: touchstart, touchmove: touchmove, touchend: touchend}}
             */
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
             * koordinatenübergabe
             * @param event
             */
            function draw(event) {

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
                        // The while loop can be "while (obj = obj.offsetParent)" only, which does return null
                        // when null is passed back, but that creates a warning in some editors (i.e. VS2010).
                    while ((obj = obj.offsetParent) != null);
                }

                drawer[event.type](coors);
            }

            sigCanvas.addEventListener('touchstart', draw, false);
            sigCanvas.addEventListener('touchmove', draw, false);
            sigCanvas.addEventListener('touchend', draw, false);

            sigCanvas.addEventListener('touchmove', function (event) {
                event.preventDefault();
            }, false);
        } else {

            $("#canvas").mousedown(function (mouseEvent) {
                var position = getPosition(mouseEvent, sigCanvas);
                context.moveTo(position.X, position.Y);
                context.beginPath();

                // attach event handlers
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

    function drawLine(mouseEvent, sigCanvas, context) {

        var position = getPosition(mouseEvent, sigCanvas);

        context.lineTo(position.X, position.Y);
        context.stroke();
    }

    function finishDrawing(mouseEvent, sigCanvas, context) {

        drawLine(mouseEvent, sigCanvas, context);

        context.closePath();

        // zeichenvorgang beenden
        $(sigCanvas).unbind("mousemove")
            .unbind("mouseup")
            .unbind("mouseout");
    }

    /**
     * canvas bereinigen
     * @param canvas
     * @param ctx
     */
    function clearCanvas(canvas, ctx) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
}