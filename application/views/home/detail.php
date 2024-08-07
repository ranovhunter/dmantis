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
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card card-stats toolscard">
            <?php $image = $row->filename != '' ? ITEM_PATH . $row->filename : IMG_PATH . 'default-tools.png'; ?>
            <img class="card-img-top" src="<?= $image; ?>" alt="Card image cap">
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <span class="h4 font-weight-bold mb-0 itemname"><?= $row->name; ?></span><br/>  
                        <?php if ($row->size > 0) { ?>
                            <span class="text-muted mb-0 itemsize">Size <?= $row->size; ?></span>
                        <?php } ?>
                        <br/> <input type="hidden" value="<?= $row->id; ?>" class="itemID" />
                        <button class="btn btn-success addcart" href="javascript:void(0)" onclick="addToCart(this)"><span class="ni ni-cart"></span> Add to Cart</button>
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
//                    alert(JSON.parse(sessionStorage.getItem('rent-cart')));
                            });
                            function addToCart(element) {
                                var productParent = $(element).closest('div.toolscard');

                                var size = $(productParent).find('.itemsize').text();
                                var productName = $(productParent).find('.itemname').text();
                                var itemID = $(productParent).find('.itemID').val();

                                var cartItem = {
                                    itemID: itemID,
                                    productName: productName,
                                    size: size
                                };
                                var cartItemJSON = JSON.stringify(cartItem);

                                var cartArray = new Array();

                                // If javascript shopping cart session is not empty
                                if (sessionStorage.getItem('rent-cart')) {
                                    cartArray = JSON.parse(sessionStorage.getItem('rent-cart'));
                                    alert(cartArray);
                                    if (typeof cartArray[itemID] === 'undefined') {
                                        cartArray.push(cartItemJSON);

                                        var cartJSON = JSON.stringify(cartArray);
                                        sessionStorage.setItem('rent-cart', cartJSON);
                                        showCartTable();
                                    } else {
                                        alert('Barang sudah berada di dalam keranjang');
                                    }
                                } else {
                                    cartArray.push(cartItemJSON);

                                    var cartJSON = JSON.stringify(cartArray);
                                    sessionStorage.setItem('rent-cart', cartJSON);
                                    showCartTable();
                                }
                            }
                            function showCartTable() {
                                var cartRowHTML = "";
                                var itemCount = 0;


                                if (sessionStorage.getItem('rent-cart')) {
                                    var shoppingCart = JSON.parse(sessionStorage.getItem('rent-cart'));
                                    itemCount = shoppingCart.length;
                                    var index = 0;
                                    //Iterate javascript shopping cart array
                                    shoppingCart.forEach(function (item) {

                                        var cartItem = JSON.parse(item);

                                        cartRowHTML += '<li class="dropdown-header">' +
                                                "<h6>" + cartItem.productName + " <a href='javascript:void(0)' onclick='removeCartItem(" + index + ")'><i class='text-danger bi bi-trash'></i></a></h6>" +
                                                "<span>" + cartItem.size + "</li>";
                                        index++;

                                    });
                                }
                                cartRowHTML += '<li><hr class="dropdown-divider"></li>';
                                if (itemCount > 0) {
                                    cartRowHTML += '<li><a class="dropdown-item d-flex align-items-center" ' +
                                            'href="#" onclick="emptyCart()"><i class="bi bi-cart-x"></i><span>Clear Cart</span></a></li>' +
                                            '<li><a class="dropdown-item d-flex align-items-center"href="#" onclick="confirmCart()"><i class="bi bi-cart-check-fill"></i><span>Confirm</span></a></li>';
                                } else {
                                    cartRowHTML += '<li><a class="dropdown-item d-flex align-items-center" ' +
                                            'href="#"><i class="bi bi-cart2"></i><span>Cart Empty</span></a></li>';
                                }
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
                            function confirmCart() {
                                var url = '<?= site_url('home/detail/' . $userid) ?>';
                                if (sessionStorage.getItem('rent-cart')) {
                                    var rentItem = sessionStorage.getItem('rent-cart');
                                    const form = document.createElement('form');
                                    form.method = 'post';
                                    form.action = url;
                                    const hiddenField = document.createElement('input');
                                    hiddenField.type = 'hidden';
                                    hiddenField.name = 'data';
                                    hiddenField.value = rentItem;
                                    form.appendChild(hiddenField);

                                    const hiddenField2 = document.createElement('input');
                                    hiddenField2.type = 'hidden';
                                    hiddenField2.name = 'confirm';
                                    hiddenField2.value = 'confirm';
                                    form.appendChild(hiddenField2);

                                    document.body.appendChild(form);
                                    emptyCart();
                                    form.submit();

                                }

                            }
</script>

