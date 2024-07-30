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
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" name="txt_name" class="form-control" id="floatingName" placeholder="Name" value ="<?= set_value('txt_name') ?>" required>
                    <label for="floatingDetails">Name*</label>
                    <div class="invalid-feedback">Please enter Item Name!</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="txt_nrp" class="form-control" id="floatingNRP" placeholder="Users ID" value ="<?= set_value('txt_nrp'); ?>">
                    <label for="floatingNRP">User ID (NRP)</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="number" name="txt_phone" class="form-control" id="floatingPhoneNumber" placeholder="Phone Number" value ="<?= set_value('txt_phone'); ?>">
                    <label for="floatingAssetNumber">Phone Number</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" name="txt_job" class="form-control" id="floatingJobPosition" placeholder="Job Position" value ="<?= set_value('txt_job') ?>" required>
                    <label for="floatingDetails">Job Position*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" name="txt_gl" class="form-control" id="floatingJobPosition" placeholder="Group Leader" value ="<?= set_value('txt_gl') ?>" required>
                    <label for="floatingDetails">Group Leader</label>
                    <div class="invalid-feedback">Please enter Group Leader Name</div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Add User</button>
            </div>
        </form><!-- End floating Labels Form -->
    </div>
</div>