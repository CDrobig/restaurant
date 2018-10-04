$(document).ready(function () {
    $('.addCartBtn').on('click', function () {
        var btn = $(this);
        var tr = btn.parents('tr');
        var id = tr.children('td:first').find('h4').html();
        var name = tr.children('td:nth-child(2)').find('h4').html();
        var tabellenname = tr.parents('.container').data('tabelle');

        var cart = localStorage.getItem('cart');

        if (cart !== null) {
            cart = JSON.parse(cart);
            var obj = {
                name: name,
                id: id,
                tabelle: tabellenname
            };
            cart.push(obj);
            localStorage.setItem('cart', JSON.stringify(cart));
        } else {
            var a = [];
            var obj = {
                name: name,
                id: id,
                tabelle: tabellenname
            };
            a.push(obj);
            localStorage.setItem('cart', JSON.stringify(a));
        }

        var meldung = '' +
            '<div class="Meldung">' +
            '    <p>Ihr Gericht wurde in den Warenkorb gelegt!</p>' +
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
        var warenkorb = JSON.parse(localStorage.getItem('cart'));
        for (var i = 0; i < warenkorb.length; i++) { // daten durchloopen
            /*
             * NICHT FERTIG
             */
            console.log('AJAX STARTEN FÜR:');
            console.log('ID: ' + warenkorb[i].id + ' NAME: ' + warenkorb[i].name + ' TABELLE: ' + warenkorb[i].tabelle);
            // ajax auf serverseite feritg machen!!!!!
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'http://localhost/restaurant/pages/controllers/bestellen.php',
                data: {
                    'tabelle': warenkorb[i].tabelle,
                    'gericht_id': warenkorb[i].id
                },
                success: function (antwort) {
                    console.log(antwort);
                },
                error: function (antwort) {
                    console.log(antwort)
                }
            });
        }
        // LOCALSTORAGE leeren
        // bestätigung anzeigen -> siehe IN WARENKOB SETZEN
    });


    /*
    Wenn Modal geöffnet wird
     */
    $('#einkaufswagenModal').on('show.bs.modal', function () {
        // Local Storage auslesen
        var cart = localStorage.getItem('cart');
        cart = JSON.parse(cart);
        console.log(cart);

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
    });

    $(document).on('click', '.cartRemove', function () {
        var button = $(this);
        var tabellenzeile = button.parents('tr');
        var id = tabellenzeile.data('id');
        tabellenzeile.remove();

        var cart = localStorage.getItem('cart');
        cart = JSON.parse(cart);
        // nach id in array suchen
        for (var i = 0; i < cart.length; i++) {
            if (cart[i]['id'] === id) {
                // index entfernen
                cart.splice(i, 1);
                break;
            }
        }
        // cart wieder in Local Storage speichern
        localStorage.setItem('cart', JSON.stringify(cart));
    });

    /*

    */
});
