<html>

    <head>
        <style>
            .main-box {
                width: 100%;
                float: left;
                margin-bottom: 30px;
            }
            .bx-left {
                float: left;
                display: block;
                width: 15%;
            }
            .bx-right {
                float: left;
                display: block;
                padding-left: 1em;
                width: 80%;
                margin-top: 8px;
            }
            p {
                margin-top: 0px;
                margin-bottom: 0px;
            }
        </style>

    </head>

    <body lang=IN>
        <div class=WordSection1>
            <div class="main-box">
                <div class="bx-left">
                    <img src="<?= IMG_PATH . 'logo-kpp.png' ?>" style="width: 8em"/>
                </div>
                <div class="bx-right">
                    <p style='font-weight: bold;'>PT.KALIMANTAN PRIMA PERSADA</p>
                    <p style='font-style: italic'>Contractor&amp; Mining Developer</p>
                </div>
            </div>

            <div>
                <p style='text-align:center;font-weight: bold;font-size: 18pt;'>BERITA ACARA <?= $rec_data['condition'] == 'broken' ? 'KERUSAKAN' : 'KEHILANGAN'; ?></p>
                <p style='font-weight: bold; text-align:center;'>No. <?= str_pad($rec_data['report_number'], 3, '0', STR_PAD_LEFT); ?>-BA-BDMA/<?= convertToRoman($rec_data['date']['month']); ?>-<?= $rec_data['date']['year']; ?></p>
                <br/>
                <br/>
                <table border=0 cellspacing=0 cellpadding=0 style='border:none'>
                    <tr>
                        <td colspan=3>
                            <p>Pada hari ini,</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 120px">
                            <p>Tanggal</p>
                        </td>
                        <td style='width:12px;'>
                            <p>:</p>
                        </td>
                        <td>
                            <p><?= $rec_data['date']['day']; ?>/<?= $rec_data['date']['month']; ?>/<?= $rec_data['date']['year']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Nama</p>
                        </td>
                        <td style='width:12px;'>
                            <p>:</p>
                        </td>
                        <td>
                            <p><?= $rec_data['name']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Jabatan</p>
                        </td>
                        <td style='width:12px;'>
                            <p>:</p>
                        </td>
                        <td>
                            <p><?= $rec_data['position']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Lokasi</p>
                        </td>
                        <td style='width:12px;'>
                            <p>:</p>
                        </td>
                        <td>
                            <p><?= $rec_data['location']; ?></p>
                        </td>
                    </tr>
                </table>

                <br/><br/>
                <table border=0 cellspacing=0 cellpadding=0 style='border:none'>
                    <tr>
                        <td style="vertical-align: text-top;">
                            <p>Menerangkan bahwa terlah terjadi kerusakan</p>
                        </td>
                        <td style='width:12px;vertical-align: text-top;'>
                            <p>:</p>
                        </td>
                        <td>
                            <img style="height:180px" src="<?= REPORT_PATH . $rec_data['filename']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><br/></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Uraian kejadian</p>
                        </td>
                        <td style='width:12px;'>
                            <p>:</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=3>
                            <p><?= $rec_data['detail']; ?></p>
                        </td>
                    </tr>
                </table>
                <br/>
                <p><?= $rec_data['condition'] == 'broken' ? 'Kerusakan' : 'Kehilangan'; ?> tersebut akan segera diproses penggantiannya dengan biaya penggantian dibebankan kepada :</p>
                <ol>
                    <?php foreach ($rec_data['charged'] as $row) { ?>
                        <li><?= strtoupper($row); ?></li>
                    <?php } ?>
                </ol>

                <br/>
                <p>Demikian berita acara ini dibuat dengan sebenar-benarnya</p>
                <br/><br/>

                <table border=0 cellspacing=0 cellpadding=0 style="width: 100%;">
                    <tr>
                        <td></td><td></td>
                        <td>
                            <p style='text-align:center;'>BDMA, <?= $rec_data['date']['day']; ?> <?= $rec_data['date']['month_name']; ?> <?= $rec_data['date']['year']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 33.33%">
                            <p style='text-align:center;'>Diputuskan oleh,</p>
                        </td>
                        <td style="width: 33.33%">
                            <p style='text-align:center;'>Diketahui oleh,</p>
                        </td>
                        <td>
                            <p style='text-align:center;'>Dibuat oleh,</p>
                        </td>
                    </tr>
                    <tr>
                        <td colsplan=3 >
                            <br/><br/><br/><br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style='text-align:center;'><?= $rec_data['determined']; ?></p>
                        </td>
                        <td>
                            <p style='text-align:center;'><?= $rec_data['acknowledge']; ?></p>
                        </td>
                        <td>
                            <p style='text-align:center;'><?= $rec_data['name']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style='text-align:center;'><?= $rec_data['dposition']; ?></p>
                        </td>
                        <td>
                            <p style='text-align:center;'><?= $rec_data['aposition']; ?></p>
                        </td>
                        <td>
                            <p style='text-align:center;'><?= $rec_data['position']; ?></p>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

    </body>

</html>

<script>
    window.onload = function () {
        window.print();

    }
    window.onafterprint = function () {
        window.location.href = "<?= site_url('report/detail/' . $rec_data['report_id']); ?>";
    }

</script>