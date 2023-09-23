<?= $this->extend('layouts/teacher') ?>

<?= $this->section('title') ?>
Referensi Belajar
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-danger shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8"> Referensi Belajar</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Referensi Belajar</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?= base_url('assets/images/breadcrumb/ChatBc.png') ?>" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="col-lg-12">
        <div class="row">
            <?php foreach ($categoryReferences as $categoryReference) : ?>
                <div class="col-md-4">
                    <a href="<?= site_url('study-references/' . $categoryReference->id) ?>">
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

            <?php if (count($categoryReferences) == 0) : ?>
                <h4 class="text-center">Tidak ada data</h4>
            <?php endif ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>