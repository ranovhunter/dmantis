<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Item 
            <a href="<?= site_url('item/update/' . $rec_data->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Item"><i class="bi bi-pencil-square"></i></a>
            <?php if ($rec_data->status == 1) { ?>
                <a href="<?= site_url('item/assign/' . $rec_data->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Assign To User"><i class="bi bi-person-check-fill"></i></a>
            <?php } ?>
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
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" name="txt_name" class="form-control" id="floatingName" placeholder="Category Name" value ="<?= $rec_data->name ?>" disabled>
                    <label for="floatingName">Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="txt_name" class="form-control" id="floatingSN" placeholder="Serial Number" value ="<?= $rec_data->serial_number ?>" disabled>
                    <label for="floatingSN">Serial Number</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Details" name="txt_detail" id="floatingDetails" style="height: 100px;" disabled><?= $rec_data->details ?></textarea>
                    <label for="floatingDetails">Details</label>
                </div>
            </div>
            <?php if ($rec_data->filename != '') { ?>
                <div class="col-md-4">
                    <div class="form">
                        <label class="form-control-label" for="item-image">Image</label>
                        <img class="img img-responsive" src="<?= ITEM_PATH . $rec_data->filename; ?>" height="150px"/>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-4">
                <div class="form">
                    <label class="form-control-label" for="item-image">QR Code</label>
                    <img class="img img-responsive" src="<?= QR_UPLOADED . $rec_data->qrcode . '.png'; ?>" height="150px"/>
                </div>
            </div>
        </form><!-- End floating Labels Form -->

    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $rec_data->name; ?> - History</h5>
        <div class="table-responsive">
            <!-- Table with hoverable rows -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Location</th>
                        <th scope="col">Receive Date</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($user_item)) { ?>
                        <?php foreach ($user_item as $row) { ?>
                            <tr>
                                <td><?= $row->id; ?></td>
                                <td><?= $row->user_name; ?></td>
                                <td><?= $row->detail; ?></td>
                                <td><?= display_image(LOCATION_PATH, $row->location); ?></td>
                                <td><?= $row->received_date; ?></td>
                                <td><?= $row->return_date; ?></td>
                                <td>
                                    <?php if ($row->return_date == '') { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Active</span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary"><i class="bi bi-info me-1"></i> Stored</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($row->return_date == '' && $row->dic == $userdata['sess-dept']) { ?>
                                        <a class="btn btn-warning" href="<?= site_url('item/aupdate/' . $row->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Update History"><i class="bx bx-edit"></i></a>
                                        <a class="btn btn-info" href="<?= site_url('item/ireturn/' . $row->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Return"><i class="bi bi-arrow-counterclockwise"></i></a>
                                        <?php } ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- End Table with hoverable rows -->
    </div>
</div>