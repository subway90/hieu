<?php


/**
 * Lưu path khi cập nhật ảnh đại diện
 * @param mixed $path_avatar Đường dẫn file của avatar
 * @return void
 */
function update_avatar($path_avatar) {
    // valid login
    if(!is_login()) exit;

    // query 
    pdo_execute(
        'UPDATE user SET avatar = ? WHERE username = ?'
        ,$path_avatar,auth('username')
    );
}