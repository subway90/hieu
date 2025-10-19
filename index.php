<?php
# [FILE]
require_once 'autoload.php';

# [AUTO LOGIN]
auto_login();

# [UPGRADE PAGE]
if(BOOL_UPGRADE) view_error(503);

# [ACTION]
$_case = get_action_uri(0);
// Nếu có case cụ thể
if($_case) {
    // Nếu vào system admin
    if(get_action_uri(0) === 'admin') {
        // Kiểm tra có phải là admin hay không
        author('admin');
        // Nếu có case cụ thể
        $_admin_case = get_action_uri(1);
        if($_admin_case) {
            if(file_exists('controllers/admin/'.$_admin_case.'.php')) require_once 'controllers/admin/'.$_admin_case.'.php'; // Vào case
            else return view_error(404); // Nếu không tìm thấy action
        }
        else require_once 'controllers/admin/'.DEFAULT_ADMIN_CASE.'.php'; // Chuyển đến case mặc định
    }
    // Trả về action bên user
    else{
        if(file_exists('controllers/user/'.$_case.'.php')) require_once 'controllers/user/'.$_case.'.php';
        else return view_error(404);
    }
}
// Trường hợp không có action
else require_once 'controllers/user/'.DEFAULT_USER_CASE.'.php';