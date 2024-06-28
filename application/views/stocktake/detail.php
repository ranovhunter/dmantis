<script src="<?= JS_PATH; ?>/html5-qrcode.min.js"></script>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Stock Take Inventory</h5>
        <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" method="post" action="<?= site_url('stocktake/scan'); ?>">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Scan QR Code" aria-label="Scan QR Code" aria-describedby="basic-addon2" name="tx_scan" value="<?= set_value('tx_scan') ?>" autofocus>
                <span class="input-group-text" id="basic-addon2"><i class="bi bi-qr-code"></i></span>
            </div>
            <button type="submit" class="close" aria-label="Close" name="scan" value="scan" hidden></button>
        </form>
        <?php
        if (!empty($err_messages)) {
            echo $err_messages;
        }
        if (!empty($info_messages)) {
            echo $info_messages;
        }
        ?>
        <!-- Table with hoverable rows -->

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">QR CODE</th>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Asset Number</th>
                        <th scope="col">Category</th>
                        <th scope="col">Result</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($list_data)) { ?>
                        <tr>
                            <td colspan="8"><i>No Inventory</i></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <?php
                        $i = (($page - 1) * 20) + 1;
                        foreach ($list_data as $row) {
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row->item_name; ?></td>
                                <td><?= $row->item_qrcode; ?></td>
                                <td><?= $row->serial_number; ?></td>
                                <td><?= $row->asset_number; ?></td>
                                <td><?= $row->category_name; ?></td>
                                <td class="text-center">
                                    <?php
                                    switch ($row->status) {
                                        case '':
                                            echo '<span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> Not Checked</span>';
                                            break;
                                        case 0:
                                            echo '<span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Missing</span>';
                                            break;
                                        case 1:
                                            echo '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Exists</span>';
                                            break;
                                        default:
                                            echo '';
                                    }
                                    ?>
                                <td class="text-right">
                                    <a href="<?php echo site_url('stocktake/check/' . $row->id); ?>" class="btn btn-<?= $row->is_checked ? 'secondary' : 'warning'; ?>" role="button" aria-pressed="true"><i class="bi bi-box-arrow-right"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?= $pagination; ?>
        <!-- End Table with hoverable rows -->
    </div>
</div>

<script type="text/javascript">
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;

    function onScanSuccess(decodedText, decodedResult) {
        if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;
// Handle on success condition with the decoded message.
            console.log(`Scan result ${decodedText}`, decodedResult);
        }
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {fps: 10, qrbox: 250});
    html5QrcodeScanner.render(onScanSuccess);</script>