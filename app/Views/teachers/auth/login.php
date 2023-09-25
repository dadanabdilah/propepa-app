<?= $this->extend('layouts/auth') ?>

<?= $this->section('title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Preloader -->
<div class="preloader">
    <img src="<?= base_url('assets/images/logos/logo.png') ?>" alt="loader" class="lds-ripple img-fluid" />
</div>
<!-- Preloader -->
<div class="preloader">
    <img src="<?= base_url('assets/images/logos/logo.png') ?>" alt="loader" class="lds-ripple img-fluid" />
</div>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-12 col-lg-12 col-xxl-6">
                    <div class="d-flex justify-content-center mb-5 mt-5">
                        <img src="<?= base_url('assets/images/logos/logo.png') ?>" alt="">
                        <a href="#" class="text-nowrap logo-img mt-2">
                            <h2><b>| MASUK</b></h2>
                        </a>
                    </div>
                    <div class="card mb-0">
                        <div class="card-body">
                            <form action="<?= site_url('/login') ?>" method="POST">
                                <?= csrf_field() ?>

                                <?php if (session('error') !== null) : ?>
                                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                                <?php endif ?>

                                <?php if (session('message') !== null) : ?>
                                    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                                <?php endif ?>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email..." value="<?= old('email') ?>" autofocus="" autocomplete="off" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password..." value="" autocomplete="off" required>
                                </div>
                                <button type="submit" class="btn btn-danger w-100 py-8 mb-2 rounded-2">Masuk</button>
                                <a href="<?= site_url('/register') ?>" class="btn btn-outline-danger w-100 mb-4 rounded-2">Daftar</a>
                                <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="<?= site_url('/oauth/google') ?>" role="button">
                                    <img src="<?= base_url('assets/images/svgs/google-icon.svg') ?>" alt="" class="img-fluid me-2" width="18" height="18">
                                    <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>Google
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>