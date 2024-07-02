<!-- ======= Sidebar ======= -->

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item active">
            <a class="nav-link <?= $active_menu == 'dashboard' ? '' : 'collapsed'; ?>" href="<?= site_url('dashboard'); ?>">
                <i class="bi bi-tv text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'area' ? '' : 'collapsed'; ?>" href="<?= site_url('area'); ?>">
                <i class="bi bi-archive text-primary"></i>
                <span class="nav-link-text">Area</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'rent' ? '' : 'collapsed'; ?>" href="<?= site_url('rent'); ?>">
                <i class="bi bi-card-list text-primary"></i>
                <span class="nav-link-text">Rent</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'users' ? '' : 'collapsed'; ?>" href="<?= site_url('users'); ?>">
                <i class="bi bi-people text-primary"></i>
                <span class="nav-link-text">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'item' ? '' : 'collapsed'; ?>" href="<?= site_url('item'); ?>">
                <i class="bi bi-tools text-primary"></i>
                <span class="nav-link-text">Items</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->