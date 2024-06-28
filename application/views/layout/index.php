<!DOCTYPE html>
<html lang="en">
    <head>      
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        render_html_title($html_title);
        render_html_metalink($html_meta);
        render_html_metalink($html_link, 'link');
        ?>
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!-- Favicons -->
        <link href="<?= IMG_PATH; ?>/favicon.png" rel="icon">
        <link href="<?= IMG_PATH; ?>/apple-touch-icon.png" rel="apple-touch-icon">

    </head>
    <body>
        <?php $this->load->view('layout/header'); ?>
        <?php $this->load->view('layout/menu'); ?>
        <main id="main" class="main">
            <?php $this->load->view('layout/subheader'); ?>
            <?php $this->load->view('layout/content'); ?>
        </main>
        <?php $this->load->view('layout/footer'); ?>  
        <?php render_html_metalink($html_script, 'script'); ?>
    </body>
</html>
