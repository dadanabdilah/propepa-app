<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title><?= $this->renderSection('title') ?> | <?= setting()->get('App.siteName') ?></title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="<?= setting()->get('App.siteAbout') ?>" />
    <meta name="author" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--  Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?= base_url('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.css') ?>">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="<?= base_url('assets/css/styles.min.css') ?>" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="<?= base_url('assets/images/logos/favicon.ico') ?>" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="<?= base_url('assets/images/logos/favicon.ico') ?>" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?= site_url('dashboard') ?>" class="text-nowrap logo-img">
                        <img src="<?= base_url('assets/images/logos/logo.png') ?>" class="dark-logo" width="180" alt="" />
                    </a>
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8 text-muted"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <li class="sidebar-item mt-4">
                            <a class="sidebar-link" href="<?= site_url('dashboard') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home-2"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('study-references') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-grid"></i>
                                </span>
                                <span class="hide-menu">Referensi Belajar</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('study-modules') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Modul Belajar</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('opinions') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-message"></i>
                                </span>
                                <span class="hide-menu">Berbagi Opini</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('study-communities') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-mail"></i>
                                </span>
                                <span class="hide-menu">Komunitas Belajar</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('sharing-practices') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-chart-pie-2"></i>
                                </span>
                                <span class="hide-menu">Praktik Berbagi</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('profile') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-chart-pie-2"></i>
                                </span>
                                <span class="hide-menu">Lihat Profil</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= site_url('logout') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-door-exit"></i>
                                </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
                    <div class="hstack gap-3">
                        <div class="john-img">
                            <img src="<?= base_url('assets/images/profile/user-1.jpg') ?>" class="rounded-circle" width="40" height="40" alt="">
                        </div>
                        <div class="john-title">
                            <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                            <span class="fs-2 text-dark">Designer</span>
                        </div>
                        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                            <i class="ti ti-power fs-6"></i>
                        </button>
                    </div>
                </div>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="d-block d-lg-none">
                        <img src="<?= base_url('assets/images/logos/logo.png') ?>" class="dark-logo" width="180" alt="" />
                        <img src="<?= base_url('assets/images/logos/logo.png') ?>" class="light-logo" width="180" alt="" />
                    </div>
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="p-2">
                            <i class="ti ti-dots fs-7"></i>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <div class="d-flex align-items-center justify-content-between">
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-bell-ringing"></i>
                                    </a>
                                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                        <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                            <h5 class="mb-0 fs-5 fw-semibold">Notifikasi</h5>
                                        </div>
                                        <div class="message-body" id="notification" data-simplebar>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <div class="user-profile-img">
                                                <img src="https://ui-avatars.com/api/?name=<?= auth()->user()->identities[0]->name ?? auth()->user()->first_name ?>" class="rounded-circle" width="35" height="35" alt="" />
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                        <div class="profile-dropdown position-relative" data-simplebar>
                                            <div class="py-3 px-7 pb-0">
                                                <h5 class="mb-0 fs-5 fw-semibold">Profil</h5>
                                            </div>
                                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                <img src="https://ui-avatars.com/api/?name=<?= auth()->user()->identities[0]->name ?? auth()->user()->first_name ?>" class="rounded-circle" width="80" height="80" alt="" />
                                                <div class="ms-3">
                                                    <h5 class="mb-1 fs-3"><?= auth()->user()->identities[0]->name ?? auth()->user()->first_name ?></h5>
                                                    <span class="mb-1 d-block text-dark"><?= ucfirst(auth()->user()->getGroups()[0]) ?></span>
                                                    <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                        <i class="ti ti-mail fs-4"></i> <?= auth()->user()->identities[0]->secret ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="message-body">
                                                <a href="<?= site_url('profile') ?>" class="py-8 px-7 mt-8 d-flex align-items-center">
                                                    <div class="w-100 d-inline-block v-middle">
                                                        <h6 class="mb-1 bg-hover-primary fw-semibold"> Edit Profil </h6>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

        <!--  Import Js Files -->
        <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
        <!--  core files -->
        <script src="<?= base_url('assets/js/app.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/app.init.js') ?>"></script>
        <script src="<?= base_url('assets/js/app-style-switcher.js') ?>"></script>
        <script src="<?= base_url('assets/js/sidebarmenu.js') ?>"></script>
        <script src="<?= base_url('assets/js/custom.js') ?>"></script>

        <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>

        <script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/datatable/datatable-basic.init.js') ?>"></script>

        <script src="<?= base_url('assets/js/toastr-init.js') ?>"></script>
        <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>

        <?php if (session('message') !== null) : ?>
            <script>
                toastr.success(
                    "<?= session('message') ?>",
                    "Berhasil!", {
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        timeOut: 2000
                    }
                );
            </script>
        <?php endif ?>

        <?php if (session('error') !== null) : ?>
            <script>
                toastr.error(
                    "<?= session('message') ?>",
                    "Gagal!", {
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        timeOut: 2000
                    }
                );
            </script>
        <?php endif ?>

        <script>
            $(".delete-alert").on("click", function(event) {
                event.preventDefault();
                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Jika data dihapus maka data yang bersangkutan akan ikut terhapus juga.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        let action = $(this).attr("data-action");
                        let name = $(this).attr("data-csrf-name");
                        let token = $(this).attr("data-csrf-token");
                        $("body").html(
                            "<form class='form-inline remove-form' method='post' action='" +
                            action +
                            "'></form>"
                        );
                        $("body")
                            .find(".remove-form")
                            .append('<input name="_method" type="hidden" value="delete">');
                        $("body")
                            .find(".remove-form")
                            .append(
                                '<input name="' + name + '" type="hidden" value="' + token + '">'
                            );
                        $("body").find(".remove-form").submit();
                    }
                });
            });
        </script>

        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
            function bindWithChunking(channel, event, callback) {
                channel.bind(event, callback);

                var events = {};
                channel.bind("chunked-" + event, data => {
                    if (!events.hasOwnProperty(data.id)) {
                        events[data.id] = {
                            chunks: [],
                            receivedFinal: false
                        };
                    }
                    var ev = events[data.id];
                    ev.chunks[data.index] = data.chunk;
                    if (data.final) ev.receivedFinal = true;
                    if (ev.receivedFinal && ev.chunks.length === Object.keys(ev.chunks).length) {
                        callback(JSON.parse(ev.chunks.join("")));
                        delete events[data.id];
                    }
                });
            }

            Pusher.logToConsole = true;

            var pusher = new Pusher("<?= env('PUSHER_APP_KEY') ?>", {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                let notifDOM = $('#notification').html();

                let userId = <?= auth()->id() ?>;

                notifDOM += `
           ${data.opinions.user_id != userId ? `<a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                <div class="w-100 d-inline-block v-middle">
                    <h6 class="mb-1 fw-semibold">${data.opinions.user.name}</h6>
                    <span class="d-block">${data.opinions.opinion}</span>
                    </div>
                </a>` : ''}
           `

                $('#notification').html(notifDOM);
            })
        </script>

        <?= $this->renderSection('js') ?>
</body>

</html>