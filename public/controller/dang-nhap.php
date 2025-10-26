<?php

// test_array($_SESSION);

// Kiểm tra đã đăng nhập chưa
// if(is_login()) route('trang-chu');

// model
model('public','account');

// variable
$username = '';

// Nhấn submit đăng nhập
if(isset($_POST['login'])) {

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
        if(auth('name_role') == 'admin') route('admin');
        route('trang-chu');
    }
            
}

$data = [
    'username' => $username,
];


view('public','login','Đăng nhập',$data);