<ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
    <li class="nav-item flex-fill" role="presentation">
        <a class="nav-link w-100 <?= $curr_poss == 'new' ? 'active' : '' ?>" href="<?= site_url('item/add'); ?>" id="add-tab" type="button" aria-controls="home" aria-selected="true">Add New Item</a>
    </li>
    <li class="nav-item flex-fill" role="presentation">
        <a class="nav-link w-100 <?= $curr_poss == 'active' ? 'active' : '' ?>" id="active-tab" href="<?= site_url('item/index'); ?>" type="button" aria-controls="profile" aria-selected="false">Active Item</a>
    </li>
    <li class="nav-item flex-fill" role="presentation">
        <a class="nav-link w-100 <?= $curr_poss == 'inactive' ? 'active' : '' ?>" id="stored-tab" href="<?= site_url('item/inactive'); ?>" type="button" aria-controls="contact" aria-selected="false">Inactive Item</a>
    </li>
    <!--
    <li class="nav-item flex-fill" role="presentation">
        <a class="nav-link w-100 <?= $curr_poss == 'decommissioned' ? 'active' : '' ?>" id="decomm-tab" href="<?= site_url('item/decommissioned'); ?>" data-bs-target="#contact-justified" type="button" aria-controls="contact" aria-selected="false">Decommissioned Item</a>
    </li>-->
</ul>