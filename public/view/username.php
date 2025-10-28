<link rel="stylesheet" href="<?= URL_P_V ?>css/username.css?v=1.1">

<div class="container px-lg-0">
    <div class="row my-4 gap-4 gap-lg-0">
        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
            <div class="bg-box rounded-4 d-flex flex-column text-light-50 p-1 pb-4 small">
                <div class="header-profile">
                    <img src="<?= $profile['banner'] ? URL_A.$profile['banner'] : DEFAULT_BANNER_PROFILE ?>" alt="" class="banner-profile border-1 border-light">
                    <img src="<?= $profile['avatar'] ? URL_A.$profile['avatar'] : ($profile['google_avatar']) ?? DEFAULT_AVATAR_MALE ?>" class="avatar-profile" alt="">
                </div>
                <div class="d-flex flex-column flex-lg-row gap-2 align-items-center justify-content-between">
                    <div class="title-profile">
                        <div class="name">
                        <?= $profile['full_name'] ?>
                        </div>
                        <div class="username">
                            @<?= $profile['username'] ?>
                        </div>
                    </div>
                    <div class="action-profile pe-lg-2">
                        <button class="btn btn-sm btn-outline-light rounded-5 small px-3">
                            <i class="bi bi-eye small"></i>
                            <small>Theo dõi</small>
                        </button>
                    </div>
                </div>
                <div class="body-profile ps-lg-5 px-2 mt-3">
                    <div class="bio mt-lg-1 text-center text-lg-start">
                        <?= $profile['bio'] ?? '<span class="d-non4 gap-lg-0">(chưa có tiểu sử)</span>' ?>
                    </div>
                    <div class="row gap-2 mt-4">
                        <div class="col-12 d-flex gap-3 align-items-center">
                            <i class="bi bi-geo-alt"></i>
                            <span>
                                Việt Nam
                            </span>
                        </div>
                        <div class="col-12 d-flex gap-3 align-items-center">
                            <i class="bi bi-cake2"></i>
                            <span>
                                01/01/2000
                            </span>
                        </div>
                        <div class="col-12 d-flex gap-3 align-items-center">
                            <i class="bi bi-telephone"></i>
                            <span>
                                0123 456 789
                            </span>
                        </div>
                        <div class="col-12 d-flex gap-3 align-items-center">
                            <i class="bi bi-envelope-at"></i>
                            <span>
                                <?= $profile['email'] ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 d-flex flex-column gap-4">
            <a href="/rank-level" class="bg-box bg-box-btn justify-content-between p-3 rounded-4 ">
                <i class="bi bi-capslock"></i>
                <div class="d-flex align-items-center gap-2 small">
                    Cấp 10 <span class="small"><small>(25,000 EXP)</small></span>
                </div>
            </a>
            <a href="@<?= $profile['username'] ?>/post" class="bg-box bg-box-btn justify-content-between p-3 rounded-4 ">
                <i class="bi bi-book"></i>
                <div class="d-flex align-items-center gap-1 small">
                    22 <span class="small"><small>bài viết</small></span>
                </div>
            </a>
            <a href="@<?= $profile['username'] ?>/reply" class="bg-box bg-box-btn justify-content-between p-3 rounded-4 ">
                <i class="bi bi-chat"></i>
                <div class="d-flex align-items-center gap-1 small">
                    55 <span class="small"><small>phản hồi</small></span>
                </div>
            </a>
        </div>
        <div class="col-12 text-center text-lg-start mt-3 text-note-version-beta">
            <i class="bi bi-exclamation-diamond text-warning"></i> Hiện tại là phiên bản thử nghiệm, dữ liệu có thể không chính xác.
        </div>
    </div>
</div>