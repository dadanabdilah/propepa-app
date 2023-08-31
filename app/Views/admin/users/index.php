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
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Instansi</th>
                                    <th>No Whatsapp</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $user->name ?></td>
                                        <td><?= $user->secret ?></td>
                                        <td><?= position($user->group) ?></td>
                                        <td><?= $user->institution ?></td>
                                        <td><?= $user->whatsapp_number ?></td>
                                        <td><?= $user->address ?></td>
                                        <td><?= $user->active == '0' ? 'Nonaktif' : 'Aktif' ?></td>
                                        <td width="20%">
                                            <div class="action-btn">
                                                <?php if ($user->active == '0') : ?>
                                                    <form action="<?= site_url('admin/users/' . $user->id . '/status') ?>" method="POST">
                                                        <?= csrf_field() ?>
                                                        <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" title="Aktifkan Akun">
                                                            <i class="ti ti-check"></i>
                                                        </button>
                                                    </form>
                                                <?php else : ?>
                                                    <form action="<?= site_url('admin/users/' . $user->id . '/status') ?>" method="POST">
                                                        <?= csrf_field() ?>
                                                        <button type="submit" class="btn btn-info" data-bs-toggle="tooltip" title="Nonaktifkan Akun">
                                                            <i class="ti ti-forbid-2"></i>
                                                        </button>
                                                    </form>
                                                <?php endif ?>
                                                <a href="<?= site_url('admin/users/' . $user->id . '/edit') ?>" class="btn btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                    <i class="ti ti-pencil fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-confirm" data-action="<?= site_url('admin/users/' . $user->id) ?>" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>" data-bs-toggle="tooltip" title="Hapus">
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