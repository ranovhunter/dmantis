<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= site_url();?>" class="logo d-flex align-items-center">
            <img src="<?= IMG_PATH; ?>logo-kpp.png" alt="">
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <?php if ($enable_search) { ?>
        <!-- Search form -->
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="<?= $action_search; ?>">
                <input type="text" placeholder="Search" title="Enter search keyword" name="tx_search" value="<?= set_value('tx_search') ?>">
                <button type="submit" title="Search" name="search" value="search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->
    <?php } ?>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->



            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?= IMG_PATH; ?>/user.png" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $userdata['sess-name']; ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $userdata['sess-name']; ?></h6>
                        <span><?= $userdata['sess-role']; ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= site_url('dashboard/profile/'); ?>">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalSignOut" href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<div class="modal fade" id="modalSignOut" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign Out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to Sign Out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a type="button" class="btn btn-primary"  href="<?= site_url('dashboard/logout'); ?>">Yes</a>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->