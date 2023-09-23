<?= $this->extend('layouts/teacher') ?>

<?= $this->section('title') ?>
Upload Video Praktik Berbagi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="<?= site_url('sharing-practices') ?>" class="btn btn-outline-dark">Kembali</a>
        </div>

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Upload Video Praktik Berbagi</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('sharing-practices/new-video') ?>" method="POST">
                    <?= csrf_field() ?>

                    <input type="hidden" name="user_id" value="<?= auth()->id() ?>">
                    <input type="hidden" name="type" value="video">

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Judul" value="<?= old('title') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="url" placeholder="Link" value="<?= old('url') ?>" required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select name="category_reference_id" id="category_reference_id" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <?php foreach ($categoryReferences as $categoryReference) : ?>
                                    <option value="<?= $categoryReference->id ?>"><?= $categoryReference->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" placeholder="Deskripsi" value="<?= old('description') ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>