<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= IMG_PATH; ?>logo-sm.png" class="img-fluid" style="max-width:40px;">
        </div>
        <div class="sidebar-brand-text mx-3">AHD Fossel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $menu == 'home' ? ' active' : '' ?>">
        <a class="nav-link" href="<?= site_url(); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if ($userdata['sess-role'] == 2) { ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Data
        </div>
        <li class="nav-item <?= $menu == 'composition' ? ' active' : '' ?>">
            <a class="nav-link" href="<?= site_url('composition'); ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Composition</span>
            </a>
        </li>
        <li class="nav-item <?= $menu == 'itemcost' ? ' active' : '' ?>">
            <a class="nav-link" href="<?= site_url('itemcost'); ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Item Cost</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php } else { ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?= $menu == 'user' ? ' active' : '' ?>">
            <a class="nav-link" href="<?= site_url('administration/user'); ?>">
                <i class="fas fa-fw fa-wrench"></i>
                <span>User Setting</span>
            </a>
        </li>
        <li class="nav-item <?= $menu == 'site' ? ' active' : '' ?>">
            <a class="nav-link" href="<?= site_url('administration/site'); ?>">
                <i class="fas fa-fw fa-building"></i>
                <span>Site Setting</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>
</ul>