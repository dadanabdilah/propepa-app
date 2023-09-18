<?= $this->extend('layouts/auth') ?>

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
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-12 col-lg-12 col-xxl-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="#" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                <h2><b>PROPEPA</b></h2>
                            </a>
                            <form action="<?= site_url('/') ?>" method="POST">
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
                                <button type="submit" class="btn btn-primary w-100 py-8 mb-2 rounded-2">Masuk</button>
                                <a href="<?= site_url('/register') ?>" class="btn btn-outline-primary w-100 mb-4 rounded-2">Daftar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>