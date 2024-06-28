<div class="card">
    <div class="card-body">
        <h5 class="card-title">List Area</h5>
        <div class="table-responsive">
            <!-- Table with hoverable rows -->
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="sort">Area</th>
                        <th scope="col">Detail</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row" colspan="4" class="text-center">
                            <a href="<?= site_url('area/add'); ?>" type="button" class="btn btn-success"><i class="bi bi-plus-square me-1"></i> Add Area</a>
                        </td>
                    </tr>
                    <?php if (empty($list_area)) { ?>
                        <tr>
                            <td colspan="3"><i>No Area Registered</i></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <?php foreach ($list_area as $row) { ?>
                            <tr>
                                <td><?= ucfirst($row->name); ?></td>
                                <td><?= $row->detail; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('area/detail/' . $row->id); ?>" type="button" class="btn btn-primary"><i class="bi bi-gear me-1"></i> View Detail</a>
                                </td>
                            </tr>
                            <?php
                            if (!empty($row->child)) {
                                foreach ($row->child as $rst) {
                                    ?>
                                    <tr>
                                        <td scope="row">-</td>
                                        <td><?= ucfirst($rst->name); ?></td>
                                        <td><?= $rst->detail; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('area/detail/' . $rst->id); ?>" type="button" class="btn btn-primary"><i class="bi bi-gear me-1"></i> View Detail</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- End Table with hoverable rows -->
    </div>
</div>
