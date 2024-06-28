<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Item 
            <a href="<?= site_url('item/update/' . $rec_data->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Item"><i class="bi bi-pencil-square"></i></a>
            <?php if ($rec_data->status == 1) { ?>
                <a href="<?= site_url('item/assign/' . $rec_data->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Assign To User"><i class="bi bi-person-check-fill"></i></a>
            <?php } ?>
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
                    <input type="text" name="txt_name" class="form-control" id="floatingName" placeholder="Category Name" value ="<?= $rec_data->name ?>" disabled>
                    <label for="floatingName">Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="txt_name" class="form-control" id="floatingSN" placeholder="Serial Number" value ="<?= $rec_data->serial_number ?>" disabled>
                    <label for="floatingSN">Serial Number</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Details" name="txt_detail" id="floatingDetails" style="height: 100px;" disabled><?= $rec_data->details ?></textarea>
                    <label for="floatingDetails">Details</label>
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