<div class="card">
    <div class="card-body">
        <h5 class="card-title">List <?= ucfirst($curr_poss); ?> Inventory</h5>

        <?php
        if (!empty($err_messages)) {
            echo $err_messages;
        }
        if (!empty($info_messages)) {
            echo $info_messages;
        }
        ?>
        <!--        <form action="" method="post" class="form-control">
                    <input type="text" class="form-control" name="item_qr" placeholder="Scan Barcode here" autofocus />
                    <input type="hidden" name="submit" value="submit"/>
                </form>-->
        <div class="table-responsive">
            <form action="<?= site_url('rent/request/' . $user_id); ?>" method="post" class="form-control">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Name</th>
                            <th scope="col">Size</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Condition</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">Location</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php
                        if (!empty($list_data)) {
                            $i = 1;
                            ?>
                            <?php foreach ($list_data as $row) { ?>
                                <?php $image = $row->filename != '' ? ITEM_PATH . $row->filename : IMG_PATH . 'default-tools.png'; ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><img style="width: 8rem;" src="<?= $image; ?>" class="img img-responsive"></td>
                                    <td><?= $row->item_name; ?></td>
                                    <td><?= $row->item_size; ?></td>
                                    <td><input name="item[<?= $row->id; ?>]" type="number" value="<?= set_value('txt_qty', $row->quantity); ?>" min="0" max="<?= $row->quantity ?>"></td>
                                    <td><?= $row->icondition; ?></td>
                                    <td><?= $row->request_date; ?></td>
                                    <td><?= $row->area_name; ?></td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="8"><button class="form-control btn btn-success" name="submit" value="submit">Approve Request</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>