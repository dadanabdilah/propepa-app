<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <!-- Project -->
    <div class="col-lg-12">
        <div class="row">
            <!-- Students -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body pb-0 mb-xxl-4 pb-1">
                        <p class="mb-1 fs-3">Students</p>
                        <h4 class="fw-semibold fs-7">36,358</h4>
                        <div class="d-flex align-items-center mb-3">
                            <span class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                <i class="ti ti-arrow-down-right text-danger"></i>
                            </span>
                            <p class="text-dark fs-3 mb-0">+9%</p>
                        </div>
                    </div>
                    <div id="customers"></div>
                </div>
            </div>
            <!-- Class -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-1 fs-3">Class</p>
                        <h4 class="fw-semibold fs-7">78,298</h4>
                        <div class="d-flex align-items-center mb-3">
                            <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                <i class="ti ti-arrow-up-left text-success"></i>
                            </span>
                            <p class="text-dark fs-3 mb-0">+9%</p>
                        </div>
                        <div id="projects"></div>
                    </div>
                </div>
            </div>
            <!-- Reviewer -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-1 fs-3">Reviewer</p>
                        <h4 class="fw-semibold fs-7">78,298</h4>
                        <div class="d-flex align-items-center mb-3">
                            <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                <i class="ti ti-arrow-up-left text-success"></i>
                            </span>
                            <p class="text-dark fs-3 mb-0">+9%</p>
                        </div>
                        <div id="projects"></div>
                    </div>
                </div>
            </div>
            <!-- Course -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-1 fs-3">Course</p>
                        <h4 class="fw-semibold fs-7">78,298</h4>
                        <div class="d-flex align-items-center mb-3">
                            <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                <i class="ti ti-arrow-up-left text-success"></i>
                            </span>
                            <p class="text-dark fs-3 mb-0">+9%</p>
                        </div>
                        <div id="projects"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>