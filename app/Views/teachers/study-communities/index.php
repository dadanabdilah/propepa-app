<?= $this->extend('layouts/teacher') ?>

<?= $this->section('title') ?>
Komunitas Belajar
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-danger shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Komunitas Belajar</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Komunitas Belajar</li>
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

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <div class="row">
                    <div class="col-1">
                        <h1><i class="ti ti-brand-whatsapp"></i></h1>
                    </div>
                    <div class="col">
                        <h4>Whatsapp</h4>
                        <a href="<?= setting()->get('App.siteWhatsappGroupURL') ?>" target="_blank">KLIK UNTUK JOIN</a>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-1">
                        <h1><i class="ti ti-brand-telegram"></i></h1>
                    </div>
                    <div class="col">
                        <h4>Telegram</h4>
                        <a href="<?= setting()->get('App.siteTelegramGroupURL') ?>" target="_blank">KLIK UNTUK JOIN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>