<link rel="stylesheet" href="<?= URL_P_V ?>css/profile.css?v=1.3">

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
                    <button type="submit" name="logout"
                        class="col-2 col-lg-12 btn w-100 bg-box bg-box-btn px-4 py-3 align-items-center rounded-4">
                        <i class="bi bi-escape text-danger"></i>
                        <span class="d-none d-lg-block text-nowrap text-danger">Đăng xuất tài khoản</span>
                    </button>
                </form>
                <?php if (auth('name_role') === 'admin'): ?>
                    <a href="/admin/thong-ke" class="col-2 col-lg-12 bg-box bg-box-btn p-3 rounded-4">
                        <i class="bi bi-sliders text-danger"></i>
                        <span class="d-none d-lg-block text-nowrap text-danger">Hệ thống quản trị</span>
                    </a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-12 col-lg-9 pe-lg-0 mt-4 mt-lg-0">
            <div class="bg-box rounded-4 d-flex flex-column text-light-50 p-4 small">
                <div class="d-flex align-items-center gap-3">
                    <div class="small">Ảnh đại diện :</div>
                    <div class="group-avatar d-flex align-items-center gap-3">
                        <img width="80" src="<?= auth('avatar') ? URL_A.auth('avatar') : auth('google_avatar') ?? DEFAULT_AVATAR_MALE ?>" alt="" class="rounded-circle">
                        <form action="/thong-tin-ca-nhan" method="post" enctype="multipart/form-data">
                            <input accept="image/*" type="file" name="change_avatar" id="change_avatar" hidden>
                            <label class="btn btn-sm btn-outline-light rounded-4 d-flex align-items-center gap-2 px-3" for="change_avatar">
                                <i class="bi bi-person-bounding-box"></i>
                                <small>Thay đổi ảnh đại diện mới</small>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="<?= URL_P_V ?>js/profile.js?v=1.1"></script>