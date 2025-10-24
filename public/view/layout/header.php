<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= WEB_DESCRIPTION ?>">
    <meta name="keywords" content="<?= WEB_KEYWORD ?>">
    <title><?= $title ? WEB_NAME.' | '.$title : '' ?></title>
    <link rel="icon" href="<?= URL_A ?>image/minhhieu_logo.png" type="image/png">
    <!-- CDN bootstrap icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <!-- CDN CSS Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?= URL_P_V ?>css/main.css">
    <link rel="stylesheet" href="<?= URL_P_V ?>css/header.css">
    <link rel="stylesheet" href="<?= URL_P_V ?>css/footer.css">
</head>

<body class="">

<!-- header -->
<header class="py-lg-2 py-3 px-lg-4">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="col-lg-2 col-12 d-flex align-items-center justify-content-center justify-content-lg-start gap-2">
            <img id="logo-header" src="<?= WEB_LOGO ?>" alt="logo">
            <div class="ms-2">
                <span class="g-h1 fs-6">hieu.name.vn</span>
                <div class="text-light small">Trang website cá nhân</div>
            </div>
        </div>
        <div class="col-lg-10 col-12 d-flex justify-content-end">
            <button type="button" id="mode-light" class="btn btn-sm btn-outline-light rounded-circle">
                <i class=""></i>
            </button>
        </div>
    </div>
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg px-0 position-sticky sticky-top">
    <div class="container">
        <button class="navbar-toggler bg-transparent p-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bi bi-list text-light fs-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'home') ? 'on' : '' ?> ps-0" href="/">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'project') ? 'on' : '' ?>" href="/du-an">Dự án</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'collect') ? 'on' : '' ?>" href="/suu-tam">Sưu tầm</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a href="/dang-nhap" class="btn btn-outline-light rounded-pill">
                    <small>Đăng nhập</small>
                </a>
            </form>
        </div>
    </div>
</nav>