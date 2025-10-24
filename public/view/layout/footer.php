<!-- Footer -->
<footer class="border-0">
    <div class="mt-5 mb-2 text-center text-light">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-12 d-flex align-items-center">
                    <a class="w-25" href="/">
                        <img class="w-100" src="<?= URL_A ?>image/minhhieu_logo.png" alt="">
                    </a>
                    <div class="g-h1 ms-3 text-start">
                        <div class="small"><i class="fas fa-user-circle"></i> <strong>Nguyễn Minh Hiếu</strong></div>
                        <div class="small"><i class="fas fa-phone-square-alt"></i> <strong>0965 279 041</strong></div>
                        <div class="small"><i class="fas fa-envelope-square"></i>
                            <strong>nguyenhieu3105@gmail.com</strong>
                        </div>
                        <div class="small"><i class="fas fa-map-marker-alt"></i> <strong>102 Tân Thới Nhất 01, P.Tân
                                Thới Nhất, Q.12, TP.Hồ Chí Minh, Việt Nam.</strong></div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">

                </div>

                <div class="col-lg-4 col-12 d-flex justify-content-center justify-content-lg-end my-3 my-lg-0">
                    <a href="https://github.com/subway90" target="_blank">
                        <i class="bi bi-github fs-3 g-h1 px-1"></i>
                    </a>
                    <a href="https://fb.com/hieu.name.vn/" target="_blank">
                        <i class="bi bi-facebook fs-3 g-h1 px-1"></i>
                    </a>
                    <a href="https://youtube.com/@subway90" target="_blank">
                        <i class="bi bi-youtube fs-3 g-h1 px-1"></i>
                    </a>
                    <a href="https://instagram.com/hieu.name.vn" target="_blank">
                        <i class="bi bi-instagram fs-3 g-h1 px-1"></i>
                    </a>
                    <a href="https://linkedin.com/in/subway90" target="_blank">
                        <i class="bi bi-linkedin fs-3 g-h1 px-1"></i>
                    </a>
                </div>

            </div>
        </div>
        <span class="g-h1 small">&copy; Bản quyền thuộc <a target="_blank" href="https://github.com/subway90/hieu"><strong>SUBWAY90</strong></a></span>
    </div>
</footer>

<div class="position-fixed end-0 bottom-0 mb-5 me-lg-4">
        <button class="btn btn-lg g-h1" id="scrollButton"><i class="fs-1 bi bi-arrow-up-circle-fill"></i></button>
</div>

</body>

<!-- JS custom -->
<script src="<?= URL_P_V ?>js/scroll.js"></script>
<script src="<?= URL_P_V ?>js/paragraph.js"></script>
<script src="<?= URL_P_V ?>js/light_mode.js"></script>
<!-- CDN JS Bootstrap 5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<!-- CDN JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- CDN Chative -->
<?php if(BOOL_CHATIVE): ?>
    <script src="https://messenger.svc.chative.io/static/v1.0/channels/s3ac3bbe7-7c9a-44d6-ab70-cffe6b2a1375/messenger.js?mode=livechat" defer="defer"></script>
<?php endif ?>

</html>