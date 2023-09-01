<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Data Kategori Modul
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Kelola Kategori Modul</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Kelola Kategori Modul</li>
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
                <a href="<?= site_url('admin/category-modules/new') ?>" class="btn btn-primary">Tambah +</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive p-2">
                        <table id="config-table" class="table border display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($categoryModules as $categoryModule) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $categoryModule->name ?></td>
                                        <td><img src="<?= base_url('assets/images/category-modules/' . $categoryModule->photo) ?>" alt="Photo" width="200"></td>
                                        <td width="20%">
                                            <div class="action-btn">
                                                <a href="<?= site_url('admin/category-modules/' . $categoryModule->id . '/edit') ?>" class="btn btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="ti ti-pencil fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-confirm" data-action="<?= site_url('admin/category-modules/' . $categoryModule->id) ?>" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>" data-bs-toggle="tooltip" title="Hapus">
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