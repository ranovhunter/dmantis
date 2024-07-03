<ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
    <li class="nav-item flex-fill" role="presentation">
        <a class="nav-link w-100 <?= $curr_poss == 'request' ? 'active' : '' ?>" href="<?= site_url('rent/index'); ?>" id="add-tab" type="button" aria-controls="home" aria-selected="true">New Request</a>
    </li>
    <li class="nav-item flex-fill" role="presentation">
        <a class="nav-link w-100 <?= $curr_poss == 'active' ? 'active' : '' ?>" id="active-tab" href="<?= site_url('rent/active'); ?>" type="button" aria-controls="profile" aria-selected="false">Active Rent</a>
    </li>
</ul>