<div class="card">
    <div class="card-body">
        <h5 class="card-title">Report Detail

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
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="User" placeholder="Rent User" value ="<?= $report_data->rent_user_name ?>" readonly>
                    <label for="floatingRentUser">Rent User</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingLocation" placeholder="Location" value ="<?= $report_data->location ?>" readonly>
                    <label for="floatingLocation">Location</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingReport" placeholder="Report ID" value ="<?= $report_data->item_name; ?>" readonly>
                    <label for="floatingName">Item Name</label>
                </div>
            </div>
            <?php if ($report_data->item_size > 0) { ?>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingReport" placeholder="Report ID" value ="<?= $report_data->item_size; ?>" readonly>
                        <label for="floatingName">Item Size</label>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingReason" placeholder="Reason" value ="<?= $report_data->reason ?>" readonly>
                    <label for="floatingReason">Reason</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingDetail" placeholder="Detail" value ="<?= $report_data->detail ?>" readonly>
                    <label for="floatingDetail">Detail</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingRequestDate" placeholder="Request Date" value ="<?= $report_data->request_date ?>" readonly>
                    <label for="floatingRequestDate">Request Date</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingReportDate" placeholder="Report Date" value ="<?= $report_data->report_date ?>" readonly>
                    <label for="floatingReportDate">Report Date</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingReportUser" placeholder="Report User" value ="<?= $report_data->report_user ?>" readonly>
                    <label for="floatingReportUser">Report User</label>
                </div>
            </div>
            <div class="col-md-6">
                <img src="<?= REPORT_PATH . $report_data->filename; ?>" class="img img-responsive" style="max-height: 400px" />
            </div>

        </form><!-- End floating Labels Form -->
        <br>
        <div class="text-center">
            <a href="<?php echo site_url('report/print/' . $report_data->id); ?>" type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print Out</a>
        </div>
    </div>
</div>