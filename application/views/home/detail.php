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
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card card-stats toolscard">
            <?php $image = $row->filename != '' ? ITEM_PATH . $row->filename : IMG_PATH . 'default-tools.png'; ?>
            <img class="card-img-top" src="<?= $image; ?>" alt="Card image cap">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="h2 font-weight-bold mb-0 itemname"><?= $row->name; ?></span><br/>  
                        <div class="row">
                            <span class="text-muted mb-0 itemsize">Size <?= $row->size; ?></span>
                            <span class="text-danger mb-0">Stock left : <?= $row->stock; ?></span>
                        </div>
                        <input type="hidden" value="<?= $row->id; ?>" class="itemID" />
                        <input type="hidden" value="<?= $row->stock; ?>" class="itemstock" />
                    </div>
                    <div class="col-auto">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button style="padding:0.3695rem 0.5rem; border-radius: 0;" type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[<?= $row->id; ?>]">
                                    <span class="bi bi-dash"></span>
                                </button>
                            </span>
                            <input type="text" style="max-height: 35px;max-width:47px;" name="quant[<?= $row->id; ?>]" class="text-center form-control input-number" value="1" min="1" max="<?= $row->stock; ?>">
                            <span class="input-group-btn">
                                <button style="padding:0.3695rem 0.5rem; border-radius: 0;" type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[<?= $row->id; ?>]">
                                    <span class="bi bi-plus"></span>
                                </button>
                            </span>
                        </div>
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
                                $('.btn-number').click(function (e) {
                                    e.preventDefault();

                                    fieldName = $(this).attr('data-field');
                                    type = $(this).attr('data-type');
                                    var input = $("input[name='" + fieldName + "']");
                                    var currentVal = parseInt(input.val());
                                    if (!isNaN(currentVal)) {
                                        if (type == 'minus') {

                                            if (currentVal > input.attr('min')) {
                                                input.val(currentVal - 1).change();
                                            }
                                            if (parseInt(input.val()) == input.attr('min')) {
                                                $(this).attr('disabled', true);
                                            }
                                        } else if (type == 'plus') {
                                            if (currentVal < input.attr('max')) {
                                                input.val(currentVal + 1).change();
                                            }
                                            if (parseInt(input.val()) == input.attr('max')) {
                                                $(this).attr('disabled', true);
                                            }
                                        }
                                    } else {
                                        input.val(0);
                                    }
                                });
                                $('.input-number').focusin(function () {
                                    $(this).data('oldValue', $(this).val());
                                });
                                $('.input-number').change(function () {

                                    minValue = parseInt($(this).attr('min'));
                                    maxValue = parseInt($(this).attr('max'));
                                    valueCurrent = parseInt($(this).val());

                                    name = $(this).attr('name');
                                    if (valueCurrent >= minValue) {
                                        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                                    } else {
                                        alert('Sorry, the minimum value was reached');
                                        $(this).val($(this).data('oldValue'));
                                    }
                                    if (valueCurrent <= maxValue) {
                                        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                                    } else {
                                        alert('Sorry, the maximum value was reached');
                                        $(this).val($(this).data('oldValue'));
                                    }


                                });


                                $(document).ready(function () {
                                    //emptyCart();
                                    showCartTable();
//                    alert(JSON.parse(sessionStorage.getItem('rent-cart')));
                                });
                                function addToCart(element) {
                                    var productParent = $(element).closest('div.toolscard');

                                    var size = $(productParent).find('.itemsize').text();
                                    var productName = $(productParent).find('.itemname').text();
                                    var itemStock = $(productParent).find('.itemstock').val();
                                    var quantity = $(productParent).find('.input-number').val();
                                    var itemID = $(productParent).find('.itemID').val();

                                    var cartItem = {
                                        itemID: itemID,
                                        productName: productName,
                                        size: size,
                                        quantity: quantity,
                                        stock: itemStock
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
                                                    "<h6>" + cartItem.productName + " <a href='javascript:void(0)' onclick='removeCartItem(" + index + ")'><i class='text-danger bi bi-trash'></i></a></h6>" +
                                                    "<span>" + cartItem.size + " | QTY: " + cartItem.quantity + "</span>" +
                                                    "</li>";
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

