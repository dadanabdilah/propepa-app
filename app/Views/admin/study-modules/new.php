<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Tambah Data Modul Belajar
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="<?= site_url('admin/study-modules') ?>" class="btn btn-outline-dark">Kembali</a>
        </div>

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Tambah Data Modul Belajar</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('admin/study-modules') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Judul Modul</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Judul Modul" value="<?= old('title') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Link Modul</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" name="url_module" placeholder="Link Modul" value="<?= old('url_module') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" placeholder="Deksripsi" value="<?= old('description') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Kategori Modul Belajar</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_module_id" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <?php foreach ($categoryModules as $categoryModule) { ?>
                                    <option value="<?= $categoryModule->id ?>" <?= old('category_module_id') == $categoryModule->id ? 'selected' : ''; ?>><?= $categoryModule->name ?></option>
                                <?php } ?>
                            </select>
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