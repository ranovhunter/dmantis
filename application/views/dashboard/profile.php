<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="<?= IMG_PATH; ?>user.png" alt="Profile" class="rounded-circle">
                    <h2><?= $userdata['sess-name']; ?></h2>
                    <h3><?= $userdata['sess-role']; ?></h3>
                    <span><?= $userdata['ip_address']; ?></span>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <?php
                if (!empty($error_messages)) {
                    echo $error_messages;
                }
                if (!empty($form_validation_errors)) {
                    echo $form_validation_errors;
                }
                if (!empty($info_messages)) {
                    echo $info_messages;
                }
                ?>
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <!--<h5 class="card-title">About</h5>
                            <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>-->
                            <h5 class="card-title">Profile Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">User ID</div>
                                <div class="col-lg-9 col-md-8"><?= $userdata['sess-id']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8"><?= $userdata['sess-name']; ?></div>
                            </div>

                        </div>
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form action="<?php echo site_url('dashboard/profile/'); ?>" method="post" role="form">
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <?php echo form_password(array('name' => 'oldpassword', 'id' => 'oldpassword', 'class' => 'form-control', 'value' => "")); ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <?php echo form_password(array('name' => 'newpassword', 'id' => 'newpassword', 'class' => 'form-control', 'value' => "")); ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <?php echo form_password(array('name' => 'repassword', 'id' => 'repassword', 'class' => 'form-control', 'value' => "")); ?>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
    </div>
</section>