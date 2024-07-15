<div class="card">
    <div class="card-body">
        <h5 class="card-title">List <?= ucfirst($curr_poss); ?> Inventory</h5>

        <!-- Default Tabs -->
        <?php
        if (!empty($err_messages)) {
            echo $err_messages;
        }
        if (!empty($info_messages)) {
            echo $info_messages;
        }
        ?>
        <form action="<?php echo site_url('item/print'); ?>" method="post" role="form" id="printqr" class="row g-3"  >
            <div class="row">
                <?php foreach ($list_data as $row) { ?>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" aria-label="Checkbox for following text input" value="<?= $row->id; ?>" name="chk_item[]"" checked>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $row->name; ?>" readonly>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark" name="submit" value="submit"><i class="bi bi-qr-code me-1"> </i>Print QR</button>
            </div>
        </form>
    </div>
</div>
<script>
    function selectAll() {
        document.getElementById("chk_item").checked = true;
    }
    function deselectAll() {
        document.getElementById("chk_item").checked = false;
    }
</script>