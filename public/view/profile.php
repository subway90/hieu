<link rel="stylesheet" href="<?= URL_P_V ?>css/profile.css?v=1.2">

<div class="container">
    <div class="row my-4">
        <div class="col-12 col-lg-3 ps-lg-0 pe-lg-4">
            <div class="d-flex justify-content-center flex-row flex-lg-column gap-3 gap-lg-4">
                <a href="/thong-tin-ca-nhan" class="col-2 col-lg-12 bg-box bg-box-btn active p-3 rounded-4">
                    <i class="bi bi-person"></i>
                    <span class="d-none d-lg-block text-nowrap ">Thông tin cá nhân</span>
                </a>
                <a href="/thong-tin-ca-nhan" class="col-2 col-lg-12 bg-box bg-box-btn p-3 rounded-4">
                    <i class="bi bi-key"></i>
                    <span class="d-none d-lg-block text-nowrap ">Thay đổi mật khẩu</span>
                </a>
                <form action="/dang-nhap" method="post">
                    <button type="submit" name="logout" class="col-2 col-lg-12 btn w-100 bg-box bg-box-btn px-4 py-3 align-items-center rounded-4">
                        <i class="bi bi-escape text-danger"></i>
                        <span class="d-none d-lg-block text-nowrap text-danger">Đăng xuất tài khoản</span>
                    </button>
                </form>
                <?php if(auth('name_role') === 'admin') : ?>
                <a href="/admin/thong-ke" class="col-2 col-lg-12 bg-box bg-box-btn p-3 rounded-4">
                    <i class="bi bi-sliders text-danger"></i>
                    <span class="d-none d-lg-block text-nowrap text-danger">Hệ thống quản trị</span>
                </a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-12 col-lg-9 pe-lg-0 mt-4 mt-lg-0">
            <div class="bg-box rounded-4 d-flex flex-column text-light-50 p-1 pb-4 small">
                <div class="header-profile">
                    <img src="<?= DEFAULT_BANNER_PROFILE ?>" alt="" class="banner-profile border-1 border-light">
                    <img src="<?= ((auth('google_avatar')) ?? DEFAULT_AVATAR_MALE) ?>" class="avatar-profile" alt="">
                </div>
                <div class="d-flex flex-column flex-lg-row gap-2 align-items-center justify-content-between">
                    <div class="title-profile">
                        <div class="name">
                        <?= auth('full_name') ?>
                        </div>
                        <div class="username">
                            @subway90
                        </div>
                    </div>
                    <div class="action-profile pe-lg-3">
                        <button class="btn btn-sm btn-outline-light rounded-5 small px-3">
                            <i class="bi bi-eye small"></i>
                            <small>Theo dõi</small>
                        </button>
                    </div>
                </div>
                <div class="body-profile ps-lg-5 px-2 mt-3">
                    <div class="bio mt-lg-1 text-center text-lg-start">
                        Chào mừng bạn đến với trang cá nhân của mình. Kết bạn nhé !
                    </div>
                    <div class="row gap-2 mt-4">
                        <div class="col-12 d-flex gap-3 align-items-center">
                            <i class="bi bi-geo-alt"></i>
                            <span>
                                Quảng Ngãi
                            </span>
                        </div>
                        <div class="col-12 d-flex gap-3 align-items-center">
                            <i class="bi bi-cake2"></i>
                            <span>
                                31/05/2004
                            </span>
                        </div>
                        <div class="col-12 d-flex gap-3 align-items-center">
                            <i class="bi bi-telephone"></i>
                            <span>
                                0965 279 041
                            </span>
                        </div>
                        <div class="col-12 d-flex gap-3 align-items-center">
                            <i class="bi bi-envelope-at"></i>
                            <span>
                                <?= auth('email') ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center text-lg-start mt-3 text-note-version-beta">
                <i class="bi bi-exclamation-diamond text-warning"></i> Hiện tại là phiên bản thử nghiệm, dữ liệu có thể không chính xác.
            </div>
        </div>
    </div>
</div>