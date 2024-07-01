<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="<?= IMG_PATH; ?>logo-kpp.png" alt="">
                            </a>
                        </div><!-- End Logo -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4"><?= strtoupper(APP_NAME); ?></h5>
                                    <p class="text-center small">Enter your ID</p>
                                </div>
                                <?php if (!empty($form_validation_errors)) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $form_validation_errors; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?> 

                                <form class="row g-3 needs-validation" novalidate action="<?php echo site_url('home'); ?>" method="post" role="form">

                                    <div class="col-12">
                                        <label for="yourID" class="form-label">User ID</label>
                                        <input type="text" class="form-control" id="yourUserID" required name="txt_userid" autocomplete="off" value="<?= set_value('txt_userid'); ?>" autofocus>
                                        <div class="invalid-feedback">Start</div>
                                    </div>


                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" value="submit" type="submit" name="submit">Login</button>
                                    </div>
                                </form>
                                <br/>
                            </div>

                        </div>

                        <div class="credits">
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        emptyCart();
    });
    function emptyCart() {
        if (sessionStorage.getItem('rent-cart')) {
            // Clear JavaScript sessionStorage by index
            sessionStorage.removeItem('rent-cart');
        }
    }
</script>