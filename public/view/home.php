<link rel="stylesheet" href="<?= URL_P_V ?>css/home.css">

<div class="container px-lg-0 mt-5">
    <div class="box-introduce d-flex align-items-center flex-column justify-content-end justify-content-lg-center">
        <div class="col-12">
            <h2 class="box-introduce-title animate__animated animate__fadeIn">
                <?= WEB_NAME ?>
            </h2>
            <div id="introduce-desc" class="box-introduce-desc mt-3 col-lg-6">
                <?= WEB_DESCRIPTION ?>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.86/build/spline-viewer.js"></script>
        <spline-viewer class="robot-3d" url="https://prod.spline.design/cXDqpdK8FiMkdQFp/scene.splinecode"></spline-viewer>
    </div>
</div>

<div class="container mt-5">
    <div class="d-flex flex-column flex-lg-row gap-4">
        <a href="/du-an"
            class="w-100 bg-box bg-box-btn rounded-5 d-flex align-items-center gap-2 justify-content-center py-3 small animate__animated animate__bounceIn animate__delay-2s">
            <i class="bi bi-collection"></i>
            <div class="">Tất cả dự án</div>
        </a>
        <a href="/suu-tam"
            class="w-100 bg-box bg-box-btn rounded-5 d-flex align-items-center gap-2 justify-content-center py-3 small animate__animated animate__bounceIn animate__delay-3s">
            <i class="bi bi-globe2"></i>
            <div class="">Thiết kế website</div>
        </a>
        <a href="/suu-tam"
            class="w-100 bg-box bg-box-btn rounded-5 d-flex align-items-center gap-2 justify-content-center py-3 small animate__animated animate__bounceIn animate__delay-4s">
            <i class="bi bi-layout-wtf"></i>
            <div class="">Thiết kế Figma</div>
        </a>
        <a href="/dang-nhap"
            class="w-100 bg-box bg-box-btn rounded-5 d-flex align-items-center gap-2 justify-content-center py-3 small animate__animated animate__bounceIn animate__delay-5s">
            <i class="bi bi-envelope"></i>
            <div class="">Gửi thư liên hệ</div>
        </a>
    </div>
</div>