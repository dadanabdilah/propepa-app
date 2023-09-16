<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Edit Data Referensi Belajar
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="<?= site_url('admin/study-references') ?>" class="btn btn-outline-dark">Kembali</a>
        </div>

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Edit Data Referensi Belajar</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('admin/study-references/' . $studyReference->id) ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Judul Video</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Judul Video" value="<?= old('title') ?? $studyReference->title ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Link Video</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" name="url_video" placeholder="Link Video" value="<?= old('url_video') ?? $studyReference->url_video ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" placeholder="Deskripsi" value="<?= old('description') ?? $studyReference->description ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Kategori Referensi Belajar</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_reference_id" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <?php foreach ($categoryReferences as $categoryReference) { ?>
                                    <option value="<?= $categoryReference->id ?>" <?= $studyReference->category_reference_id == $categoryReference->id ? 'selected' : ''; ?>><?= $categoryReference->name ?></option>
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