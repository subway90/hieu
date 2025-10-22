<?php
    require_once __DIR__ . '/../config.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= WEB_FAVICON ?>" type="image/x-icon">
    <title><?= WEB_NAME ?> | 503 Service Unavailable</title>
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
        .box-radio {
            padding: 12px 0;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="error">503 Service Unavailable</div>
        <div class="">
            <p>Trang website đang được bảo trì, vui lòng thử lại sau ít phút.</p>
        </div>
    </div>
    <div class="box-radio">
        <audio id="myAudio" src="<?=URL_A?>audio/like_im_gonna_lose_u.mp3" controls loop></audio>
    </div>
    <a href="/">
        Tải lại trang
    </a>
</body>
</html>