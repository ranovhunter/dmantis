<div class="card">
    <div class="card-body">
        <h5 class="card-title">List User <a href="<?= site_url('users/add'); ?>"><i class="bi bi-person-plus"></i></a></h5>

        <!-- Table with hoverable rows -->
        <?= isset($info_messages) ? $info_messages : ''; ?>
        <?= isset($err_messages) ? $err_messages : ''; ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($list_user)) { ?>
                        <tr>
                            <td colspan="3"><i>No User Registered</i></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <?php
                        $i = 1;
                        foreach ($list_user as $row) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= ucfirst($row->name); ?></td>
                                <td><?= $row->id; ?></td>
                                <td><?= $row->phonenumber; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('users/edit/' . $row->id); ?>" type="button" class="btn btn-warning"><i class="bi bi-pencil-square me-1"></i> Edit User</a>
                                    <?php if ($row->roles == 'admin') { ?>
                                        <a onclick="resetPassword(<?= $row->id; ?>)" class="btn btn-secondary" data-bs-target="#modalReset" data-bs-toggle="modal" href="#reset" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password"><i class="bi bi-key"></i> Reset Password</a>
                                    <?php } else { ?>
                                        <a href="<?php echo site_url('users/rent/' . $row->id); ?>" type="button" class="btn btn-primary"><i class="bi bi-card-list me-1"></i> View Rent History</a>
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