<!doctype html>
<html lang="id">

<head>
    <title><?= setting()->get('App.siteName') ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="<?= base_url() ?>assets/images/main/<?= setting()->get('App.siteLogo') ?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto p-sm-3">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('/') ?>">Beranda</a>
                        <a class="nav-link" href="<?= site_url('/') ?>#about">Tentang</a>
                        <a class="nav-link" href="<?= site_url('/') ?>#benefit">Keuntungan</a>
                        <a class="nav-link" href="<?= site_url('artikel') ?>">Artikel</a>
                        <a class="nav-link" href="<?= site_url('register') ?>">Daftar</a>
                        <a class="nav-link" href="<?= site_url('login') ?>">Masuk</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="articles">
            <div class="container pb-5">
                <div class="row col-12 col-md-12">
                    <div class="col-12 col-md-12 mt-3">
                        <div class="card border-light">
                            <img src="<?= base_url('assets/images/articles/' . $article->thumbnail) ?>" class="card-img-top img-fluid" alt="<?= $article->title ?>">
                            <div class="card-body">
                                <h1 class="card-title"><a href="<?= site_url('artikel/' . $article->slug) ?>"><?= $article->title ?></a></h1>
                                <p class="card-text"><?= htmlspecialchars_decode($article->content, ENT_HTML5) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section class="foot">
        <div class="container">
            <div class="row col-12 col-md-12">
                <div class="col-12 col-md-12 col-lg-6">
                    <img src="<?= base_url() ?>assets/images/main/logo-light.png" alt="">
                    <p class="address mt-3">Jl. Terusan Jendral Sudirman, Cimahi 40526, Provinsi Jawa Barat, 40521</p>

                    <div class="row col-12 col-md-12 col-lg-12">
                        <div class="col-12 col-md-12 col-lg-6 mt-sm-3">
                            <h1 class="title">Support</h1>
                            <ul>
                                <li><a href="https://kemdikbud.go.id">Kemendikbudristek</a></li>
                                <li><a href="https://lldikti4.kemdikbud.go.id">LLDIKTI IV</a></li>
                                <li><a href="https://ikipsiliwangi.ac.id">IKIP Siliwangi</a></li>
                                <li><a href="https://edutrimedia.com">Edu Trimedia</a></li>
                            </ul>
                        </div>

                        <div class="col-12 col-md-12 col-lg-6 mt-sm-3">
                            <h1 class="title">Kontak</h1>
                            <ul>
                                <li><a href="mailto:<?= setting()->get('App.siteMail') ?>"><?= setting()->get('App.siteMail') ?></a></li>
                                <li><a href="wa.me/<?= setting()->get('App.sitePhone') ?>"><?= setting()->get('App.sitePhone') ?></a></li>
                                <li><a href="<?= setting()->get('App.siteURL') ?>"><?= setting()->get('App.siteURL') ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6 mt-sm-3">
                    <h1 class="title">Lokasi</h1>

                    <div class="ratio ratio-16x9 mt-3 mb-5">
                        <iframe src="<?= setting()->get('App.siteMaps') ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-flex align-items-start">
            <img src="<?= base_url() ?>assets/images/main/batik-left.png" alt="">
        </div>
    </section>

    <footer class="d-flex align-items-center justify-content-center">
        <h1>Copyright &copy; 2023. Edu Trimedia. All rights reserved.</h1>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>