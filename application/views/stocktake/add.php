<div class="row">
    <div class="col-xl-12 order-xl-1">
        <?php
        if (!empty($error_messages)) {
            echo $error_messages;
        }
        if (!empty($success_messages)) {
            echo $success_messages;
        }
        ?>
        <?= $form_validation_errors; ?>
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Add New Category</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('category/add'); ?>" method="post" role="form" autocomplete="off">
                    <h6 class="heading-small text-muted mb-4">Category Detail</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Parent Category</label>
                                    <select name="cmb_category" class="form-control">
                                        <option value="0">-</option>
                                        <?php foreach($parent_category as $row){?>
                                            <option value="<?= $row->id;?>"><?= $row->name;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Category Name</label>
                                    <?php echo form_input(array('name' => 'txt_name', 'id' => 'name', 'class' => 'form-control', 'value' => set_value('txt_name'))); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Category Details</label>
                                    <textarea class="form-control" name="txt_detail"><?= set_value('txt_detail'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary my-4" name="submit" value="submit">Add Category</button>
                        </div>
                    </div>
                    <hr class="my-4" />

                </form>
            </div>
        </div>
    </div>
</div>