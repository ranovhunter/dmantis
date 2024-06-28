<div class="pagetitle">
    <h1><?= ucfirst($module); ?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url($module); ?>"><?= ucfirst($module); ?></a></li>
            <li class="breadcrumb-item active"><?= ucfirst($method); ?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->
