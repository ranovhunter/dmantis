<div class="card">
    <div class="card-body">
        <div class="col-md-8">
            <h5 class="card-title">Check Inventory - <?= $rec_data->item_name; ?></h5>
        </div>
        <div class="col-md-4">
            <img class="img img-responsive" src="<?= ITEM_PATH . $rec_data->filename; ?>" height="150px"/>
        </div>
        <?php
        if (!empty($error_messages)) {
            echo $error_messages;
        }
        if (!empty($success_messages)) {
            echo $success_messages;
        }
        ?>
        <?= $form_validation_errors; ?>
        <?php $is_checked = $rec_data->is_checked == 1 ? true : false; ?>
        <!-- Floating Labels Form -->
        <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                <?php if (!$is_checked) { ?>
                    <form action="<?php echo site_url('stocktake/check/' . $rec_data->id); ?>" method="post" role="form" autocomplete="off" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate >
                    <?php } else { ?>
                        <div class="row g-3">
                        <?php } ?>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" disabled class="form-control" value="<?= $rec_data->serial_number ?>" />
                                <label for="floatingSN">Serial Number</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" disabled class="form-control" value="<?= $rec_data->asset_number ?>" />
                                <label for="floatingAN">Asset Number</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" disabled class="form-control" value="<?= $rec_data->category_name ?>" />
                                <label for="floatingCategory">Category</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" disabled class="form-control" value="<?= strtoupper($rec_data->dic); ?>" />
                                <label for="floatingDIC">Department in Charge</label>
                            </div>
                        </div>
                        <?php if (!$is_checked) { ?>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select name="cmb_condition" class="form-select">
                                        <option value="good">Good</option>
                                        <option value="broken">Broken</option>
                                        <option value="service">Service</option>
                                        <option value="lost">Lost</option>
                                    </select>
                                    <label for="floatingAN">Condition</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select name="cmb_status" class="form-select">
                                        <option value="1">Ada</option>
                                        <option value="0">Tidak Ada</option>
                                    </select>
                                    <label for="floatingCategory">Status</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Location" name="txt_location" id="floatingTextarea" style="height: 100px;"><?= set_value('txt_location'); ?></textarea>
                                    <label for="floatingTextarea">Location</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="file" name="img_item" class="form-control">
                                    <label for="floatingSelect">Picture<i> .jpg, .jpeg, .png</i></label>
                                </div>
                            </div>
                            <?php if (!$is_checked) { ?>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4" name="submit" value="submit">Submit Data</button>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" disabled class="form-control" value="<?= $rec_data->status == 0 ? 'Tidak Ada' : 'Ada'; ?>" />
                                    <label for="floatingStatus">Status</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" disabled class="form-control" value="<?= ucfirst($rec_data->condition) ?>" />
                                    <label for="floatingCondition">Condition</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" disabled class="form-control" value="<?= $rec_data->check_date; ?>" />
                                    <label for="floatingCD">Check Date</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" disabled class="form-control" value="<?= $rec_data->check_user_name; ?>" />
                                    <label for="floatingCU">Check User</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea disabled class="form-control" style="height: 150px;"><?= $rec_data->location; ?></textarea>
                                    <label for="floatingCondition">Location</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img class="img img-responsive" src="<?= ITEM_PATH . $rec_data->picture; ?>" height="150px"/>
                            </div>
                        <?php } ?>
                        <?php if ($is_checked) { ?>
                        </div>
                    <?php } else { ?>
                    </form>
                <?php } ?>
            </div>
        </div><!-- End floating Labels Form -->
    </div>
</div>