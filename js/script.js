$(document).ready(function () {
    $('.addCartBtn').on('click', function () {
        var btn = $(this);
        var tr = btn.parents('tr');
        var id = tr.children('td:first').find('h4').html();
        var name = tr.children('td:nth-child(2)').find('h4').html();
        var tabellenname = tr.parents('.container').data('tabelle');

        var cart = getCookie('cart');

        if (cart !== "") {
            cart = JSON.parse(cart);
            var obj = {
                name: name,
                id: id,
                tabelle: tabellenname
            };
            cart.push(obj);
            setCookie('cart', JSON.stringify(cart));
        } else {
            var a = [];
            var obj = {
                name: name,
                id: id,
                tabelle: tabellenname
            };
            a.push(obj);
            setCookie('cart', JSON.stringify(a));
        }

        var meldung = '' +
            '<div class="Meldung">' +
            '    <p1>Ihr Gericht wurde in den Warenkorb gelegt!</p1>' +

            '</div>';
        var container = $(document).find('.Meldung-container');
        container.empty();
        container.append(meldung);
        setTimeout(function () {
            container.empty();
        }, 3000);
    });

    /*
    Bestellung abschicken
     */
    $(document).on('click', '#orderBtn', function () {
        // Daten aus localstorage auslesen
        var warenkorb = getCookie('cart');
        if  (warenkorb !== "") {
            warenkorb = JSON.parse(warenkorb);
            var zaehler = 0;
            var max = warenkorb.length;
            for (var i = 0; i < max; i++) { // daten durchloopen
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: 'http://localhost/restaurant/pages/controllers/bestellen.php',
                    data: {
                        tabelle: warenkorb[i].tabelle,
                        gericht_id: warenkorb[i].id
                    },
                    success: function (antwort) {
                        zaehler++;
                        wartenBisFertig(zaehler, max);
                    },
                    error: function (antwort) {
                        console.log(antwort)
                    }
                });
            }
        }
    });

    $('#euro_icon').on('click', function () {
        var meldung = '' +
            '<div class="Meldung">' +
            '    <p1>Bitte drücken Sie den Service-Button auf dem Tisch!</p1>' +
            '</div>';
        var container = $(document).find('.Meldung-container');
        container.empty();
        container.append(meldung);
        setTimeout(function () {
            container.empty();
        }, 3000);
    });

    function wartenBisFertig(zaehler, max) {
        if (zaehler === max) {
            loescheCookie('cart');
            $('#einkaufswagenModal').modal('hide');
            var meldung = '' +
                '<div class="Meldung">' +
                '    <p1>Ihre Bestellung wurde abgeschickt!</p1>' +

                '</div>';

            var container = $(document).find('.Meldung-container');
            container.empty();
            container.append(meldung);
            setTimeout(function () {
                container.empty();
            }, 5000);
        }
    }


    /*
    Wenn Modal geöffnet wird
     */
    $('#einkaufswagenModal').on('show.bs.modal', function () {
        // Tabelle leeren
        $('#einkaufstabelle').find('tbody').empty();
        // Cookie auslesen
        var cart = getCookie('cart');
        if(cart !== "") {
            cart = JSON.parse(cart);

            // Tabellenbody auswählen
            var tabelle = $('#einkaufstabelle').find('tbody');
            // leeren string erzeugen
            var zeilen = '';
            // Elemente aus Local Storage durchloopen
            for (var i = 0; i < cart.length; i++) {
                var gericht = cart[i];
                // string um tabellenzeile erweitern
                zeilen += '<tr data-id="' + gericht.id + '">' +
                    '<td>' + gericht.id + '</td>' +
                    '<td>' + gericht.name + '</td>' +
                    '<td><button class="btn btn-small btn-danger cartRemove">&times;</button></td>' +
                    '</tr>';
            }
            tabelle.html(zeilen);
        }
    });

    $(document).on('click', '.cartRemove', function () {
        var button = $(this);
        var tabellenzeile = button.parents('tr');
        var id = tabellenzeile.data('id');
        tabellenzeile.remove();

        var cart = getCookie('cart');
        if(cart !== "") {
            cart = JSON.parse(cart);
            // nach id in array suchen
            for (var i = 0; i < cart.length; i++) {
                if (cart[i]['id'] === id) {
                    // index entfernen
                    cart.splice(i, 1);
                    break;
                }
            }
            // cart wieder in Cookie speichern
            setCookie('cart', JSON.stringify(cart));
        }
    });

});

function setCookie(cname, cvalue) {
    var expires = "max-age=" + (60 * 20); // 20 minuten
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function loescheCookie(name) {
    document.cookie = name + '=;max-age=0;path=/';
}
