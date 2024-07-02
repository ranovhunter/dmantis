<div class="card">
    <div class="card-body">
        <h5 class="card-title">List <?= ucfirst($curr_poss); ?> Inventory</h5>

        <!-- Default Tabs -->
        <?php $this->load->view('item/linktab'); ?>
        <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                <?php
                if (!empty($err_messages)) {
                    echo $err_messages;
                }
                if (!empty($info_messages)) {
                    echo $info_messages;
                }
                ?>
                <form action="" method="post" class="form-control">
                    <input type="text" class="form-control" name="item_qr" placeholder="Scan Barcode here" autofocus />
                    <input type="hidden" name="submit" value="submit"/>
                </form>
                <div class="table-responsive">
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
                                        <td><?= $row->quantity; ?></td>
                                        <td><?= $row->icondition; ?></td>
                                        <td><?= $row->request_date; ?></td>
                                        <td><?= $row->area_name; ?><img src="<?= QR_UPLOADED . $row->qrcode; ?>.png"></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('rent/out/' . $row->id); ?>" type="button" class="btn btn-primary"><i class="bi bi-arrow-up-right me-1"></i>Manual Out</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?= $pagination; ?>
            </div>
        </div><!-- End Default Tabs -->

    </div>
</div>