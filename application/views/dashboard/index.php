<div class="card">
    <div class="card-body">
        <h5 class="card-title">Inventory History</h5>
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
        <!-- Table with hoverable rows -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Item</th>
                        <th scope="col">Inventory Image</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Location</th>
                        <th scope="col">Receive Date/<br/>Return Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($list_item)) { ?>
                        <?php foreach ($list_item as $row) { ?>
                            <tr>
                                <td scope="row"><?= $row->id; ?></td>
                                <td><?= $row->item_name; ?></td>
                                <td><a href="<?= ITEM_PATH . $row->item_image; ?>" target="_blank"><img src="<?= ITEM_PATH . $row->item_image; ?>" class="img img-responsive"  height="100px"/></a></td>
                                <td><?= $row->detail; ?></td>
                                <td>
                                    <?php if ($row->location != '') { ?>
                                        <a href="<?= LOCATION_PATH . $row->location; ?>" target="_blank"><img src="<?= LOCATION_PATH . $row->location; ?>" class="img img-responsive"  height="100px"/></a>
                                    <?php } ?>
                                </td>
                                <td><?= $row->received_date; ?>/<br/><?= $row->return_date; ?></td>
                                <td>
                                    <?php if ($row->return_date == '') { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Active</span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary"><i class="bi bi-info me-1"></i> Returned</span>
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
