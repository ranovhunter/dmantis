<div class="card">
    <div class="card-body">
        <h5 class="card-title">Rent History </h5>
        <?php
        if (!empty($error_messages)) {
            echo $error_messages;
        }
        ?>
        <?= $form_validation_errors; ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Description</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Area Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                    if (!empty($rec_data)) {
                        $i = 1;
                        ?>
                        <?php foreach ($rec_data as $row) { ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td>
                                    <?= $row->item_name; ?><br/>
                                    <?= $row->item_size > 0 ? 'Size : ' . $row->item_size : ''; ?>
                                </td>
                                <td><?= $row->icondition; ?></td>
                                <td><?= $row->request_date; ?></td>
                                <td><?= $row->return_date; ?></td>
                                <td><?= $row->area_name; ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>