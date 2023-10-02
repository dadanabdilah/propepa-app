<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Komunitas Belajar
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Komunitas Belajar</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('admin/study-communities') ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Link Grup Whatsapp</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" name="whatsapp_group_url" placeholder="Link Group Whatsapp" value="<?= old('whatsapp_group_url') ?? setting()->get('App.siteWhatsappGroupURL') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Link Grup Telegram</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" name="telegram_group_url" placeholder="Link Group Telegram" value="<?= old('telegram_group_url') ?? setting()->get('App.siteTelegramGroupURL') ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <BUtton class="btn btn-danger">Submit</BUtton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>