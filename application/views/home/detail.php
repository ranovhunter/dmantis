
<h5 class="card-title">Request Tools</h5>
<?php
if (!empty($err_messages)) {
    echo $err_messages;
}
if (!empty($info_messages)) {
    echo $info_messages;
}
if (!empty($error_messages)) {
    echo $error_messages;
}
?>
<?php foreach ($list_items as $row) { ?>
    <div class="col-lg-3">
        <div class="card toolscard">
            <?php $image = $row->filename != '' ? ITEM_PATH . $row->filename : IMG_PATH . 'default-tools.png'; ?>
            <img class="card-img-top" src="<?= $image; ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title itemname"><?= $row->name; ?></h5>
                <p class="card-text itemsize">Size : <?= $row->size; ?></p>
                <a href="#" class="btn btn-primary" onclick="addToCart(this)">Add to Cart</a>
            </div>
        </div>
    </div>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
                $(document).ready(function () {
                    showCartTable();
                });
                function addToCart(element) {
                    var productParent = $(element).closest('div.toolscard');

                    var size = $(productParent).find('.itemsize').text();
                    var productName = $(productParent).find('.itemname').text();
                    //var quantity = $(productParent).find('.product-quantity').val();

                    var cartItem = {
                        productName: productName,
                        size: size
                    };
                    var cartItemJSON = JSON.stringify(cartItem);

                    var cartArray = new Array();
                    // If javascript shopping cart session is not empty
                    if (sessionStorage.getItem('rent-cart')) {
                        cartArray = JSON.parse(sessionStorage.getItem('rent-cart'));
                    }
                    cartArray.push(cartItemJSON);

                    var cartJSON = JSON.stringify(cartArray);
                    sessionStorage.setItem('rent-cart', cartJSON);
                    showCartTable();
                }
                function showCartTable() {
                    var cartRowHTML = "";
                    var itemCount = 0;

                    var quantity = 0;
                    var subTotal = 0;

                    if (sessionStorage.getItem('rent-cart')) {
                        var shoppingCart = JSON.parse(sessionStorage.getItem('rent-cart'));
                        itemCount = shoppingCart.length;

                        //Iterate javascript shopping cart array
                        shoppingCart.forEach(function (item) {
                            var cartItem = JSON.parse(item);
                            quantity = parseInt(cartItem.quantity);

                            cartRowHTML += '<li class="dropdown-header">' +
                                    "<h6>" + cartItem.productName + "</h6>" +
                                    "<span>" + cartItem.size + "</span>" +
                                    "</li>";

                        });
                    }
                    cartRowHTML += '<li><hr class="dropdown-divider"></li>' +
                            '<li><a class="dropdown-item d-flex align-items-center" ' +
                            'href="#" onclick="emptyCart()"><i class="bi bi-cart-x"></i><span>Clear Cart</span></a></li>';

                    $('#cartTableBody').html(cartRowHTML);
                    $('#itemCount').text(itemCount);
                }
                function emptyCart() {
                    if (sessionStorage.getItem('rent-cart')) {
                        // Clear JavaScript sessionStorage by index
                        sessionStorage.removeItem('rent-cart');
                        showCartTable();
                    }
                }
</script>
