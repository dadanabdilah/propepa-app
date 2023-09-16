<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Edit Data Praktik Berbagi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="<?= site_url('admin/sharing-practices') ?>" class="btn btn-outline-dark">Kembali</a>
        </div>

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Edit Data Praktik Berbagi</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('admin/sharing-practices/' . $sharingPractice->id) ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Judul" value="<?= $sharingPractice->title ?>" disabled required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="url" placeholder="Link" value="<?= $sharingPractice->url ?>" disabled required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="type" placeholder="Jenis" value="<?= $sharingPractice->type ?>" disabled required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <?php if ($sharingPractice->category_reference_id) : ?>
                                <input type="text" class="form-control" name="category" placeholder="Kategori" value="<?= $sharingPractice->CategoryReference->name ?>" disabled required>
                            <?php elseif ($sharingPractice->category_module_id) : ?>
                                <input type="text" class="form-control" name="category" placeholder="Kategori" value="<?= $sharingPractice->CategoryModule->name ?>" disabled required>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Guru</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_id" placeholder="Guru" value="<?= $sharingPractice->UserIdentity->name ?>" disabled required>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="WAIT_FOR_REVIEW" <?= (old('status') ?? $sharingPractice->status) == 'WAIT_FOR_REVIEW' ? 'selected' : '' ?>>Menunggu Review</option>
                                <option value="APPROVE" <?= (old('status') ?? $sharingPractice->status) == 'APPROVE' ? 'selected' : '' ?>>Approve</option>
                                <option value="DECLINE" <?= (old('status') ?? $sharingPractice->status) == 'DECLINE' ? 'selected' : '' ?>>Decline</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="Deskripsi" value="<?= $sharingPractice->description ?>" disabled required>
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