<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Edit Data Kategori Modul
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="<?= site_url('admin/category-references') ?>" class="btn btn-outline-dark">Kembali</a>
        </div>

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Edit Data Kategori Modul</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('admin/category-modules/' . $categoryModule->id) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Nama Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Nama Kategori" value="<?= old('name') ?? $categoryModule->name ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <img src="<?= base_url('assets/images/category-modules/' . $categoryModule->photo) ?>" alt="Foto Kategori Modul" style="width:200px">
                            <input type="file" class="form-control" name="photo">
                            <p class="text-muted">Kosongkan bila tidak ingin diubah</p>
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