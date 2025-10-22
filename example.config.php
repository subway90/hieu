<?php

// ---[  DOMAIN   ] --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- [ ]

const DOMAIN = 'domain.com';

// ---[  SETTING  ] --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- [ ]

const URL       = 'https://' . DOMAIN . '/';
const URL_A     = URL . 'asset/';
const URL_AD    = URL . 'admin/';
const URL_AD_V  = URL . 'admin/view/';
const URL_P     = URL . 'public/';
const URL_P_V   = URL . 'public/view/';

// ---[  DEFAULT  ] --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- [ ]

const DEFAULT_ADMIN_CASE = 'thong-ke';
const DEFAULT_USER_CASE = 'trang-chu';
const DEFAULT_IMAGE = URL_A . '';
const DEFAULT_AVATAR = URL_A . '';

// ---[  WEBTEXT  ] --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- [ ]

const WEB_NAME = 'Hiếu Website';
const WEB_LOGO = URL_A . 'image/minhhieu_logo.png';
const WEB_FAVICON = URL_A.'image/minhhieu_logo.png';
const WEB_DESCRIPTION = 'Website cá nhân của Hiếu - Blog - Lưu trữ - Sưu tầm - Chia sẻ';

// ---[  CONNECT  ] --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- [ ]

const DB_BOOL = true;               //  bật tắt trạng thái hoạt động DB, mặc định 'true' [!] Chỉ Tắt Khi Không Sử Dụng Database MySQL
const DB_HOST = 'localhost';        //  tên host
const DB_USER = 'root';             //  tài khoản
const DB_PASS = '';                 //  mật khẩu
const DB_NAME = 'mvc_linhkien';     //  tên cơ sở dữ liệu

// ---[  CUSTOMS  ] --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- [ ]


// ---[  BOOL  ] --- --- --- --- --- --- --- ---

const BOOL_CHATIVE = true;          //  tính năng chat trực tuyến chative
const BOOL_SPINNER = false;         //  hiệu ứng tải trang
const BOOL_UPGRADE = false;         //  trang bảo trì

// ---[  TIME  ] --- --- --- --- --- --- --- ---

const TIME_SHOW_TOAST = 2000;       //  thời gian hiển thị thông báo toast (second - giây)
const TIME_LOAD_SLIDE = 2500;       //  thời gian chuyển slide carousel (second - giây)

// ---[  LIMIT  ] --- --- --- --- --- --- --- ---

const LIMIT_SIZE_FILE = 4;          //  giá trị tối đa cho phép lưu file (mb - megabyte)

// ---[  MAIL  ] --- --- --- --- --- --- --- ---

const MAILER_USERNAME = '';
const MAILER_PASSWORD = '';
const MAILER_YOURNAME = '';
const MAILER_SMTP = 'tls';
const MAILER_PORT = '587';
const MAILER_HOST = 'smtp.gmail.com';