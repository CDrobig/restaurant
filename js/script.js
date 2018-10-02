$(document).ready(function () {
    $('.addCartBtn').on('click', function () {
        var btn = $(this);
        var tr = btn.parents('tr');
        var id = tr.children('td:first').find('h4').html();

        var cart = localStorage.getItem('cart');
        console.log(cart);
        if (cart !== null) {
            var cart = JSON.parse(cart);
            cart.push(id);
            localStorage.setItem('cart', JSON.stringify(cart));
        } else {
            var a = [];
            a.push(id);
            localStorage.setItem('cart', JSON.stringify(a));
        }

        console.log(localStorage.getItem('cart'));
    });
});
