<div class="card">
    <div class="card-body">
        <h5 class="card-title">Add New Item</h5>
        <?php $this->load->view('item/linktab'); ?>
        <?php
        if (!empty($error_messages)) {
            echo $error_messages;
        }
        ?>
        <?= $form_validation_errors; ?>
        <!-- Floating Labels Form -->
        <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                <form action="<?php echo site_url('item/add'); ?>" method="post" role="form" autocomplete="off" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate >
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="txt_name" class="form-control" id="floatingName" placeholder="Name" value ="<?= set_value('txt_name') ?>" required>
                            <label for="floatingDetails">Name</label>
                            <div class="invalid-feedback">Please enter Item Name!</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="txt_sn" class="form-control" id="floatingSerialNumber" placeholder="Serial Number" value ="<?= set_value('txt_sn') ?>" required>
                            <label for="floatingSerialNumber">Serial Number</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Details" name="txt_detail" id="floatingTextarea" style="height: 100px;"><?= set_value('txt_detail'); ?></textarea>
                            <label for="floatingTextarea">Details</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="file" name="img_item" class="form-control">
                            <label for="floatingSelect">Item Image <i> .jpg, .jpeg, .png</i></label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Item</button>
                    </div>
                </form><!-- End floating Labels Form -->
            </div>
        </div>
    </div>
</div>