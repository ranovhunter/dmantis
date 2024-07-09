<div class="card">
    <div class="card-body">
        <h5 class="card-title">List <?= ucfirst($curr_poss); ?> Rent</h5>
        <?php
        if (!empty($err_messages)) {
            echo $err_messages;
        }
        if (!empty($info_messages)) {
            echo $info_messages;
        }
        ?>
        <!-- Default Tabs -->
        <?php $this->load->view('rent/linktab'); ?>
        <div class="tab-content pt-2" id="myTabjustifiedContent">
            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Request Date</th>
                                <th scope="col">Tools Count</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($rec_data)) { ?>
                                <tr>
                                    <td colspan="3"><i>No Request Rent</i></td>
                                </tr>
                                <?php
                            } else {
                                ?>
                                <?php foreach ($rec_data as $row) { ?>
                                    <tr>
                                        <td><?= $row['userid']; ?></td>
                                        <td><?= ucfirst($row['user_name']); ?></td>
                                        <td><?= $row['phonenumber']; ?></td>
                                        <td><?= $row['request_date']; ?></td>
                                        <td><?= $row['total']; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('rent/approved/' . $row['userid']); ?>" type="button" class="btn btn-primary"><i class="bi bi-gear me-1"></i> View Detail</a>
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