<div class="card">
    <div class="card-body">
        <h5 class="card-title">List Tools Requested by <?= $rec_user->name; ?></h5>

        <?php
        if (!empty($err_messages)) {
            echo $err_messages;
        }
        if (!empty($info_messages)) {
            echo $info_messages;
        }
        ?>
        <!--        <form action="" method="post" class="form-control">
                    <input type="text" class="form-control" name="item_qr" placeholder="Scan Barcode here" autofocus />
                    <input type="hidden" name="submit" value="submit"/>
                </form>-->
        <div class="table-responsive">
            <form action="<?= site_url('rent/request/' . $user_id); ?>" method="post" class="form-control">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Description</th>
                            <th scope="col">Condition</th>
                            <th scope="col">Request Date</th>
                            <th scope="col">Location</th>
                            <th scope="col">Action</th>
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
                                    <td><?= $row->request_date; ?></td>
                                    <td><?= $row->area_name; ?></td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" id="togBtn" name="cb_approve[<?= $row->id; ?>]" checked>
                                            <div class="slider round">
                                                <!--ADDED HTML -->
                                                <span class="on">APPROVE</span>
                                                <span class="off">REJECT</span>
                                                <!--END-->
                                            </div>
                                        </label>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="8"><button class="form-control btn btn-success" name="submit" value="submit">Confirm Request</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 100%;
        height: 34px;
    }

    .switch input {
        display:none;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ca2222;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2ab934;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(55px);
        -ms-transform: translateX(55px);
        transform: translateX(55px);
    }

    /*------ ADDED CSS ---------*/
    .on
    {
        display: none;
    }

    .on, .off
    {
        color: white;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        font-size: 10px;
        font-family: Verdana, sans-serif;
    }

    input:checked+ .slider .on
    {
        display: block;
    }

    input:checked + .slider .off
    {
        display: none;
    }

    /*--------- END --------*/

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 100%;
    }
</style>