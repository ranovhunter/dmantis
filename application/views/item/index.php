<div class="card">
    <div class="card-body">
        <h5 class="card-title">List <?= ucfirst($curr_poss); ?> Inventory</h5>

        <!-- Default Tabs -->
        <?php $this->load->view('item/linktab'); ?>
        <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                <a class="btn btn-primary" href="<?= site_url('item/print'); ?>"><i class="bi bi-qr-code"></i>&nbsp;Print Item QR</a>
                <?php
                if (!empty($err_messages)) {
                    echo $err_messages;
                }
                if (!empty($info_messages)) {
                    echo $info_messages;
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Condition</th>
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
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td>
                                            <?= $row->name; ?><br/>
                                            <?= $row->size > 0 ? 'Size : ' . $row->size : ''; ?>
                                        </td>
                                        <td><?= $row->icondition; ?></td>
                                        <td><?= $row->istatus == 1 ? $row->area_name : 'Rented'; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('item/detail/' . $row->id); ?>" type="button" class="btn btn-primary"><i class="bi bi-gear me-1"></i> View Detail</a>
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