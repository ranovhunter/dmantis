<div class="container-fluid">
    <!-- Add Company -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Reset Password - <?= $rec_data->name; ?></h4>
        </div>
        <div class="card-body">
            <?php
            if (!empty($error_messages)) {
                echo $error_messages;
            }
            if (!empty($success_messages)) {
                echo $success_messages;
            }
            ?>
            <form action="<?php echo site_url('administration/reset/' . $rec_data->id); ?>" method="post" role="form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">New Password</label>
                            <?php echo form_password(array('name' => 'txt_new_pass', 'id' => 'new_pass', 'class' => 'form-control', 'value' => "")); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Retype :</label>
                            <?php echo form_password(array('name' => 'txt_retype', 'id' => 'retype', 'class' => 'form-control', 'value' => "")); ?>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" value="Reset Password" class="btn btn-primary pull-right" />
            </form>
        </div>
    </div>
</div>