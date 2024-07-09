<div class="card">
    <div class="card-body">
        <h5 class="card-title">List <?= ucfirst($curr_poss); ?> Inventory</h5>

        <?php
        if (!empty($err_messages)) {
            echo $err_messages;
        }
        if (!empty($info_messages)) {
            echo $info_messages;
        }
        ?>
        <input type="text" class="form-control qrinput" onfocus="this.value = '';" name="item_qr" id="itemqr" placeholder="Scan Barcode here" autofocus />
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
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
                                <td><?= $row->item_name; ?></td>
                                <td><?= $row->item_size; ?></td>
                                <td><?= $row->quantity; ?><img src="<?= QR_UPLOADED . $row->qrcode; ?>.png"></td>
                                <td><?= $row->icondition; ?></td>
                                <td><?= $row->rent_date; ?></td>
                                <td class="text-center">
                                    <a onclick="shmodal()" class="btn btn-primary"><i class="bi bi-arrow-bar-down me-1"></i>Manual In</a>
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
<div class="modal fade" id="modalVerify" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <form class="form-control" method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Receive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="dmmodal()" class="btn btn-secondary" >Cancel</button>
                    <a type="button" class="btn btn-primary"  href="<?= site_url('stocktake/create'); ?>">Yes</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--site_url('rent/in/'.$user_id.)-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
                        $(".qrinput").on('keyup', function (e) {
                            if (e.key === 'Enter' || e.keyCode === 13) {
                                var qrvalue = document.getElementById('itemqr').value;
                                shmodal(qrvalue);
                            }
                        });
                        function shmodal(qrvalue) {
                            $.ajax({
                                type: 'POST',
                                url: '<?= site_url('rent/get_detail/' . $user_id); ?>',
                                data: 'qrvalue=' + qrvalue,
                                success: function (response) {
//                                    $('#employee').html(response);
                                    alert(response);
                                }
                            });
                            $("#modalVerify").modal('show');
                        }
                        function dmmodal() {
                            $("#modalVerify").modal('hide');
                            document.getElementById('itemqr').focus();
                        }
</script>