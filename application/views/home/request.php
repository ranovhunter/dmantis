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
                        <br/> <label class="switch">
                            <input type="checkbox" name="cb_item[<?= $row->id; ?>]" value="<?= $row->id; ?>" onclick="showModal(this)" <?= array_key_exists($row->id, $data_cart) ? 'checked' : ''; ?>>
                            <div class="slider round">
                                <!--ADDED HTML -->
                                <span class="on">Remove from Cart</span>
                                <span class="off">Add to Cart</span>
                                <!--END-->
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="bi bi-check"></i>
                </div>				
                <h4 class="modal-title w-100">Success</h4>	
            </div>
            <div class="modal-body">
                <p class="text-center">Item Successfully add to Cart</p>
            </div>
        </div>
    </div>
</div>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 100%;
        height: 50px;
    }

    .switch input {
        display:none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #9b9b9b;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2ab934;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(55px);
        -ms-transform: translateX(55px);
        transform: translateX(55px);
    }

    /*------ ADDED CSS ---------*/
    .on
    {
        display: none;
    }

    .on, .off
    {
        color: white;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        font-weight: bold;
        font-size: 15px;
    }

    input:checked+ .slider .on
    {
        display: block;
    }

    input:checked + .slider .off
    {
        display: none;
    }

    /*--------- END --------*/

    /* Rounded sliders */
    .slider.round {
        border-radius: 5px;
    }

    .slider.round:before {
        border-radius: 100%;
    }
    .modal-confirm {
        color: #636363;
        width: 325px;
        font-size: 14px;
    }
    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }
    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }
    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }
    .modal-confirm .form-control, .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }
    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }
    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }
    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #82ce34;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .modal-confirm .icon-box i {
        font-size: 70px;
        position: relative;
        bottom: 17px;
    }
    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #82ce34;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }
    .modal-confirm .btn:hover, .modal-confirm .btn:focus {
        background: #6fb32b;
        outline: none;
    }
    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
                            function showModal(element) {
                                var add = element.checked;
                                var itemID = element.value;
                                var url = null;
                                if (add) {
                                    url = '<?= site_url('home/add_cart/' . $userid); ?>';
                                } else {
                                    url = '<?= site_url('home/remove_cart/' . $userid); ?>';
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: url,
                                    data: 'itemid=' + itemID,
                                    success: function (response) {
                                        if (response) {
                                            $("#modal-notification").modal('show');
                                            setTimeout(function () {
                                                $("#modal-notification").modal('hide');
                                            }, 1000);
                                        } else {
                                            if (element.checked) {
                                                element.checked = false;
                                            } else {
                                                element.checked = true;
                                            }
                                        }

                                    }
                                });

                            }
</script>