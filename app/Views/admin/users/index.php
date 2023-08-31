<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Data Pengguna
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Kelola Pengguna</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Kelola Pengguna</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="../assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
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
                <a href="<?= site_url('admin/users/new') ?>" class="btn btn-primary">Tambah +</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive p-2">
                        <table id="config-table" class="table border display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nama Pengguna</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $user->name ?></td>
                                        <td><?= $user->username ?></td>
                                        <td><?= $user->group ?></td>
                                        <td>
                                            <div class="action-btn">
                                                <a href="<?= site_url('admin/users/' . $user->id . '/edit') ?>" class="text-info edit">
                                                    <i class="ti ti-pencil fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-danger delete ms-2 delete-confirm" data-action="<?= site_url('admin/users/' . $user->id) ?>" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>">
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