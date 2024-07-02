-<div class="card">
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
                            <input type="text" name="txt_quantity" class="form-control" id="floatingQuantitty" placeholder="Quantity" value ="<?= set_value('txt_quantity') ?>" required>
                            <label for="floatingSerialNumber">Quantity</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="txt_size" class="form-control" id="floatingSize" placeholder="Quantity" value ="<?= set_value('txt_size') ?>">
                            <label for="floatingSerialNumber">Size</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Type" name="cmb_condition">
                                <option value="good">Good</option>
                                <option value="incomplete">Good (Incomplete)</option>
                            </select>
                            <label for="floatingSelect">Condition</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Location" name="cmb_area">
                                <?php foreach ($list_area as $row) { ?>
                                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                <?php } ?>
                            </select>
                            <label for="floatingName">Location</label>
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