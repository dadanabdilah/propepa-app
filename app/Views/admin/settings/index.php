<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Pengaturan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Pengaturan</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('admin/settings') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Nama Aplikasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="site_name" placeholder="Nama Aplikasi" value="<?= old('site_name') ?? setting()->get('App.siteName') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Logo Aplikasi</label>
                        <div class="col-sm-9">
                            <img src="<?= site_url('assets/images/main/' . setting()->get('App.siteLogo')) ?>" class="bg-secondary" alt="">
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Teks Intro</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" name="intro_text" placeholder="Teks Intro" rows="5" required><?= old('intro_text') ?? setting()->get('App.siteIntroText') ?></textarea>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Teks Tentang</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="about_text" placeholder="Teks Tentang" rows="5" required><?= old('about_text') ?? setting()->get('App.siteAbout') ?></textarea>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Video URL Youtube</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" name="video_youtube" placeholder="Video URL Youtube" value="<?= old('video_youtube') ?? setting()->get('App.siteVideoURL') ?>" required>
                        </div>
                    </div>

                    <h4 class="fs-6">Footer</h4>

                    <hr class="my-3">

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" placeholder="Alamat" value="<?= old('address') ?? setting()->get('App.siteAddress') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Alamat Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email_address" placeholder="Alamat Email" value="<?= old('email_address') ?? setting()->get('App.siteMail') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone_number" placeholder="Nomor Handphone" value="<?= old('phone_number') ?? setting()->get('App.sitePhone') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Situs Web</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="site_url" placeholder="Situs Web" value="<?= old('site_url') ?? setting()->get('App.siteURL') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Maps</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="site_maps" placeholder="URL Google Maps" value="<?= old('site_maps') ?? setting()->get('App.siteMaps') ?>" required>
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