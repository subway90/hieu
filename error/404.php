<?php

// load config
require_once __DIR__ . '/../config.php';

// data 
$data = [
    'title' => '404 Not Found',
];


?>
<?= layout('public','header',$data) ?>

<link rel="stylesheet" href="<?= URL_P_V ?>css/error.css?v=1.1">

<div class="container px-lg-0">
    <div style="height: 50vh" class="d-flex flex-column align-items-center justify-content-center">
        <div class="title-404">
            404
        </div>
        <div class="text-404">
            Trang không được tìm thấy
        </div>
        <div class="mt-5 d-flex gap-3 align-items-center">
            <a href="javascript:history.go(-1)" class="align-items-center gap-2 btn btn-sm bg-box bg-box-btn rounded-pill px-3 py-2">
                <i class="my-1 bi bi-arrow-left"></i>
                <div class="small d-none d-md-block">
                    Quay lại
                </div>
            </a>
            <a href="javascript:location.reload()" class="align-items-center gap-2 btn btn-sm bg-box bg-box-btn rounded-pill px-3 py-2">
                <i class="my-1 bi bi-arrow-clockwise"></i>
                <div class="small d-none d-md-block">
                    Tải lại
                </div>
            </a>
            <a href="/" class="align-items-center gap-2 btn btn-sm bg-box bg-box-btn rounded-pill px-3 py-2">
                <i class="my-1 bi bi-house"></i>
                <div class="small d-none d-md-block">
                    Trang chủ
                </div>
            </a>
        </div>
    </div>
</div>


<?= layout('public','footer') ?>
