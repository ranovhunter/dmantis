<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card shadow">
            <div class="card-body">
                <?php
                if (!empty($err_messages)) {
                    echo $err_messages;
                }
                if (!empty($info_messages)) {
                    echo $info_messages;
                }
                ?>
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Search result : <?= $keyword; ?></h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id">#</th>
                                <th scope="col" class="sort" data-sort="name">Name</th>
                                <th scope="col" class="sort" data-sort="sn">Serial Number</th>
                                <th scope="col" class="sort" data-sort="an">Asset Number</th>
                                <th scope="col" class="sort" data-sort="type">Type</th>
                                <th scope="col" class="sort" data-sort="cat">Category</th>
                                <th scope="col" class="sort" data-sort="cat">Status</th>
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
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['serial_number']; ?></td>
                                        <td><?= $row['asset_number']; ?></td>
                                        <td><?= $row['type'] == 0 ? 'Asset' : 'Expense'; ?></td>
                                        <td><?= $row['category_name']; ?></td>
                                        <td><?= $row['status'] == 1 ? 'Stored' : 'Active'; ?></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="<?php echo site_url('item/detail/' . $row['id']); ?>">View Detail</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?= $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</div>