<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Item 
            <a href="<?= site_url('item/update/' . $rec_data->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Item"><i class="bi bi-pencil-square"></i></a>
        </h5>
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
        <?= $form_validation_errors; ?>
        <!-- Floating Labels Form -->
        <form class="row g-3" autocomplete="off">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Item Name" value ="<?= $rec_data->name ?>" disabled>
                    <label for="floatingName">Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingSN" placeholder="Quantity" value ="<?= $rec_data->size ?>" disabled>
                    <label for="floatingSN">Size</label>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingSN" placeholder="Area" value ="<?= $rec_data->area_name ?>" disabled>
                    <label for="floatingSN">Location</label>
                </div>
            </div>  
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingSN" placeholder="Condition" value ="<?= $rec_data->icondition ?>" disabled>
                    <label for="floatingSN">Condition</label>
                </div>
            </div>  
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingSN" placeholder="Purchase Date" value ="<?= $rec_data->purchase_date ?>" disabled>
                    <label for="floatingSN">Purchase Date</label>
                </div>
            </div>  
            <?php if ($rec_data->filename != '') { ?>
                <div class="col-md-4">
                    <div class="form">
                        <label class="form-control-label" for="item-image">Image</label>
                        <img class="img img-responsive" src="<?= ITEM_PATH . $rec_data->filename; ?>" height="150px"/>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-4">
                <div class="form">
                    <label class="form-control-label" for="item-image">QR Code</label>
                    <img class="img img-responsive" src="<?= QR_UPLOADED . $rec_data->qrcode . '.png'; ?>" height="150px"/>
                </div>
            </div>
        </form><!-- End floating Labels Form -->

    </div>
</div>