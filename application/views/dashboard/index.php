<section class="section dashboard">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-xxl-6 col-md-12">
                    <div class="card info-card primary-card">
                        <div class="card-body">
                            <h5 class="card-title"><span>Requested List</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-send-exclamation"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $count_req; ?> Request<?= $count_req > 1 ? 's' : ''; ?></h6>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= site_url('rent'); ?>" class="text-success mr-2"><i class="fa fa-arrow-up"></i> View Detail</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-12">
                    <div class="card info-card warning-card">
                        <div class="card-body">
                            <h5 class="card-title"><span>Tools Borrowed</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $tools_borrowed; ?> Tool<?= $tools_borrowed > 1 ? 's' : ''; ?></h6>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= site_url('rent/active'); ?>" class="text-success mr-2"><i class="fa fa-arrow-up"></i> View Detail</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-12">
                    <div class="card info-card success-card">
                        <div class="card-body">
                            <h5 class="card-title"><span>Total Tools</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $all_tools; ?> Tool<?= $all_tools > 1 ? 's' : ''; ?></h6>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= site_url('item'); ?>" class="text-success mr-2"><i class="fa fa-arrow-up"></i> View Detail</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-12">
                    <div class="card info-card success-card">
                        <div class="card-body">
                            <h5 class="card-title"><span>Total Users</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?= $total_user ?> User<?= $total_user > 1 ? 's' : ''; ?></h6>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="<?= site_url('users'); ?>" class="text-success mr-2"><i class="fa fa-arrow-up"></i> View Detail</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tools <span>| Condition</span></h5>
                    <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#doughnutChart'), {
                                type: 'doughnut',
                                data: {
                                    labels: [
                                        'Good',
                                        'Good(Incomplete)',
                                        'Broken',
                                        'Lost'
                                    ],
                                    datasets: [{
                                            label: 'Tools Condition',
                                            data: [<?= $good_tools; ?>, <?= $incomplete_tools; ?>, <?= $broken_tools; ?>,<?= $lost_tools; ?>],
                                            backgroundColor: [
                                                'rgb(57, 201, 32)',
                                                'rgb(235, 226, 32)',
                                                'rgb(255, 174, 32)',
                                                'rgb(255, 0, 32)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
