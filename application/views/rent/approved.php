<div class="card">
    <div class="card-body">
        <h5 class="card-title">List <?= ucfirst($curr_poss); ?> Rent</h5>
        <form class="row g-3 needs-validation" >
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="Name" value ="<?= $rec_user->name; ?>" readonly>
                    <label for="floatingDetails">Name</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingNrp" placeholder="NRP" value ="<?= $rec_user->nrp; ?>" readonly>
                    <label for="floatingNrp">NRP</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingGL" placeholder="G/L" value ="<?= $rec_user->groupleader; ?>" readonly>
                    <label for="floatingGL">G/L</label>
                </div>
            </div>
        </form><br/>

        <?php
        if (!empty($err_messages)) {
            echo $err_messages;
        }
        if (!empty($info_messages)) {
            echo $info_messages;
        }
        ?>
        <form action="<?= site_url('rent/approved/' . $user_id); ?>" method="post" class="form-control">
            <input type="text" class="form-control" name="item_qr" placeholder="Scan Barcode here" autofocus />
            <input type="hidden" name="submit" value="submit"/>
        </form>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Description</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Rent Date</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                    if (!empty($list_data)) {
                        $i = 1;
                        ?>
                        <?php foreach ($list_data as $row) { ?>
                            <?php $image = $row->filename != '' ? ITEM_PATH . $row->filename : IMG_PATH . 'default-tools.png'; ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><img style="width: 8rem;" src="<?= $image; ?>" class="img img-responsive"></td>
                                <td><?= $row->item_name; ?><?= $row->item_size > 0 ? ' <br><p class="text-secondary">Size : ' . $row->item_size . '</p>' : ''; ?></td>
                                <td><?= $row->icondition; ?></td>
                                <td><?= $row->rent_date; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('rent/out/' . $user_id . '/' . $row->qrcode); ?>" type="submit" class="btn btn-primary"><i class="bi bi-arrow-bar-up me-1"></i>Manual Out</a>
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
    </div>
</div>