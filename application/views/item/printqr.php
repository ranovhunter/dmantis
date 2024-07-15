<?php
foreach ($list_data as $row) {
    ?>

    <div class="main-box">
        <img src="<?= QR_UPLOADED . $row['qrcode'] . '.png' ?>" alt="" width="100px" height="100px" />
        <span class="text-info"><?= $row['qrcode']; ?></span>
    </div>

    <?php
}
?>

<style>
    .main-box {
        margin :10px 5px 10px 5px;
        width: 120px;
        height:125px;
        border: 2px;
        border-style:solid;
        text-align: center; 
        float: left;
    }
    .text-info{
        display: block;
        font-size: 0.8em;
    }
</style>
<script>
    window.onload = function () {
        window.print();

    }
    window.onafterprint = function () {
        window.location.href = "<?= site_url('item/print'); ?>";
    }

</script>