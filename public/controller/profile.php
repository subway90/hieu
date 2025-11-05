<?php

// model
model('public','profile');


// action

// Thay đổi ảnh đại diện
if(isset($_FILES['change_avatar'])) {
    // variable
    $max_size = 1024 * 1000; // 1kb = 1024 byte
    $accept_type = ['image/png','image/jpeg','image/webp','image/jpeg','image/gif'];

    // save
    $save = save_file(true,'avatar',$_FILES['change_avatar'],$max_size,$accept_type);
    
    // save success
    if($save['path']) {
        // update
        update_profile('avatar',$save['path']);

        // update session
        $_SESSION['user']['account_avatar'] = $save['path'];

        // toast
        toast_create('success','Cập nhật ảnh đại diện thành công');

        // route
        route('profile');
    }
}


// Thay đổi ảnh nền
if(isset($_FILES['change_banner'])) {
    // variable
    $max_size = 1024 * 1000; // 1kb = 1024 byte
    $accept_type = ['image/png','image/jpeg','image/webp','image/jpeg','image/gif'];

    // save
    $save = save_file(true,'banner',$_FILES['change_banner'],$max_size,$accept_type);
    
    // save success
    if($save['path']) {
        // update
        update_profile('banner',$save['path']);

        // update session
        $_SESSION['user']['account_banner'] = $save['path'];

        // toast
        toast_create('success','Cập nhật ảnh nền thành công');

        // route
        route('profile');
    }
}


// Thay đổi username 
if(isset($_POST['username'])) {
    // input
    $username = $_POST['username'];

    // check
    $check = check_exist_one_by_custom('account','account_username',$_POST['username'],null,auth('account_id'));

    // exist
    if($check) toast_create('failed','Username này đã tồn tại');
    
    // update
    else {
        // update session
        $_SESSION['user']['account_username'] = $username;
        // update
        update_profile('username',$username);
        // toast
        toast_create('success','Cập nhật thành công');
        // route
        route('profile');
    }

}


// Cập nhật tiểu sử
if(isset($_POST['bio'])) {
    // input
    $bio = $_POST['bio'];

    // valid
    if(!$bio) toast_create('failed','Tiểu sử không thể để trống');
    
    // update
    else {
        // update session
        $_SESSION['user']['account_bio'] = $bio;
        // update
        update_profile('bio',$bio);
        // toast
        toast_create('success','Cập nhật thành công');
        // route
        route('profile');
    }

}

// Cập nhật họ và tên
if(isset($_POST['full_name'])) {
    // input
    $full_name = $_POST['full_name'];

    // valid
    if(!$full_name) toast_create('failed','Họ và tên không thể để trống');
    if(!check_string($full_name)) toast_create('failed','Họ và tên không hợp lệ');
    
    // update
    else {
        // update session
        $_SESSION['user']['account_full_name'] = $full_name;
        // query
        update_profile('full_name',$full_name);
        // toast
        toast_create('success','Cập nhật thành công');
        // route
        route('profile#full_name');
    }
}

// Cập nhật ngày sinh
if(isset($_POST['birthday'])) {
    // input
    $birthday = $_POST['birthday'];

    // valid
    if(!$birthday) toast_create('failed','Ngày sinh không thể để trống');
    
    // update
    else {
        // update session
        $_SESSION['user']['account_birthday'] = $birthday;
        // format dd-mm-yyyy -> yyyy-mm-dd
        $birthday = date('Y-m-d',strtotime($birthday));
        // update
        update_profile('birthday',$birthday);
        // toast
        toast_create('success','Cập nhật thành công');
        // route
        route('profile#birthday');
    }
}


// Cập nhật giới tính
if(isset($_POST['gender'])) {
    // input
    $gender = $_POST['gender'];

    // valid
    if(!$gender) toast_create('failed','Giới tính không thể để trống');
    
    // update
    else {
        // update session
        $_SESSION['user']['account_gender'] = $gender;
        // update
        update_profile('gender',$gender);
        // toast
        toast_create('success','Cập nhật thành công');
        // route
        route('profile#gender');
    }
}


// Cập nhật nơi ở
if(isset($_POST['address'])) {
    // input
    $address = $_POST['address'];

    // valid
    if(!$address) toast_create('failed','Nơi ở không thể để trống');
    
    // update
    else {
        // update session
        $_SESSION['user']['account_address'] = $address;
        // update
        update_profile('address',$address);
        // toast
        toast_create('success','Cập nhật thành công');
        // route
        route('profile#address');
    }
}


view('public','profile','Thông tin cá nhân',null);