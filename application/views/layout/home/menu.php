<!-- ======= Sidebar ======= -->

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item active">
            <a class="nav-link <?= $active_menu == 'dashboard' ? '' : 'collapsed'; ?>" href="<?= site_url('home/request/' . $rec_user->id); ?>">
                <i class="bi bi-tv text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $active_menu == 'history' ? '' : 'collapsed'; ?>" href="<?= site_url('home/history/' . $rec_user->id); ?>">
                <i class="bi bi-archive text-primary"></i>
                <span class="nav-link-text">History</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->