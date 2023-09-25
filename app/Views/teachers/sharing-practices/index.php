<?= $this->extend('layouts/teacher') ?>

<?= $this->section('title') ?>
Praktik Berbagi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-danger shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Kelola Praktik Berbagi</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Kelola Praktik Berbagi</li>
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
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <a href="<?= site_url('sharing-practices/new-module') ?>" class="btn btn-danger">Upload Modul</a>
                <a href="<?= site_url('sharing-practices/new-video') ?>" class="btn btn-danger">Upload Video</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <div class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Modul <br /> Klik untuk melihat
                                </button>
                            </div>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php foreach ($sharingPractices as $sharingPractice) : ?>
                                        <?php if ($sharingPractice->category_module_id) : ?>
                                            <div class="row">
                                                <div class="card p-0">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <?= $sharingPractice->title ?> | <?= $sharingPractice->UserIdentity->name ?>
                                                        </div>
                                                        <p><?= $sharingPractice->description ?></p>
                                                        <p>Status Review:</p>
                                                        <p>
                                                            <?php if ($sharingPractice->status == "WAIT_FOR_REVIEW") : ?>
                                                                <span class="badge bg-primary">Menunggu Review</span>
                                                            <?php elseif ($sharingPractice->status == "ACCEPT") : ?>
                                                                <span class="badge bg-success">Diterima</span>
                                                            <?php elseif ($sharingPractice->status == "DECLINE") : ?>
                                                                <span class="badge bg-danger">Ditolak</span>
                                                            <?php endif ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach ?>

                                    <?php if ($sharingPracticesModule == 0) : ?>
                                        <h4 class="text-center">Tidak ada data</h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Video <br /> Klik untuk melihat
                                </button>
                            </div>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php foreach ($sharingPractices as $sharingPractice) : ?>
                                        <?php if ($sharingPractice->category_viideo_id) : ?>
                                            <div class="row">
                                                <div class="card p-0">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <?= $sharingPractice->title ?> | <?= $sharingPractice->UserIdentity->name ?>
                                                        </div>
                                                        <p><?= $sharingPractice->description ?></p>
                                                        <p>
                                                            <?php if ($sharingPractice->status == "WAIT_FOR_REVIEW") : ?>
                                                                <span class="badge bg-primary">Menunggu Review</span>
                                                            <?php elseif ($sharingPractice->status == "APPROVE") : ?>
                                                                <span class="badge bg-success">Diterima</span>
                                                            <?php elseif ($sharingPractice->status == "DECLINE") : ?>
                                                                <span class="badge bg-danger">Ditolak</span>
                                                            <?php endif ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach ?>

                                    <?php if ($sharingPracticesVideo == 0) : ?>
                                        <h4 class="text-center">Tidak ada data</h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>