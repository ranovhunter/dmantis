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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">qrcode</th>
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
                                        <td><?= $row->name; ?></td>
                                        <td><?= $row->qrcode; ?></td>
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