<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= WEB_DESCRIPTION ?>">
    <meta name="keywords" content="<?= WEB_KEYWORD ?>">
    <title><?= $title ? WEB_NAME.' | '.$title : '' ?></title>
    <link rel="icon" href="<?= URL_A ?>image/minhhieu_logo.png" type="image/png">
    <?php if(BOOL_CHATIVE): ?>
    <!-- Chative -->
    <script src="https://messenger.svc.chative.io/static/v1.0/channels/s3ac3bbe7-7c9a-44d6-ab70-cffe6b2a1375/messenger.js?mode=livechat" defer="defer"></script>
    <?php endif ?>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Ajax -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL_P_V ?>css/custom.css">
</head>

<!-- header -->
<header class="py-lg-2 py-3 px-lg-4 container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-lg-2 col-12 d-flex align-items-center justify-content-center justify-content-lg-start">
            <img class="w-25" src="<?= WEB_LOGO ?>" alt="logo">
            <div class="ms-2">
                <span class="g-h1 fs-6">hieu.name.vn</span>
                <div class="text-light small">Trang website cá nhân</div>
            </div>
        </div>
    </div>
</header>

<!-- Navbar -->
<nav
    class="navbar navbar-expand-lg bg-body-tertiary border-bottom px-0 position-sticky sticky-top bg-blue border-5 border-bottom">
    <div class="container">
        <button class="navbar-toggler bg-transparent p-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-light fs-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="/">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link text-light" href="https://sieuthididong.online">Dự án STDD</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link text-light" href="https://pms.hieu.name.vn">Dự án PMS</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link text-light" href="https://bongbeobread.site">Dự án BAKERY</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <div class="input-group">
                    <input class="form-control bg-transparent" type="search" placeholder="Tìm kiếm thông tin..."
                        aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</nav>