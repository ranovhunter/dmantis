<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add New Area</h5>
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
        <form class="row g-3 needs-validation" novalidate action="<?php echo site_url('area/add'); ?>" method="post" role="form" autocomplete="off">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" name="txt_name" class="form-control" id="floatingName" placeholder="Area Name" value ="<?= set_value('txt_name') ?>" required>
                    <label for="floatingName">Area Name</label>
                    <div class="invalid-feedback">Please enter Area name!</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" name="txt_detail" class="form-control" id="floatingDetails" placeholder="Area Name" value ="<?= set_value('txt_detail') ?>">
                    <label for="floatingDetails">Area Details</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Area</button>
            </div>
        </form><!-- End floating Labels Form -->

    </div>
</div>