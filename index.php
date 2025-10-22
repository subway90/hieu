<?php
# [CORE]
require_once 'config.php';
require_once 'core/autoload.php';
require_once 'core/database.php';
require_once 'core/function.php';

# [AUTO LOGIN]
auto_login();

# [UPGRADE PAGE]
if(BOOL_UPGRADE) view_error(503);

# [ACTION]
$_case = get_action_uri(0);
// Nếu có case cụ thể
if($_case) {
    // Nếu vào system admin
    if($_case === 'admin') {
        // Kiểm tra có phải là admin hay không
        author('admin');
        // Nếu có case cụ thể
        $_admin_case = get_action_uri(1);
        if($_admin_case) {
            if(file_exists('admin/controller/'.$_admin_case.'.php')) require_once 'admin/controller/'.$_admin_case.'.php'; // Vào case
            else return view_error(404); // Nếu không tìm thấy action
        }
        else require_once 'admin/controller/'.DEFAULT_ADMIN_CASE.'.php'; // Chuyển đến case mặc định
    }
    // Trả về action bên user
    else{
        if(file_exists('public/controller/'.$_case.'.php')) require_once 'public/controller/'.$_case.'.php';
        else return view_error(404);
    }
}
// Trường hợp không có action
else require_once 'public/controller/'.DEFAULT_USER_CASE.'.php';