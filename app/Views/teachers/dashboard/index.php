<?= $this->extend('layouts/teacher') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="d-flex align-items-center gap-4 mb-4">
        <div>
            <h3 class="fw-semibold">Halo, <span class="text-dark"><?= auth()->user()->identities[0]->name ?></span>
            </h3>
            <span>Selamat datang di dashboard propepa.</span>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <a href="<?= site_url('study-communities') ?>">
                    <img src="<?= base_url('assets/images/dashboard/1.png') ?>" class="img-fluid" alt="Image">
                </a>
            </div>
            <div class="col">
                <a href="<?= site_url('opinions') ?>">
                    <img src="<?= base_url('assets/images/dashboard/2.png') ?>" class="img-fluid" alt="Image">
                </a>
            </div>
            <div class="col">
                <a href="<?= site_url('study-references') ?>">
                    <img src="<?= base_url('assets/images/dashboard/3.png') ?>" class="img-fluid" alt="Image">
                </a>
            </div>
            <div class="col">
                <a href="<?= site_url('study-modules') ?>">
                    <img src="<?= base_url('assets/images/dashboard/4.png') ?>" class="img-fluid" alt="Image">
                </a>
            </div>
            <div class="col">
                <a href="<?= site_url('sharing-practices') ?>">
                    <img src="<?= base_url('assets/images/dashboard/5.png') ?>" class="img-fluid" alt="Image">
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center gap-4 mb-4 mt-5">
        <div>
            <h3 class="fw-semibold">Pilih Tema Pembelajaran P5</span>
            </h3>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <?php foreach ($categoryReferences as $categoryReference) : ?>
                <div class="col-md-4">
                    <a href="<?= site_url('study-references/' . $categoryReference->slug) ?>">
                        <div class="card">
                            <div class="shadow card-body rounded">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="fw-bold"><?= $categoryReference->name ?></h5>
                                    </div>
                                    <div class="col">
                                        <img src="<?= base_url('assets/images/category-references/' . $categoryReference->photo) ?>" alt="Image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>

            <?php foreach ($categoryModules as $categoryModule) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <a href="<?= site_url('study-modules/' . $categoryModule->slug) ?>">
                            <div class="shadow card-body rounded">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="fw-bold"><?= $categoryModule->name ?></h5>
                                    </div>
                                    <div class="col">
                                        <img src="<?= base_url('assets/images/category-modules/' . $categoryModule->photo) ?>" alt="Image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                    </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>