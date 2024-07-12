<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $rec_user->name; ?> - Rent History</h5>
        <div class="table-responsive">
            <!-- Table with hoverable rows -->
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Picture</th>
                        <th scope="col" class="sort">Item Description</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Approve Date</th>
                        <th scope="col">Rent Date</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($list_data)) { ?>
                        <tr class="text-center">
                            <td colspan="3"><i>No History Record..</i></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <?php foreach ($list_data as $row) { ?>
                            <?php $image = $row->filename != '' ? ITEM_PATH . $row->filename : IMG_PATH . 'default-tools.png'; ?>
                            <tr class="text-center">
                                <td><img style="width: 8rem;" class="img img-responsive" src="<?= $image; ?>"/></td>
                                <td>
                                    <?= $row->item_name; ?>
                                    <?= $row->item_size > 0 ? '<br/> Size : ' . $row->item_size : ''; ?>
                                </td>
                                <td><?= $row->request_date; ?></td>
                                <td><?= $row->approve_date; ?></td>
                                <td><?= $row->rent_date; ?></td>
                                <td><?= $row->return_date; ?></td>
                                <td class="text-center">
                                    <?php
                                    $class = "";
                                    $text = "";
                                    switch ($row->rstatus) {
                                        case 3:
                                            $class = 'warning';
                                            $text = 'Requested';
                                            break;
                                        case 2:
                                            $class = 'success';
                                            $text = 'Ready';
                                            break;
                                        case 1:
                                            $class = 'primary';
                                            $text = 'Active';
                                            break;
                                        default :
                                            $class = 'secondary';
                                            $text = 'Returned';
                                            break;
                                    }
                                    ?>
                                    <a type="button" class="btn btn-<?= $class; ?>"><?= $text; ?></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?= $pagination; ?>
        </div>
        <!-- End Table with hoverable rows -->
    </div>
</div>
