<?php

/**
 * Kiểm tra một field nào đó có value tồn tại hay không
 * @param $field Tên field cần kiểm tra
 * @param $value Giá trị cần kiểm tra
 * @return boolean TRUE nếu tồn tại, ngược lại FALSE khi không tồn tại
 */
function check_one_exist_in_user_with_field($field,$value) {
    $result = pdo_query_value(
        'SELECT account_username FROM account WHERE '.$field.' = ? AND deleted_at IS NULL'
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
 * @param string $username Username
 * @param string $password Mật khẩu
 * @param int $id_role ID role
 * @param string $email Email
 * @param string $full_name Họ tên
 * @param int $gender Giới tính
 * @param string | null $google_id ID dành cho người đăng nhập bằng tài khoản google
 * @param string | null $google_avatar path avatar dành cho người đăng nhập bằng tài khoản google
 * @return void
 */
function create_user($username,$password,$id_role,$email,$full_name,$gender,$google_id = '',$google_avatar = '') {
    pdo_execute(
        'INSERT INTO account (account_username,account_password,id_role,account_email,account_full_name,account_gender,account_google_id,account_google_avatar) VALUES (?,?,?,?,?,?,?,?)'
        ,$username,md5($password),$id_role,$email,$full_name,$gender,$google_id,$google_avatar
    );
}



/**
 * Truy vấn thông tin của một user bằng $username
 * @param string $username Username cần truy vấn
 * @return array
 */
function get_one_user_by_username($username) {
    return pdo_query_one(
        'SELECT a.*, r.name_role
        FROM account a
        JOIN role r
        ON a.id_role = r.id_role
        WHERE a.deleted_at IS NULL
        AND a.account_username = ?'
        ,$username
    );
}



/**
 * Lấy thông tin của một user đăng nhập bằng google
 * @param string $google_id google_id cần truy vấn
 * @return array
 */
function get_one_user_by_google_id($google_id) {
    return pdo_query_one(
        'SELECT a.*, r.name_role
        FROM account a
        JOIN role r
        ON a.id_role = r.id_role
        WHERE a.deleted_at IS NULL
        AND a.account_google_id = ?'
        ,$google_id
    );
}



/**
 * Khởi tạo cookie và lưu cookie cho tính năng tự động đăng nhập
 * 
 * Yêu cầu : Phải có giá trị $_SESSION['user']['username']
 * 
 * Lưu ý : Dùng hàm này nếu có sử dụng hàm auto_login()
 * 
 * @param mixed $cookie_value Giá trị token
 * @return void
 */
function create_cookie_token_remember ($cookie_value) {
    // Lưu database
    pdo_execute(
        'UPDATE account SET account_token_remember = ? WHERE account_username = ?',
        $cookie_value,$_SESSION['user']['username']
    );

    // Khởi tạo cookie
    setcookie('token_remember',$cookie_value, [
        'expires' => time() + (86400 * 365), // thời hạn cookie
        'path' => '/', // Cookie có thể truy cập từ mọi đường dẫn
        'domain' => DOMAIN, // Thay đổi theo domain của bạn
        'secure' => true, // Chỉ gửi cookie qua HTTPS
        'httponly' => true, // Tránh getCookie
        'samesite' => 'Strict' // Bảo vệ khỏi các tấn công CSRF
    ]);
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
    if(!$get_user) toast_create('failed','Tài khoản này không tồn tại');
    else {
        // Đúng mật khẩu
        if(md5($password) == $get_user['account_password']) {
            // lưu thông tin đăng nhập vào session
            $_SESSION['user'] = $get_user;
            // tạo token remember
            $token_remember = create_uuid();
            // Lưu token remember vào database
            pdo_execute(
                'UPDATE account SET account_token_remember = ? WHERE account_username = ?',
                $token_remember,$_SESSION['user']['username']
            );
            // tạo cookie cho tính năng tự động đăng nhập
            create_cookie_token_remember($token_remember);
            // thông báo toast
            toast_create('success','<i class="bi bi-check-circle me-2"></i> Đăng nhập thành công');

            return true;
        }
        // Đăng nhập thất bại
        else toast_create('failed','Mật khẩu không chính xác !');
    }
    return false;
}



/**
 * Hàm dùng để đăng nhập với tài khoản google
 * @param string $google_id ID tài khoản google
 * @param string $google_name Tên tài khoản google
 * @param string $google_email Email google
 * @param string $google_avatar URL avatar google
 * @return void Chuyển đổi route và thông báo toast
 */
function login_with_google($google_id,$google_name,$google_avatar,$google_email) {
    // Lấy thông tin
    $get_user = get_one_user_by_google_id($google_id);

    // Kiểm tra user có tồn tại, nếu chưa có thì tạo mới
    if(!$get_user) {
        // tạo cookie cho tính năng tự động đăng nhập
        create_cookie_token_remember($_SESSION['user']['token_remember']);

        // lưu db
        create_user($google_id,create_token(20),2,$google_email,$google_name,1,$google_id,$google_avatar);

        // tạo session user
        $_SESSION['user'] = get_one_user_by_google_id($google_id);

        // tạo cookie cho tính năng tự động đăng nhập
        create_cookie_token_remember(create_uuid());

        // thông báo
        toast_create('success','Đăng nhập thành công');

        // chuyển trang
        route('thong-tin-ca-nhan');

    }
    // Nếu đã có tài khoản
    else {
            // lưu thông tin đăng nhập vào session
            $_SESSION['user'] = $get_user;

            // tạo cookie cho tính năng tự động đăng nhập
            create_cookie_token_remember(create_uuid());

            // thông báo toast
            toast_create('success','Đăng nhập thành công');

            // chuyển trang
            route('trang-chu');

        }
}