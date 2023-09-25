<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Data Kategori Referensi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-danger shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Kelola Kategori Referensi</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="<?= site_url('admin/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Kelola Kategori Referensi</li>
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

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive p-2">
                        <table id="config-table" class="table border display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Link</th>
                                    <th>Jenis</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Guru</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($sharingPractices as $sharingPractice) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $sharingPractice->title ?></td>
                                        <td><?= $sharingPractice->url ?></td>
                                        <td><?= $sharingPractice->type ?></td>
                                        <?php if (!is_null($sharingPractice->category_reference_id)) : ?>
                                            <td><?= $sharingPractice->CategoryReference->name ?? '' ?></td>
                                        <?php elseif (!is_null($sharingPractice->category_module_id)) : ?>
                                            <td><?= $sharingPractice->CategoryModule->name ?? '' ?></td>
                                        <?php endif ?>
                                        <td><?= $sharingPractice->description ?></td>
                                        <td><?= $sharingPractice->UserIdentity->name ?></td>
                                        <td> <?php if ($sharingPractice->status == "WAIT_FOR_REVIEW") : ?>
                                                <span class="badge bg-primary">Menunggu Review</span>
                                            <?php elseif ($sharingPractice->status == "APPROVE") : ?>
                                                <span class="badge bg-success">Diterima</span>
                                            <?php elseif ($sharingPractice->status == "DECLINE") : ?>
                                                <span class="badge bg-danger">Ditolak</span>
                                            <?php endif ?>
                                        </td>
                                        <td width="20%">
                                            <?php if ($sharingPractice->status == "WAIT_FOR_REVIEW") : ?>
                                                <div class="action-btn">
                                                    <a href="<?= site_url('admin/sharing-practices/' . $sharingPractice->id . '/edit') ?>" class="btn btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="ti ti-pencil fs-5"></i>
                                                    </a>
                                                </div>
                                            <?php endif ?>
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