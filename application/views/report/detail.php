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
                    <input type="text" class="form-control" id="floatingReport" placeholder="Report ID" value ="<?= $report_data->rent_id ?>" disabled>
                    <label for="floatingName">Report ID</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingReason" placeholder="Reason" value ="<?= $report_data->reason ?>" disabled>
                    <label for="floatingReason">Reason</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingLocation" placeholder="Location" value ="<?= $report_data->location ?>" disabled>
                    <label for="floatingLocation">Location</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingDetail" placeholder="Detail" value ="<?= $report_data->detail ?>" disabled>
                    <label for="floatingDetail">Detail</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingRequestDate" placeholder="Request Date" value ="<?= $report_data->request_date ?>" disabled>
                    <label for="floatingRequestDate">Request Date</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="User" placeholder="Rent User" value ="<?= $report_data->rent_user_name ?>" disabled>
                    <label for="floatingRentUser">Rent User</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingReportDate" placeholder="Report Date" value ="<?= $report_data->report_date ?>" disabled>
                    <label for="floatingReportDate">Report Date</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingReportUser" placeholder="Report User" value ="<?= $report_data->report_user ?>" disabled>
                    <label for="floatingReportUser">Report User</label>
                </div>
            </div>

        </form><!-- End floating Labels Form -->
        <br>
        <div class="text-center">
            <a href="<?php echo site_url('report/print/'); ?>" type="button" class="btn btn-primary"><i class="bi bi-printer-fill"></i> Print Out</a>
        </div>
    </div>
</div>