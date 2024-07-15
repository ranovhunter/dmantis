<div class="card">
    <div class="card-body">

        <h5 class="card-title">-</h5>

        <!-- Table with hoverable rows -->
        <?= isset($info_messages) ? $info_messages : ''; ?>
        <?= isset($err_messages) ? $err_messages : ''; ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Location</th>
                        <th scope="col">Report Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($report_data)) { ?>
                        <tr>
                            <td colspan="3"><i>No Reports Available</i></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <?php
                        foreach ($report_data as $row) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $row->id; ?></td>
                                <td><?= $row->reason; ?></td>
                                <td><?= $row->location; ?></td>
                                <td><?= $row->report_date; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('report/detail/' . $row->rent_id); ?>" type="button" class="btn btn-primary"><i class="bi bi-card-list me-1"></i> View Detail</a>
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
<div class="modal fade" id="modalReset" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to Reset this user password?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a type="button" class="btn btn-primary" id="linkReset" href="#">Yes</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function resetPassword(id) {
        document.getElementById("linkReset").href = "users/reset/" + id
    }
</script>