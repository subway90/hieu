<?php
    require_once __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= WEB_FAVICON ?>" type="image/x-icon">
    <title><?= WEB_NAME ?> | 401 Unauthorization</title>
    <style>
        body {
            background-color :rgba(0, 0, 0, 0.95);
            color : white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .box{
            font-family : monospace;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
        }
        .error {
            font-size: 20px;
            font-weight: bold;
            color : #f37986;
            border-right: solid 2px;
            padding : 0 12px 0 0;
            margin: 12px;
        }
        p {
            font-size: 14px;
        }
        a {
            margin-top: 10px;
            color : white;
            text-decoration : none;
        }
        a:hover {
            text-decoration : underline;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="error">401 Unauthorization</div>
        <div class="">
            <p>Đường dẫn này chưa được cấp quyền cho bạn.</p>
        </div>
    </div>
    <a href="/">Quay lại trang chủ</a>
</body>
</html>