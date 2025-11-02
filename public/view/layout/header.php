<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= WEB_DESCRIPTION ?>">
    <meta name="keywords" content="<?= WEB_KEYWORD ?>">
    <title><?= $title ? WEB_NAME . ' | ' . $title : '' ?></title>
    <link rel="icon" href="<?= URL_A ?>image/minhhieu_logo.png" type="image/png">
    <!-- CDN bootstrap icon -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <!-- CDN CSS Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?= URL_P_V ?>css/main.css?v=1.4">
    <link rel="stylesheet" href="<?= URL_P_V ?>css/header.css?v=1.2">
    <link rel="stylesheet" href="<?= URL_P_V ?>css/footer.css?v=1.1">
</head>

<?= toast_show() ?>

<body class="">
    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg container px-3 px-lg-0">
        <div class="container rounded-3 bg-box py-2 mt-lg-3 mt-2">
            <button class="navbar-toggler bg-transparent p-0 collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i id="navbar-toggler-show" class="bi bi-list text-light fs-1"></i>
                <i id="navbar-toggler-hide" class="bi bi-x text-light fs-1"></i>
            </button>
            <div id="group-btn-header" class="d-flex align-items-center justify-content-center gap-1">
                <?php if(is_login()) : ?>
                <a href="/thong-tin-ca-nhan" class="btn btn-sm btn-outline-light rounded-pill p-1 pe-2 d-flex align-items-center gap-1 <?= $page == 'profile' ? 'active' : '' ?>">
                    <img width="22" class="rounded-circle bg-light bg-opacity-75" src="<?= auth('account_avatar') ? URL_A.auth('account_avatar') : auth('account_google_avatar') ?? DEFAULT_AVATAR_MALE ?>" alt="avatar user">
                    <small><?= auth('account_full_name') ?></small>
                </a>
                <?php else : ?>
                <a href="/dang-nhap" class="btn btn-sm btn-outline-light rounded-pill <?= $page == 'login' ? 'active' : '' ?>">
                    <small>Đăng nhập</small>
                </a>
                <?php endif ?>

                <div class="ms-lg-1">
                    <button type="button" id="mode-light" class="btn btn-sm btn-outline-light rounded-circle">
                        <i class=""></i>
                    </button>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="/" class="position-absolute start-0 ms-2 d-none d-lg-flex align-items-center text-decoration-none" title="Hiếu Website - Nhấn để về trang chủ">
                    <img id="logo-header" src="<?= WEB_LOGO ?>" class="col-1" alt="logo">
                    <div class="ms-1">
                        <span class="text-light-80 fs-6">Hiếu Website</span>
                        <div class="text-light-50 small">
                            <small>Trang website cá nhân</small>
                        </div>
                    </div>
                </a>
                <ul class="navbar-nav align-items-center mx-auto mb-2 mb-lg-0 gap-2 mt-3 mt-lg-0">

                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'home') ? 'on' : '' ?>" href="/">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'project') ? 'on' : '' ?>" href="/du-an">Dự án</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'collect') ? 'on' : '' ?>" href="/suu-tam">Sưu tầm</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>