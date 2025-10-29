<?php

// model
model('public','profile');
// action

// Bấm submit thay đổi ảhh đại diện
if(isset($_FILES['change_avatar'])) {
    // variable
    $max_size = 1024 * 1000; // 1kb = 1024 byte
    $accept_type = ['image/png','image/jpeg','image/webp','image/jpeg','image/gif'];

    // save
    $save = save_file(true,'avatar',$_FILES['change_avatar'],$max_size,$accept_type);
    
    // save success
    if($save['path']) {
        // update database
        update_avatar($save['path']);

        // update session
        $_SESSION['user']['avatar'] = $save['path'];

        // toast
        toast_create('success','Cập nhật ảnh đại diện thành công');

        // route
        route('thong-tin-ca-nhan');
    }


}

$data = [

];

view('public','profile','Thông tin cá nhân',$data);