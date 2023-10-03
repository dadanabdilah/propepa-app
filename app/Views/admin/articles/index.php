<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Data Artikel
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-danger shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Kelola Artikel</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="<?= site_url('admin/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Kelola Artikel</li>
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

<section>
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <a href="<?= site_url('admin/articles/new') ?>" class="btn btn-danger">Tambah +</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive p-2">
                        <table id="config-table" class="table border display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Thumbnail</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($articles as $article) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><img src="<?= base_url('assets/images/articles/' . $article->thumbnail) ?>" alt="Photo" width="200"></td>
                                        <td><?= $article->title ?></td>
                                        <td width="20%">
                                            <div class="action-btn">
                                                <a href="<?= site_url('artikel/' . $article->slug) ?>" class="btn btn-success" data-bs-toggle="tooltip" title="Lihat" target="_blank">
                                                    <i class="ti ti-eye fs-5"></i>
                                                </a>
                                                <a href="<?= site_url('admin/articles/' . $article->id . '/edit') ?>" class="btn btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="ti ti-pencil fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-confirm" data-action="<?= site_url('admin/articles/' . $article->id) ?>" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>" data-bs-toggle="tooltip" title="Hapus">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>