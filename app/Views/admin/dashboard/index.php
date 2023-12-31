<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="d-flex align-items-center gap-4 mb-4">
        <div>
            <h3 class="fw-semibold">Halo, <span class="text-dark"><?= auth()->user()->name ?></span>
            </h3>
            <span>Selamat datang di dashboard propepa.</span>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="card bg-danger text-light">
                    <div class="card-body">
                        <p class="mb-1 fs-3">Total Pengguna</p>
                        <h4 class="fw-semibold fs-7 text-light"><?= $countUsers ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-primary text-light">
                    <div class="card-body">
                        <p class="mb-1 fs-3">Total Video</p>
                        <h4 class="fw-semibold fs-7 text-light"><?= count($studyReferences) ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-danger text-light">
                    <div class="card-body">
                        <p class="mb-1 fs-3">Total Modul</p>
                        <h4 class="fw-semibold fs-7 text-light"><?= count($studyModules) ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-primary text-light">
                    <div class="card-body">
                        <p class="mb-1 fs-3">Total Kunjungan</p>
                        <h4 class="fw-semibold fs-7 text-light"><?= $countVisitor ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="card-title fw-semibold">Akses Video dan Modul</h5>
                            <p class="card-subtitle mb-4">Statistik pengunjung yang mengakses video dan modul</p>
                        </div>
                        <ul class="nav nav-underline" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="active-tab" data-bs-toggle="tab" href="#active" role="tab" aria-controls="active" aria-expanded="true">
                                    <span>Akses Video</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="link1-tab" data-bs-toggle="tab" href="#link1" role="tab" aria-controls="link1">
                                    <span>Akses Modul</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tabcontent-border" id="myTabContent">
                            <div role="tabpanel" class="tab-pane fade show active" id="active" aria-labelledby="active-tab">
                                <div id="access-video-chart"></div>
                            </div>
                            <div class="tab-pane fade" id="link1" role="tabpanel" aria-labelledby="link1-tab">
                                <div id="access-modul-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title fw-semibold">Perangkat Pengunjung</h5>
                            <p class="card-subtitle mb-4">Statistik perangkat yang digunakan oleh pengunjung</p>
                            <div id="device-chart" class="mb-7 pb-8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center mb-9">
                    <div>
                        <h5 class="card-title fw-semibold">Berbagi Terbaru</h5>
                        <p class="card-subtitle">Daftar video dan modul ajar terbaru</p>
                    </div>
                    <div class="ms-auto mt-4 mt-md-0">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                    <span>Video</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                                    <span>Modul</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 text-nowrap">
                                <tbody>
                                    <?php foreach ($studyReferences as $studyReference) : ?>
                                        <tr>
                                            <td class="ps-0">
                                                <span><?= $studyReference->User->name ?></span>
                                            </td>
                                            <td class="ps-0">
                                                <span><?= $studyReference->title ?></span>
                                            </td>
                                            <td class="ps-0">
                                                <?php if ($studyReference->status == "WAIT_FOR_REVIEW") : ?>
                                                    <span class="badge bg-primary">Menunggu Review</span>
                                                <?php elseif ($studyReference->status == "APPROVE") : ?>
                                                    <span class="badge bg-success">Diterima</span>
                                                <?php elseif ($studyReference->status == "DECLINE") : ?>
                                                    <span class="badge bg-danger">Ditolak</span>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                    <?php if (count($studyReferences) == 0) : ?>
                                        <h4 class="text-center">Tidak ada data</h4>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 text-nowrap">
                                <tbody>
                                    <?php foreach ($studyModules as $studyModule) : ?>
                                        <tr>
                                            <td class="ps-0">
                                                <span><?= $studyModule->User->name ?></span>
                                            </td>
                                            <td class="ps-0">
                                                <span><?= $studyModule->title ?></span>
                                            </td>
                                            <td class="ps-0">
                                                <?php if ($studyModule->status == "WAIT_FOR_REVIEW") : ?>
                                                    <span class="badge bg-primary">Menunggu Review</span>
                                                <?php elseif ($studyModule->status == "APPROVE") : ?>
                                                    <span class="badge bg-success">Diterima</span>
                                                <?php elseif ($studyModule->status == "DECLINE") : ?>
                                                    <span class="badge bg-danger">Ditolak</span>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                    <?php if (count($studyModules) == 0) : ?>
                                        <h4 class="text-center">Tidak ada data</h4>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(() => {
        var options = {
            series: [{
                name: "Akses Video",
                data: <?= json_encode($countAccessVideo) ?>
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
            }
        };

        var chart = new ApexCharts(document.querySelector("#access-video-chart"), options);
        chart.render();

        var options = {
            series: [{
                name: "Akses Modul",
                data: <?= json_encode($countAccessModule) ?>
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
            }
        };

        var chart = new ApexCharts(document.querySelector("#access-modul-chart"), options);
        chart.render();


        var options = {
            series: [
                <?php foreach ($listPlatforms as $listPlatform) : ?> {
                        name: "<?= $listPlatform ?>",
                        data: <?= json_encode($countPlatform) ?>
                    },
                <?php endforeach ?>
            ],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: <?= json_encode($listPlatforms) ?>,
            },
            yaxis: {
                title: {
                    text: 'Perangkat'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " Perangkat"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#device-chart"), options);
        chart.render();
    })
</script>
<?= $this->endSection() ?>