

<div class="container py-5">
    <div class="d-flex flex-column align-items-center">
        <form action="" method="post" class="bg-box p-3 col-12 col-md-6 col-lg-4 rounded-4">
            <div class="input">
                <label for="username">
                    Tài khoản
                </label>
                <input id="username" name="username" value="<?= $username ?>" autocomplete="off" placeholder="Vui lòng nhập username" type="text">
            </div>
            <div class="input mt-2">
                <label for="password">
                    Mật khẩu
                </label>
                <input id="password" name="password" value="" autocomplete="off" placeholder="Vui lòng nhập mật khẩu" type="password">
            </div>
            <div class="d-flex justify-content-end pe-2 mt-2">
                <a href="/quen-mat-khau" class="nav-link small d-flex align-items-center gap-1">
                    <i class="bi bi-key small"></i>
                    <small>Lấy lại mật khẩu</small>
                </a>
            </div>
            <button name="login" type="submit" class="input-btn mt-4">
                Đăng nhập
            </button>
            <a href="/dang-ky" class="nav-link small d-flex justify-content-center align-items-center gap-1 mt-4">
                <i class="bi bi-person-plus small"></i>
                <small>Tạo tài khoản mới</small>
            </a>
        </form>
        <div class="small text-light-50 mt-5 mb-3">
                hoặc tiếp tục với
            </div>
        <a href="/" class="bg-box bg-box-btn p-3 col-12 col-md-6 col-lg-4 rounded-4 small text-light-50">
            <i class="bi bi-google">
            </i>
            Tài khoản Google
        </a>
    </div>
</div>