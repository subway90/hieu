<?php

/**
 * Kiểm tra một field nào đó có value tồn tại hay không
 * @param $field Tên field cần kiểm tra
 * @param $value Giá trị cần kiểm tra
 * @return boolean TRUE nếu tồn tại, ngược lại FALSE khi không tồn tại
 */
function check_one_exist_in_user_with_field($field,$value) {
    $result = pdo_query_value(
        'SELECT username FROM user WHERE '.$field.' = ? AND deleted_at IS NULL'
        ,$value
    );
    if($result) return 1;
    return 0;
}

/**
 * Kiểm tra username có theo yêu cầu kí tự từ a-z, A-Z, 0-9
 * @param string $input
 * @return bool
 */
function check_valid_username($input) {
    return preg_match('/^[a-zA-Z0-9]+$/', $input) === 1;
}


/**
 * Tạo một user mới
 * @param string $token_remember Mã ghi nhớ đăng nhập
 * @param string $full_name Họ tên
 * @param int $gender Giới tính
 * @param string $email Email
 * @param string $username Username
 * @param string $password Mật khẩu
 * @param int $id_role ID role
 * @param string $address Địa chỉ giao hàng
 * @return int
 */
function create_user($token_remember,$full_name,$gender,$email,$username,$password,$id_role,$address) {
    try{
        pdo_execute(
            'INSERT INTO user (token_remember,full_name,gender,email,username,password,id_role) VALUES (?,?,?,?,?,?,?)'
            ,$token_remember,$full_name,$gender,$email,$username,md5($password),$id_role
        );
        pdo_execute(
            'INSERT INTO shipping_address (username,name_shipping_address) VALUES(?,?)'
            ,$username,$address
        );
    }catch(PDOException $e) {
        die(_s_me_error.$e->getMessage()._e_me_error);
    }
    return 1;
}

/**
 * Truy vấn thông tin của một user bằng $username
 * @param string $username Username cần truy vấn
 * @return array
 */
function get_one_user_by_username($username) {
    return pdo_query_one(
        'SELECT u.*, r.name_role
        FROM user u
        JOIN role r
        ON u.id_role = r.id_role
        WHERE u.deleted_at IS NULL
        AND u.username = ?'
        ,$username
    );
}

/**
 * Hàm dùng để đăng nhập 
 * @param mixed $username Tài khoản
 * @param mixed $password Mật khẩu
 * @return bool Trả về TRUE nếu đăng nhập thành công, trả về FALSE nếu đăng nhập thất bại
 */
function login($username,$password) {
    // Thực hiện lấy thông tin trên database
    $get_user = get_one_user_by_username($username);
    // Kiểm tra user có tồn tại
    if(!$get_user) toast_create('danger','Tài khoản này không tồn tại');
    else {
        // Đúng mật khẩu
        if(md5($password) == $get_user['password']) {
            // lưu thông tin đăng nhập vào session
            $_SESSION['user'] = $get_user;
            // Tạo token remember
            $token_remember = create_uuid();
            // Lưu token remember vào database
            pdo_execute(
                'UPDATE user SET token_remember = ? WHERE username = ?',
                $token_remember,$_SESSION['user']['username']
            );
            // Lưu token remember vào cookie (thời hạn là 1 tháng)
            setcookie('token_remember',$token_remember, [
                'expires' => time() + (86400 * 365), // thời hạn cookie
                'path' => '/', // Cookie có thể truy cập từ mọi đường dẫn
                'domain' => DOMAIN, // Thay đổi theo domain của bạn
                'secure' => true, // Chỉ gửi cookie qua HTTPS
                'httponly' => true, // Tránh getCookie
                'samesite' => 'Strict' // Bảo vệ khỏi các tấn công CSRF
            ]);
            // Thông báo toast
            toast_create('success','<i class="bi bi-check-circle me-2"></i> Đăng nhập thành công');

            return true;
        }
        // Đăng nhập thất bại
        else toast_create('danger','Mật khẩu không chính xác !');
    }
    return false;
}