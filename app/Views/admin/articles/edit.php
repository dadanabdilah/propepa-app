<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Tambah Data Artikel
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/libs/summernote/summernote-lite.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="<?= site_url('admin/articles') ?>" class="btn btn-outline-dark">Kembali</a>
        </div>

        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Tambah Data Artikel</h5>
            </div>
            <div class="card-body p-4">
                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php endif ?>

                <form action="<?= site_url('admin/articles/' . $article->id) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Thumbnail</label>
                        <div class="col-sm-9">
                            <img src="<?= base_url('assets/images/articles/' . $article->thumbnail) ?>" alt="Thumbnail" style="width:200px">
                            <input type="file" class="form-control" name="thumbnail">
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" placeholder="Judul" value="<?= old('title') ?? $article->title ?>" required>
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label class="form-label fw-semibold col-sm-3 col-form-label">Konten</label>
                        <div class="col-sm-9">
                            <textarea name="content" class="summernote form-control" style="height: 350px" required><?= old('content') ?? $article->content ?></textarea>
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

<?= $this->section('js') ?>
<script src="<?= base_url('assets/libs/summernote/summernote-lite.min.js') ?>"></script>
<script>
    /************************************/
    //default editor
    /************************************/
    $(".summernote").summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen']]
        ],
        tabsize: 2,
        height: 300,
    });
</script>
<?= $this->endSection() ?>