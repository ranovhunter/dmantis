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
        <form class="row g-3 needs-validation" novalidate action="<?php echo site_url('rent/report/' . $rec_data->id); ?>" method="post" role="form" autocomplete="off">
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Item Name" value ="<?= $rec_data->item_name; ?>" readonly>
                    <label for="floatingName">Tools Name</label>
                </div>
            </div>
            <?php if ($rec_data->item_size > 0) { ?>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="txt_detail" class="form-control" id="floatingDetails" placeholder="Area Name" value ="<?= $rec_data->item_size; ?>">
                        <label for="floatingDetails">Size</label>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Type" name="cmb_condition">
                        <option value="incomplete">Not Complete</option>
                        <option value="broken">Broken</option>
                        <option value="lost">Lost</option>
                    </select>
                    <label for="floatingSelect">Report Type</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="update" value="update">Create Report</button>
            </div>
        </form><!-- End floating Labels Form -->

    </div>
</div>