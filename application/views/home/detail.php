<link href="https://demos.creative-tim.com/argon-dashboard/assets-old/css/argon.min.css?v=1.2.0" type="text/css" rel="stylesheet"/>
<style>
    .tools-title {
        padding: 11px 0 0px 0;
        font-size: 18px;
        margin-bottom: 0px;
        font-weight: 500;
        color: #012970;
        font-family: "Poppins", sans-serif;
    }
</style>
<h1>Request Tools</h1><br/>
<hr>
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
        <div class="card card-stats toolscard">
            <?php $image = $row->filename != '' ? ITEM_PATH . $row->filename : IMG_PATH . 'default-tools.png'; ?>
            <img class="card-img-top" src="<?= $image; ?>" alt="Card image cap">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0 itemsize">Size : <?= $row->size; ?></h5>
                        <span class="h2 font-weight-bold mb-0 itemname"><?= $row->name; ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info-light text-white rounded-circle shadow">
                            <a href="javascript:void(0)" onclick="addToCart(this)"><span class="ni ni-cart"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
                            $(document).ready(function () {
                                //emptyCart();
                                showCartTable();

                                removeCartItem(1);
//                    alert(JSON.parse(sessionStorage.getItem('rent-cart')));
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

                                if (sessionStorage.getItem('rent-cart')) {
                                    var shoppingCart = JSON.parse(sessionStorage.getItem('rent-cart'));
                                    itemCount = shoppingCart.length;
                                    var index = 0;
                                    //Iterate javascript shopping cart array
                                    shoppingCart.forEach(function (item) {

                                        var cartItem = JSON.parse(item);
                                        quantity = parseInt(cartItem.quantity);

                                        cartRowHTML += '<li class="dropdown-header">' +
                                                "<h6>" + cartItem.productName + "</h6>" +
                                                "<span>" + cartItem.size + "</span><a href='javascript:void(0)' onclick='removeCartItem(" + index + ")'><i class='bi bi-trash'></i></a>" +
                                                "</li>";
                                        index++;

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
                            function removeCartItem(index) {
                                if (sessionStorage.getItem('rent-cart')) {
                                    var RentCart = JSON.parse(sessionStorage.getItem('rent-cart'));
                                    delete RentCart[index];
                                    var cartArray = new Array();
                                    //sessionStorage.removeItem('rent-cart');
                                    RentCart.forEach(function (item) {
                                        cartArray.push(item);
                                        var cartJSON = JSON.stringify(cartArray);
                                        sessionStorage.setItem('rent-cart', cartJSON);
                                    });
                                    showCartTable();
                                }
                            }
</script>

