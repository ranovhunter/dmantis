<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card primary-card">
                        <div class="card-body">
                            <h5 class="card-title"><span>Requested List</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-send-exclamation"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>2 Request</h6>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= site_url('rent/new'); ?>" class="text-success mr-2"><i class="fa fa-arrow-up"></i> View Detail</a>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card success-card">
                        <div class="card-body">
                            <h5 class="card-title"><span>Tools Borrowed</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>100+</h6>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= site_url('rent/tools-'); ?>" class="text-success mr-2"><i class="fa fa-arrow-up"></i> View Detail</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card danger-card">
                        <div class="card-body">
                            <h5 class="card-title"><span>Unreturned Tools</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>999+</h6>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= site_url('rent/tools'); ?>" class="text-success mr-2"><i class="fa fa-arrow-up"></i> View Detail</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="margin-left: 0.8rem">
            <div class="card-body">
                <h5 class="card-title">Renters List</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Request Date</th>
                                <th scope="col">Tools Count</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <!-- End Table with hoverable rows -->
            </div>
        </div>
</section>
