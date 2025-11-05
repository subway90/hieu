<link rel="stylesheet" href="<?= URL_P_V ?>css/profile.css?v=1.4">

<div class="container">
    <div class="row my-4">
        <div class="col-12 col-lg-3 ps-lg-0 pe-lg-4">
            <div class="d-flex justify-content-center flex-row flex-lg-column gap-3 gap-lg-4">
                <a href="/profile" class="col-2 col-lg-12 bg-box bg-box-btn active p-3 rounded-4">
                    <i class="bi bi-person"></i>
                    <span class="d-none d-lg-block text-nowrap ">Thông tin cá nhân</span>
                </a>
                <a href="/profile" class="col-2 col-lg-12 bg-box bg-box-btn p-3 rounded-4">
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
                <div class="text-center text-lg-start text-light-60 fw-bold mt-3 mb-2">
                    Hiển thị
                </div>
                <div class="mb-3 d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-1 gap-lg-3">
                    <label for="change_avatar">Ảnh đại diện :</label>
                    <div class="group-change-image d-flex justify-content-center justify-content-lg-start align-items-center gap-3">
                        <img width="80"
                            src="<?= auth('account_avatar') ? URL_A . auth('account_avatar') : auth('account_google_avatar') ?? DEFAULT_AVATAR_MALE ?>"
                            alt="" class="rounded-circle">
                        <form action="/profile" method="post" enctype="multipart/form-data">
                            <input accept="image/*" type="file" name="change_avatar" id="change_avatar" hidden>
                            <label class="btn btn-sm btn-outline-light rounded-4 d-flex align-items-center gap-2 px-3"
                                for="change_avatar">
                                <i class="bi bi-person-bounding-box"></i>
                                <small>Thay đổi ảnh</small>
                            </label>
                        </form>
                    </div>
                </div>
                <div class="mb-3 d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-1 gap-lg-3">
                    <label for="change_avatar">Ảnh nền :</label>
                    <div class="group-change-image d-flex flex-column flex-lg-row align-items-center gap-3">
                        <img 
                            src="<?= auth('account_banner') ? URL_A.auth('account_banner') : DEFAULT_BANNER_PROFILE ?>"
                            alt="banner" class="rounded-2 banner">
                        <form action="/profile" method="post" enctype="multipart/form-data">
                            <input accept="image/*" type="file" name="change_banner" id="change_banner" hidden>
                            <label class="btn btn-sm btn-outline-light rounded-4 px-3"
                                for="change_banner">
                                <i class="bi bi-image"></i>
                                <small>Thay đổi ảnh nền mới</small>
                            </label>
                        </form>
                    </div>
                </div>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    <div class="mb-3 d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-1 gap-lg-3">
                        <label for="username"> Username :</label>
                        <div class="input w-lg-fit-content">
                            <input type="text" name="username" id="username" value="<?= $username ?? auth('account_username') ?>"
                                placeholder="Nhập họ và tên của bạn">
                        </div>
                        <button type="submit" class="nav-link link-primary text-nowrap w-100 text-center text-lg-start">
                            <i class="bi bi-clipboard2-check small"></i>
                            <small>Lưu</small>
                        </button>
                    </div>
                </form>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    <div class="mb-3 d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-1 gap-lg-3">
                        <label for="bio"> Tiểu sử :</label>
                        <div class="input w-lg-fit-content">
                            <textarea rows="2" type="text" name="bio" id="bio" placeholder="Hãy mô tả tiểu sử của bạn"><?= auth('account_bio') ?></textarea>
                        </div>
                        <button type="submit" class="nav-link link-primary text-nowrap w-100 text-center text-lg-start">
                            <i class="bi bi-clipboard2-check small"></i>
                            <small>Lưu</small>
                        </button>
                    </div>
                </form>
                <div class="text-center text-lg-start text-light-60 fw-bold mt-4 mb-2">
                    Thông tin
                </div>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    <div class="mb-3 d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-1 gap-lg-3">
                        <label for="full_name"> Họ và tên :</label>
                        <div class="input w-lg-fit-content">
                            <input type="text" name="full_name" id="full_name" value="<?= auth('account_full_name') ?>"
                                placeholder="Nhập họ và tên của bạn">
                        </div>
                        <button type="submit" class="nav-link link-primary text-nowrap w-100 text-center text-lg-start">
                            <i class="bi bi-clipboard2-check small"></i>
                            <small>Lưu</small>
                        </button>
                    </div>
                </form>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    <div class="mb-3 d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-1 gap-lg-3">
                        <label for="birthday"> Ngày sinh :</label>
                        <div class="input w-lg-fit-content">
                            <input name="birthday" id="birthday" value="<?= date('d-m-Y',strtotime(auth('account_birthday'))) ?>"
                                placeholder="Chọn ngày sinh của bạn">
                        </div>
                        <button type="submit" class="nav-link link-primary text-nowrap w-100 text-center text-lg-start">
                            <i class="bi bi-clipboard2-check small"></i>
                            <small>Lưu</small>
                        </button>
                    </div>
                </form>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    <div class="mb-3 d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-1 gap-lg-3">
                        <label for="gender"> Giới tính :</label>
                        <div class="input w-lg-fit-content">
                            <select name="gender" id="gender">
                                <option selected disabled>- Chọn giới tính -</option>
                                <option value="nam" <?= auth('account_gender') == 'nam' ? 'selected' : '' ?> >Nam</option>
                                <option value="nữ" <?= auth('account_gender') == 'nữ' ? 'selected' : '' ?> >Nữ</option>
                                <option value="khác" <?= auth('account_gender') == 'khác' ? 'selected' : '' ?> >Khác</option>
                            </select>
                        </div>
                        <button type="submit" class="nav-link link-primary text-nowrap w-100 text-center text-lg-start">
                            <i class="bi bi-clipboard2-check small"></i>
                            <small>Lưu</small>
                        </button>
                    </div>
                </form>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    <div class="mb-3 d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-1 gap-lg-3">
                        <label for="address"> Thành phố :</label>
                        <div class="input w-lg-fit-content">
                            <select name="address" id="address">
                                <option value="0" selected disabled>- Chọn thành phố đang sinh sống -</option>
                                <?php for ($i=1; $i <= count(ARR_PROVINCE); $i++) : ?>
                                    <option <?= auth('account_address') == $i ? 'selected' : '' ?> value="<?= $i ?>"><?= ARR_PROVINCE[$i-1] ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                        <button type="submit" class="nav-link link-primary text-nowrap w-100 text-center text-lg-start">
                            <i class="bi bi-clipboard2-check small"></i>
                            <small>Lưu</small>
                        </button>
                    </div>
                </form>

                <!-- Custom Picker Date -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script>
                    flatpickr("#birthday", {
                        dateFormat: "d-m-Y",
                    });
                </script>
                <style>
                    .flatpickr-calendar {
                        border: none;
                        border: 1px solid var(--bs-light-50) !important;
                        background-color: var(--bs-primary-50);
                        backdrop-filter: blur(8px);
                    }

                    .flatpickr-day {
                        border: none;
                        color: var(--bs-light-80);
                    }

                    .flatpickr-day.selected {
                        color: var(--bs-primary-bold);
                        background-color: var(--bs-light-80) !important;
                    }

                    .flatpickr-day:hover {
                        background-color: var(--bs-light-60) !important;
                    }

                    .flatpickr-weekday,
                    .numInputWrapper {
                        color: var(--bs-light-80) !important;
                    }

                    .prevMonthDay,
                    .nextMonthDay {
                        color: var(--bs-primary-bold);
                        color: var(--bs-light-50) !important;
                    }

                    .flatpickr-day:hover {
                        color: var(--bs-primary);
                    }
                    .flatpickr-months {
                        background-color: var(--bs-primary);
                        color: var(--bs-light-50);
                    }

                    .flatpickr-monthDropdown-months{
                        background-color: var(--bs-primary-bold);
                        color: var(--bs-light-60);
                    }

                </style>
            </div>
        </div>
    </div>
</div>

<script src="<?= URL_P_V ?>js/profile.js?v=1.2"></script>