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
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="<?= base_url('assets/css/styles.min.css') ?>" />
</head>

<body>

    <?= $this->renderSection('content') ?>

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
</body>

</html>