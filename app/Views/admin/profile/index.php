<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Edit Profil
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="<?= site_url('admin/dashboard') ?>" class="btn btn-outline-dark">Kembali</a>
        </div>

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Edit Profil</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('admin/profile/' . auth()->id()) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?= $user->name ?? old('name') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $user->secret ?? old('email') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Instansi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="institution" placeholder="Instansi" value="<?= $user->institution ?? old('institution') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Nomor Whatsapp</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="whatsapp_number" placeholder="Nomor Whatsapp" value="<?= $user->whatsapp_number ?? old('whatsapp_number') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" placeholder="Alamat" value="<?= $user->address ?? old('address') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <img src="<?= base_url('assets/images/users/' . $user->avatar) ?>" alt="Foto Profil" style="width:200px">
                            <input type="file" class="form-control" name="avatar">
                            <p class="text-muted">Ukuran file  maksimal 1MB <br> Kosongkan bila tidak ingin diubah</p>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="col-sm-12 border-top pt-3">Ubah Kata Sandi</h6>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kata Sandi</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" placeholder="Kata Sandi" autocomplete="off">
                            <p class="mt-1">Kosongkan bila tidak ingin diubah</p>
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
    <?= $this->endSection() ?>