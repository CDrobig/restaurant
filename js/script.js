$(document).ready(function () {
    $('.addCartBtn').on('click', function () {
        var btn = $(this);
        var tr = btn.parents('tr');
        var id = tr.children('td:first').find('h4').html();
        var name = tr.children('td:nth-child(2)').find('h4').html();

        var cart = localStorage.getItem('cart');
        console.log(cart);
        if (cart !== null) {
            cart = JSON.parse(cart);
            var obj = {
                name: name,
                id: id
            };
            cart.push(obj);
            localStorage.setItem('cart', JSON.stringify(cart));
        } else {
            var a = [];
            var obj = {
                name: name,
                id: id
            };
            a.push(obj);
            localStorage.setItem('cart', JSON.stringify(a));
        }

        console.log(localStorage.getItem('cart'));
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
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'http://localhost/restaurant/pages/controllers/get_gericht.php',
        data: {
            'typ': 'getränk',
            'gericht_id': gericht_id
        },
        success: function (antwort) {
            console.log(antwort);
        },
        error: function (antwort) {
            console.log(antwort)
        }
    });
    */
});
