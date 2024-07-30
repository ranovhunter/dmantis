<div class="card">
    <div class="card-body">
        <h5 class="card-title">List <?= ucfirst($curr_poss); ?> Rent</h5>

        <!-- Default Tabs -->
        <?php $this->load->view('rent/linktab'); ?>
        <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                <form action="<?= site_url('rent/scan'); ?>" method="post" class="form-control">
                    <input type="text" class="form-control" name="user_qr" placeholder="Scan User Barcode here" autofocus />
                    <input type="hidden" name="type" value="return"/>
                    <input type="hidden" name="submit" value="submit"/>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Rent Date</th>
                                <th scope="col">Tools Count</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($rec_active_rent)) { ?>
                                <tr>
                                    <td colspan="6"><i>No Active Rent</i></td>
                                </tr>
                                <?php
                            } else {
                                ?>
                                <?php foreach ($rec_active_rent as $row) { ?>
                                    <tr>
                                        <td><?= $row['userid']; ?></td>
                                        <td><?= ucfirst($row['user_name']); ?></td>
                                        <td><?= $row['phonenumber']; ?></td>
                                        <td><?= $row['rent_date']; ?></td>
                                        <td><?= $row['total']; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('rent/return/' . $row['userid']); ?>" type="button" class="btn btn-primary"><i class="bi bi-gear me-1"></i> View Detail</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>