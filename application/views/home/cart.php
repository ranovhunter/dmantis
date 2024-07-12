<div class="card">
    <div class="card-body">
        <h5 class="card-title">Cart</h5>
        <div class="table-responsive">
            <!-- Table with hoverable rows -->
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Picture</th>
                        <th scope="col" class="sort">Item Description</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($list_data)) { ?>
                        <tr>
                            <td colspan="3"><i>Cart Empty</i></td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <?php foreach ($list_data as $row) { ?>
                            <?php $image = $row->filename != '' ? ITEM_PATH . $row->filename : IMG_PATH . 'default-tools.png'; ?>
                            <tr class="text-center">
                                <td><img style="width: 8rem;" class="img img-responsive" src="<?= $image; ?>"/></td>
                                <td>
                                    <?= $row->name; ?>
                                    <?= $row->size > 0 ? '<br/> Size : ' . $row->size : ''; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('home/rmcart/' . $userid . '/' . $row->id); ?>" type="button" class="btn btn-warning"><i class="bi bi-cart-dash me-1"></i> Remove</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <tr>
                        <td scope="row" colspan="4" class="text-center">
                            <a href="<?= site_url('home/emcart/' . $userid); ?>" type="button" class="btn btn-danger"><i class="bi bi-cart-x me-1"></i> Empty Cart..</a>
                            <a href="<?= site_url('home/request/' . $userid); ?>" type="button" class="btn btn-success"><i class="bi bi-cart-plus me-1"></i> Add More..</a>
                            <a href="<?= site_url('home/confirm/' . $userid); ?>" type="button" class="btn btn-primary"><i class="bi bi-check me-1"></i> Confirm Order..</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End Table with hoverable rows -->
    </div>
</div>
