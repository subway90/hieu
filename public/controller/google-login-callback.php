<?php

// Autoload
require_once './vendor/autoload.php';

model('public','account');


// Cấu hình Google Client
$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URL);

if (isset($_GET['code'])) {
    // Tạo mã token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    // Nếu có mã token
    if(isset($token['access_token']) && $token['access_token']) {
        // Xác thực mã token
        $client->setAccessToken($token['access_token']);

        // Lấy thông tin người dùng
        $oauth2 = new Google_Service_Oauth2($client);
        $userInfo = $oauth2->userinfo->get();

        // Có data -> đăng nhập
        if($userInfo) login_with_google($userInfo->id,$userInfo->name,$userInfo->picture,$userInfo->email);
    }
    
    // Đăng nhập thất bại
    toast_create('failed','Đăng nhập bằng Google thất bại. Vui lòng thử lại !');
    route('dang-nhap');
    
}
else {
    view_error(400);
}