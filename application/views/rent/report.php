<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Report - <?= $rec_data->item_name; ?></h5>
        <?php
        if (!empty($error_messages)) {
            echo $error_messages;
        }
        if (!empty($success_messages)) {
            echo $success_messages;
        }
        ?>
        <?= $form_validation_errors; ?>
        <!-- Floating Labels Form -->
        <form class="row g-3 needs-validation" novalidate action="<?php echo site_url('rent/report/' . $rec_data->id); ?>" method="post" role="form" autocomplete="off"  enctype="multipart/form-data" >
            <div class="col-md-8">  
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Item Name" value ="<?= $rec_data->item_name; ?>" readonly>
                    <label for="floatingName">Tools Name</label>
                </div>
            </div>
            <?php if ($rec_data->item_size > 0) { ?>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="txt_detail" class="form-control" id="floatingDetails" placeholder="Area Name" value ="<?= $rec_data->item_size; ?>" readonly>
                        <label for="floatingDetails">Size</label>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Type" name="cmb_condition">
                        <option value="incomplete">In-completed</option>
                        <option value="broken">Broken</option>
                        <option value="lost">Lost</option>
                    </select>
                    <label for="floatingSelect">Report Type</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="txt_location" class="form-control" id="floatingLocation" placeholder="Location Name" value ="<?= set_value('txt_location'); ?>">
                    <label for="floatingLocation">Location</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="file" name="img" class="form-control">
                    <label for="floatingSelect">Image <i> .jpg, .jpeg, .png</i></label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <textarea name="txt_detail" class="form-control" rows="3" id="floatingDetails" placeholder="Details" ><?= set_value('txt_location'); ?></textarea>
                    <label for="floatingDetails">Details</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" name="txt_determined" class="form-control" id="floatingDetermine" placeholder="To be determined by" value ="<?= set_value('txt_determined'); ?>">
                    <label for="floatingDetermine">To be determined by</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="txt_dposition" class="form-control" id="floatingDposition" placeholder="Position" value ="<?= set_value('txt_dposition'); ?>">
                    <label for="floatingDposition">Position</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" name="txt_acknowledge" class="form-control" id="floatingDetermine" placeholder="Acknowledge" value ="<?= set_value('txt_acknowledge'); ?>">
                    <label for="floatingDetermine">Acknowledge</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="txt_aposition" class="form-control" id="floatingAposition" placeholder="Position" value ="<?= set_value('txt_aposition'); ?>">
                    <label for="floatingAposition">Position</label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="update" value="update">Create Report</button>
            </div>
        </form><!-- End floating Labels Form -->

    </div>
</div>