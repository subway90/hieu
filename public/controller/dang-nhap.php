<?php


// model
model('public','account');

// variable
$username = '';

// Nhấn submit đăng nhập
if(isset($_POST['login'])) {
    
    // Kiểm tra đã đăng nhập chưa
    if(is_login()) route(DEFAULT_USER_CASE);

    // lấy thông tin từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Bắt validate
    if(!$username) toast_create('danger','Vui lòng nhập username');
    elseif(!$password) toast_create('danger','Vui lòng nhập mật khẩu');

    // Tiến hành đăng nhập
    else if(login($username,$password)) {
        // Chuyển hướng trang thanh toán (nếu có)
        if($return_checkout_page) route('thanh-toan');
        // Chuyển hướng theo role
        if(auth('name_role') == 'admin') route(DEFAULT_ADMIN_CASE);
        route(DEFAULT_USER_CASE);
    }
            
}

// Nhấn submit đăng nhập với Google
if(get_action_uri(1) === 'google') {
    require_once './vendor/autoload.php';
    // Cấu hình Google Client
    $client = new Google_Client();
    $client->setClientId(GOOGLE_CLIENT_ID);
    $client->setClientSecret(GOOGLE_CLIENT_SECRET);
    $client->setRedirectUri(GOOGLE_REDIRECT_URL);
    $client->addScope('email');
    $client->addScope('profile');

    // Tạo url
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit();
}

// Nhấn submit đăng xuất
if(isset($_POST['logout'])) {
    if(is_login()) {
        // huỷ session USER
        unset($_SESSION['user']);
        // huỷ cookie nếu có
        setcookie('token_remember',$token_remember, [
            'expires' => time() - 1,
            'path' => '/',
            'domain' => DOMAIN,
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict'
        ]);
        // thông báo
        toast_create('success','<i class="bi bi-check-circle me-2"></i> Đăng xuất thành công');
        // quay đến trang đăng nhập
        route(DEFAULT_USER_CASE);
    }else route('dang-nhap');
}

// Kiểm tra đã đăng nhập chưa
if(is_login()) route(DEFAULT_USER_CASE);

$data = [
    'username' => $username,
];


view('public','login','Đăng nhập',$data);