<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Berbagi Opini
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Berbagi Opini</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Berbagi Opini</li>
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


<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title fw-semibold">Berbagi Opini</h5>
            <?php foreach ($opinions as $opinion) : ?>
                <div class="mt-9 py-6 d-flex align-items-center">
                    <div class="flex-shrink-0 bg-light-primary rounded-circle round d-flex align-items-center justify-content-center">
                        <img src="https://ui-avatars.com/api/?name=<?= $opinion->User->name ?>" alt="Foto" class="fs-6 rounded-circle">
                    </div>
                    <div class="ms-3">
                        <span class="mb-0 fs-2"><?= $opinion->created_at ?></span>
                        <h6 class="mb-0 mt-1 fw-semibold"><?= $opinion->User->name ?></h6>
                        <span class="fs-3"><?= $opinion->opinion ?></span>
                    </div>
                    <div class="ms-auto justify-content-end">
                        <a href="javascript:void(0)" class="btn btn-danger delete-alert" data-action="<?= site_url('admin/opinions/' . $opinion->id) ?>" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>" data-bs-toggle="tooltip" title="Hapus">
                            <i class="ti ti-trash fs-5"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>