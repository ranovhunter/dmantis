<div class="card">
    <div class="card-body">
        <h5 class="card-title">Stock Take History</h5>
        <?= $info_messages; ?>
        <!-- Table with hoverable rows -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalCreate"  type="button" class="btn btn-success"><i class="bi bi-calendar-plus me-1"></i> Create Stock Take Event</a>
        <hr/>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Start Date</th>
                        <th scope="col">Start User</th>
                        <th scope="col">End Date</th>
                        <th scope="col">End User</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($list_data)) { ?>
                        <tr>
                            <td colspan="6"><i>No Stock Take History Registered</i></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <?php foreach ($list_data as $row) { ?>
                            <tr>
                                <td><?= $row['start_date']; ?></td>
                                <td><?= ucfirst($row['s_user_name']); ?></td>
                                <td><?= $row['end_date']; ?></td>
                                <td><?= ucfirst($row['e_user_name']); ?></td>
                                <td class="text-center">
                                    <?php if ($row['status']) { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Active</span>
                                        <?= $row['close_item']; ?> of <?= $row['total_item']; ?> Completed
                                        <?php $percentage = $row['close_item'] / $row['total_item'] * 100; ?>
                                        <div class="progress mt-3">
                                            <div class="progress-bar" role="progressbar" style="width: <?= $percentage; ?>%" aria-valuenow="<?= $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary"><i class="bi bi-check-circle me-1"></i> Closed</span>
                                    <?php } ?>  
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="<?= site_url('stocktake/detail/' . $row['id']); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="View Detail"><i class="bi bi-card-list"></i></a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalClose"href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Close Stock Take"><i class="bi bi-calendar-x"></i></a>
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

<div class="modal fade" id="modalCreate" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stock Take Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to create new Stock Take Event?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a type="button" class="btn btn-primary"  href="<?= site_url('stocktake/create'); ?>">Yes</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalClose" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stock Take Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to Close this Stock Take Event?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a type="button" class="btn btn-primary"  href="<?= site_url('stocktake/close/' . $row['id']); ?>">Yes</a>
            </div>
        </div>
    </div>
</div>