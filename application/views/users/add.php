<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add User </h5>
        <?php
        if (!empty($error_messages)) {
            echo $error_messages;
        }
        ?>
        <?= $form_validation_errors; ?>
        <!-- Floating Labels Form -->
        <form action="<?php echo site_url('users/add'); ?>" method="post" role="form" autocomplete="off" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate >
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="txt_userid" class="form-control" id="floatingEmail" placeholder="Users ID" value ="<?= set_value('txt_userid'); ?>" required>
                    <label for="floatingAssetNumber">User ID</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" name="txt_name" class="form-control" id="floatingName" placeholder="Name" value ="<?= set_value('txt_name') ?>" required>
                    <label for="floatingDetails">Name</label>
                    <div class="invalid-feedback">Please enter Item Name!</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="number" name="txt_phone" class="form-control" id="floatingPhoneNumber" placeholder="Phone Number" value ="<?= set_value('txt_phone'); ?>">
                    <label for="floatingAssetNumber">Phone Number</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Add User</button>
            </div>
        </form><!-- End floating Labels Form -->
    </div>
</div>