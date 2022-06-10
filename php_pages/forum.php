<?php

require './parts/movwe_connect_db.php';
// $pageName = 'login';
$title = 'Movwe-討論區';

$output = [
    'code' => '0',
    'error' => '0',
];

// 從資料庫裡拿hashtag資料
$hashtagsql = 'SELECT * FROM `forum_hashtags` WHERE 1 LIMIT 7;';
$hashtagstmt = $pdo->prepare($hashtagsql);
$hashtagstmt->execute();
$hashtagrows = $hashtagstmt->fetchAll();
// 除錯
if (!empty($hashtagrows)) {
};

// 從資笠庫裡拿文章資料
$forumsql = 'SELECT * FROM `forum` FULL join `member` WHERE `forum_arthur` = `member_sid` ORDER BY `forum_sid` DESC LIMIT 7;';
// $forumsql = 'SELECT * FROM `forum` ORDER BY `forum_sid` DESC LIMIT 7;';
$forumstmt = $pdo->prepare($forumsql);
$forumstmt->execute();
$forumrows = $forumstmt->fetchAll();
// 除錯
if (!empty($forumrows)) {
};

// 用forumsid去查找所有的hashtag
$forumid = [];
foreach ($forumrows as $fr) {
    $forumid[] = $fr['forum_sid'];
};  

// 用forumsid去查找所有的tag
$tagsql = sprintf("SELECT * FROM `forum_has_hastag` WHERE `f_has_forum_sid` IN (%s)", implode(',', $forumid));
$tags = $pdo->query($tagsql)->fetchAll();

// 用forumsid去查找留言rowcount
$commentsql = sprintf("SELECT * FROM `forum_comment` WHERE `f_comment_forum_sid`  IN (%s)", implode(',', $forumid));
$comments = $pdo->query($commentsql)->fetchAll();


?>

<?php include __DIR__ . '/parts/movwe_head.php' ?>

<link rel="stylesheet" href="./css/mystyle.css">
<link rel="stylesheet" href="./css/forum.css">
<link rel="stylesheet" href="./css/Nav.css">
<link rel="stylesheet" href="./css/slider.css">
<!-- <link rel="stylesheet" href="./css/Carousel_12.css"> -->
<link rel="stylesheet" href="./css/dropdown_customstyle.css">

</head>
<style>
</style>

<body>
    <?php include __DIR__ . '/parts/movwe_nav_fin.php' ?>
    <div class="layout">

        <?php include __DIR__ . '/parts/movwe_nav_leftdiv.php' ?>

        <div class="container overflowX">

            <!-- 最上面的filter -->
            <div class="filter-top mt-80 mb-20">
                <ul class="d-flex justify-around align-item-center ">
                    <li>
                        <h4 class="main-color">全部</h4>
                    </li>
                    <li>
                        <h4>電影</h4>
                    </li>
                    <li>
                        <h4>影劇</h4>
                    </li>
                    <li>
                        <h4>綜藝</h4>
                    </li>
                    <li>
                        <h4>動畫</h4>
                    </li>
                </ul>
                <div class="custom-select select-pc" data-page="1">
                    <select name="" id="">
                        <option value="最新">最新</option>
                        <option value="熱門">熱門</option>
                    </select>
                </div>
            </div>

            <!-- 電腦版輪播牆 -->
            <div class="forum__banner__carousel__box forum__banner__carousel__box__pc">
                <div id="slider" class="slider__forum" style=" width: 100%; margin: 0 auto">
                    <div class="slide">
                        <img src="./img/banner/forum_banner01.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="./img/banner/forum_banner02.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="./img/banner/forum_banner03.jpg" alt="">
                    </div>
                </div>
            </div>

            <!-- 手機版輪播牆 -->
            <div class="banner__m">
                <div class="banner-img-wrap">
                    <img src="./img/banner/forum_banner02_s.jpg" alt="">
                </div>
            </div>

            <!--text__container------內容放這邊------------->
            <div class="text__container">
                <!-- 電腦版:左邊區塊 但手機版就是在上面 -->
                <div class="container__left">
                    <!-- 電腦版:大家都在討論 + hashtag -->
                    <div class="discussion-pc mt-30">
                        <div class="d-flex justify-between align-item-center">
                            <div class="d-flex align-item-center">
                                <div class="stick_desk"></div>
                                <h3>大家都在討論</h3>
                            </div>
                            <div class="custom-select select-m" data-page="1" data-which="forum">
                                <select name="forum_Nav_Dropdown" id="">
                                    <option value=""><a>最新</a></option>
                                    <option value=""><a>熱門</a></option>
                                    <option value=""><a>嘿嘿</a></option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-between align-item-end">
                            <div>
                                <ul class="hashtag d-flex flex-wrap mt-20">
                                    <!-- 這邊hashtag文字請不要打3跟4以外的字數 -->
                                    <?php foreach ($hashtagrows as $r) : ?>
                                        <li class="filter_<?= mb_strlen(mb_split("#", $r['f_hashtag_name'])[1], 'UTF-8') ?>w"><?= $r['f_hashtag_name'] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!-- 我要發文 -->
                            <div>
                                <a href="./forum_edit.php" class="woyaofa">
                                    <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.2459 7.50217C14.047 7.50217 13.8563 7.58117 13.7157 7.72178C13.5751 7.86239 13.4961 8.0531 13.4961 8.25196V12.7507C13.4961 12.9495 13.4171 13.1402 13.2765 13.2808C13.1359 13.4214 12.9452 13.5004 12.7463 13.5004H2.24935C2.05049 13.5004 1.85978 13.4214 1.71917 13.2808C1.57856 13.1402 1.49957 12.9495 1.49957 12.7507V2.2537C1.49957 2.05484 1.57856 1.86413 1.71917 1.72352C1.85978 1.58291 2.05049 1.50391 2.24935 1.50391H6.74804C6.9469 1.50391 7.13761 1.42492 7.27822 1.28431C7.41883 1.1437 7.49783 0.952985 7.49783 0.75413C7.49783 0.555275 7.41883 0.364565 7.27822 0.223954C7.13761 0.0833422 6.9469 0.00434749 6.74804 0.00434749H2.24935C1.65278 0.00434749 1.08065 0.241332 0.658819 0.663166C0.236984 1.085 0 1.65713 0 2.2537V12.7507C0 13.3472 0.236984 13.9193 0.658819 14.3412C1.08065 14.763 1.65278 15 2.24935 15H12.7463C13.3429 15 13.915 14.763 14.3368 14.3412C14.7587 13.9193 14.9957 13.3472 14.9957 12.7507V8.25196C14.9957 8.0531 14.9167 7.86239 14.776 7.72178C14.6354 7.58117 14.4447 7.50217 14.2459 7.50217ZM2.99913 8.07201V11.2511C2.99913 11.4499 3.07813 11.6407 3.21874 11.7813C3.35935 11.9219 3.55006 12.0009 3.74891 12.0009H6.92799C7.02667 12.0014 7.12449 11.9825 7.21584 11.9452C7.30719 11.9079 7.39028 11.8529 7.46034 11.7834L12.6488 6.58744L14.7782 4.50304C14.8485 4.43334 14.9043 4.35041 14.9423 4.25905C14.9804 4.16768 15 4.06968 15 3.9707C15 3.87172 14.9804 3.77372 14.9423 3.68235C14.9043 3.59098 14.8485 3.50805 14.7782 3.43835L11.5991 0.221784C11.5294 0.151508 11.4465 0.0957289 11.3551 0.0576635C11.2638 0.019598 11.1658 0 11.0668 0C10.9678 0 10.8698 0.019598 10.7784 0.0576635C10.6871 0.0957289 10.6041 0.151508 10.5344 0.221784L8.42006 2.34367L3.21657 7.53966C3.14708 7.60972 3.0921 7.69281 3.05479 7.78416C3.01747 7.87551 2.99856 7.97333 2.99913 8.07201V8.07201ZM11.0668 1.81132L13.1887 3.93321L12.124 4.9979L10.0021 2.87601L11.0668 1.81132ZM4.4987 8.37942L8.94491 3.93321L11.0668 6.05509L6.62058 10.5013H4.4987V8.37942Z" fill="#10FFA2" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- 手機版:大家都在討論 + hashtag -->
                    <div class="discussion-m">
                        <div class="d-flex justify-between align-item-center">
                            <div class="d-flex align-item-center">
                                <div class="stick_desk"></div>
                                <h3>大家都在討論</h3>
                            </div>
                            <div class="custom-select select-m">
                                <select name="" id="">
                                    <option value="最新">最新</option>
                                    <option value="熱門">熱門</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <ul class="hashtag d-flex flex-wrap mt-20">
                                <?php foreach ($hashtagrows as $r) : ?>
                                    <li class="filter_<?= mb_strlen(mb_split("#", $r['f_hashtag_name'])[1], 'UTF-8') ?>w"><?= $r['f_hashtag_name'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- 文章 -->
                    <div class="article mt-30">
                        <?php foreach ($forumrows as $f) : ?>
                            <div class="card-article d-flex flex-col justify-between align-item-center mt-20" data-forumid="<?= $f['forum_sid'] ?>">
                                <!-- 文章分類+作者+時間 -->
                                <div class="d-flex justify-between align-item-center w-100">
                                    <div class="d-flex">
                                        <!-- 文章分類 -->
                                        <a class="d-filter d-filter-d mr-20" style="<?php
                                                                                    $ottcolor = [
                                                                                        '2' => '#10FFA2',
                                                                                        '3' => '#1CD8FF',
                                                                                        '1' => '#FC6F51',
                                                                                    ];
                                                                                    if ($f['forum_type'] == '影劇') {
                                                                                        $color = $ottcolor['1'];
                                                                                    } else if ($f['forum_type'] == '電影') {
                                                                                        $color = $ottcolor['2'];
                                                                                    } else if ($f['forum_type'] == '動畫') {
                                                                                        $color = $ottcolor['3'];
                                                                                    };
                                                                                    echo 'color:' . $color . '; border: 1px solid' . $color;
                                                                                    ?>"><?= $f['forum_type'] ?></a>
                                        <!-- 文章作者 -->
                                        <div class="d-flex align-item-center">
                                            <div class="author-img-wrap mr-10">
                                                <a><img src="./img/member/<?= $f['member_avatar'] ?>" alt=""></a>
                                            </div>
                                            <a>
                                                <p><?= $f['member_nickname'] ?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- 發文時間 -->
                                    <div><span><?= $f['forum_uploadtime'] ?></span></div>
                                </div>
                                <div class="d-flex justify-between w-100">
                                    <!-- 文章內文(左邊) -->
                                    <div class="card-article-left">
                                        <div>
                                            <a>
                                                <h4 class="mt-10"><?= $f['forum_title'] ?></h4>
                                            </a>
                                            <p class="mt-10 multiple">
                                                <?= $f['forum_content_preview'] ?>
                                            </p>
                                            <br>
                                            <?php foreach ($tags as $t) {
                                                if ($t['f_has_forum_sid'] == $f['forum_sid']) {
                                                    echo '<a class="hashtag">' . $t['f_has_hastag_name'] . '&nbsp;</a>';
                                                }
                                            } ?>
                                            <!-- <a href="#" class="hashtag">#韓劇心得&nbsp;</a>
                                        <a href="#" class="hashtag">#二十五二十一&nbsp;</a>
                                        <a href="#" class="hashtag">#南柱赫我公&nbsp;</a> -->
                                        </div>

                                    </div>
                                    <!-- 文章圖片 -->
                                    <div class="card-article-right d-flex align-item-center">
                                        <div class="article-img-wrap d-flex align-item-center">
                                            <img src="./img/forum/<?= $f['forum_pic'] ?>" alt="">
                                        </div>
                                    </div>

                                </div>
                                <!-- 愛心 留言 收藏  -->
                                <div class="d-flex w-100 mt-20">
                                    <!-- 包svgㄉdiv -->
                                    <div class="d-flex align-item-center">
                                        <input type="button" hidden>
                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1427_26189)">
                                                <path d="M8.35907 1.43364L8.73934 1.84474L9.15044 1.43433C10.2981 0.315787 11.8877 -0.193294 13.4499 0.0667277C15.8103 0.460015 17.5403 2.50251 17.5403 4.89717V5.09587C17.5403 6.5176 16.9511 7.87766 15.9096 8.84718L9.71913 14.6266C9.46219 14.8664 9.12303 15 8.77017 15C8.41731 15 8.07815 14.8664 7.82121 14.6266L1.63036 8.84718C0.590274 7.87766 0 6.5176 0 5.09587V4.89717C0 2.50251 1.73074 0.460015 4.09046 0.0667277C5.62182 -0.193294 7.24224 0.315787 8.35907 1.43364C8.35907 1.43398 8.32824 1.43364 8.35907 1.43364ZM8.73934 4.17089L7.19771 2.5676C6.4543 1.85434 5.39914 1.51586 4.3611 1.68852C2.79378 1.94992 1.64441 3.30758 1.64441 4.89717V5.09587C1.64441 6.06196 2.04557 6.98694 2.75233 7.6447L8.77017 13.2631L14.7894 7.6447C15.4951 6.98694 15.8959 6.06196 15.8959 5.09587V4.89717C15.8959 3.30758 14.7449 1.94992 13.1792 1.68852C12.1412 1.51586 11.086 1.85434 10.3426 2.5676L8.73934 4.17089Z" fill="#ffffff80" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1427_26189">
                                                    <rect width="17.5403" height="15" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        </input>
                                        <span class="ml-10 mr-20"><?= $f['forum_like'] ?></span>
                                        <input type="button" hidden>
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.4999 5.24993C7.35156 5.24993 7.20656 5.29391 7.08322 5.37632C6.95989 5.45873 6.86376 5.57587 6.807 5.71291C6.75023 5.84995 6.73538 6.00075 6.76432 6.14623C6.79326 6.29172 6.86469 6.42535 6.96957 6.53024C7.07446 6.63513 7.2081 6.70656 7.35358 6.7355C7.49906 6.76443 7.64986 6.74958 7.78691 6.69282C7.92395 6.63605 8.04108 6.53992 8.12349 6.41659C8.2059 6.29325 8.24989 6.14825 8.24989 5.99992C8.24989 5.80101 8.17087 5.61024 8.03022 5.46959C7.88957 5.32894 7.69881 5.24993 7.4999 5.24993ZM12.7498 0H2.24997C1.65324 0 1.08095 0.23705 0.659001 0.659001C0.23705 1.08095 0 1.65324 0 2.24997V9.74986C0 10.3466 0.23705 10.9189 0.659001 11.3408C1.08095 11.7628 1.65324 11.9998 2.24997 11.9998H10.9423L13.7173 14.7823C13.7874 14.8518 13.8705 14.9068 13.9619 14.9441C14.0533 14.9814 14.1511 15.0004 14.2498 14.9998C14.3482 15.0023 14.4458 14.9818 14.5348 14.9398C14.6718 14.8835 14.789 14.788 14.8718 14.6652C14.9545 14.5424 14.9991 14.3979 14.9998 14.2498V2.24997C14.9998 1.65324 14.7627 1.08095 14.3408 0.659001C13.9188 0.23705 13.3466 0 12.7498 0ZM13.4998 12.4423L11.7823 10.7174C11.7123 10.6478 11.6291 10.5928 11.5378 10.5555C11.4464 10.5182 11.3485 10.4993 11.2498 10.4999H2.24997C2.05106 10.4999 1.8603 10.4208 1.71965 10.2802C1.579 10.1395 1.49998 9.94877 1.49998 9.74986V2.24997C1.49998 2.05106 1.579 1.8603 1.71965 1.71965C1.8603 1.579 2.05106 1.49998 2.24997 1.49998H12.7498C12.9487 1.49998 13.1395 1.579 13.2801 1.71965C13.4208 1.8603 13.4998 2.05106 13.4998 2.24997V12.4423ZM4.49994 5.24993C4.3516 5.24993 4.2066 5.29391 4.08327 5.37632C3.95993 5.45873 3.8638 5.57587 3.80704 5.71291C3.75027 5.84995 3.73542 6.00075 3.76436 6.14623C3.7933 6.29172 3.86473 6.42535 3.96962 6.53024C4.0745 6.63513 4.20814 6.70656 4.35362 6.7355C4.49911 6.76443 4.6499 6.74958 4.78695 6.69282C4.92399 6.63605 5.04112 6.53992 5.12353 6.41659C5.20594 6.29325 5.24993 6.14825 5.24993 5.99992C5.24993 5.80101 5.17091 5.61024 5.03026 5.46959C4.88961 5.32894 4.69885 5.24993 4.49994 5.24993V5.24993ZM10.4999 5.24993C10.3515 5.24993 10.2065 5.29391 10.0832 5.37632C9.95985 5.45873 9.86372 5.57587 9.80695 5.71291C9.75019 5.84995 9.73534 6.00075 9.76428 6.14623C9.79321 6.29172 9.86464 6.42535 9.96953 6.53024C10.0744 6.63513 10.2081 6.70656 10.3535 6.7355C10.499 6.76443 10.6498 6.74958 10.7869 6.69282C10.9239 6.63605 11.041 6.53992 11.1234 6.41659C11.2059 6.29325 11.2498 6.14825 11.2498 5.99992C11.2498 5.80101 11.1708 5.61024 11.0302 5.46959C10.8895 5.32894 10.6988 5.24993 10.4999 5.24993Z" fill="#ffffff80" />
                                        </svg>
                                        </input>
                                        <span class="ml-10 mr-20"><?php 
                                        $commentids = 0;
                                        foreach ($comments as $c) {
                                                if ($c['f_comment_forum_sid'] == $f['forum_sid']) {
                                                    $commentids++;
                                                }
                                            }; echo $commentids;?></span>
                                        <input type="button" hidden>
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.97267 1.00018L14.0048 7.03233C14.6651 7.69257 14.6651 8.77295 14.0048 9.43319L9.43319 14.0048C8.77295 14.6651 7.69257 14.6651 7.03233 14.0048L1.00018 7.97267C0.680064 7.65255 0.5 7.2224 0.5 6.77224V1.65041C0.5 1.01018 1.01018 0.5 1.65041 0.5H6.77224C7.2224 0.5 7.65255 0.680064 7.97267 1.00018Z" stroke="#ffffff80" />
                                            <path d="M3.34 4.48859C3.94199 4.48859 4.43 4.00058 4.43 3.39859C4.43 2.7966 3.94199 2.30859 3.34 2.30859C2.73801 2.30859 2.25 2.7966 2.25 3.39859C2.25 4.00058 2.73801 4.48859 3.34 4.48859Z" fill="#ffffff80" />
                                        </svg>
                                        </input>
                                        <span class="ml-10"><?= $f['forum_like'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- 頁數 -->
                    <div class="page d-flex justify-center align-item-center">
                        <h3>.&nbsp;.&nbsp;.&nbsp;.&nbsp;.&nbsp;.</h3>
                    </div>
                </div>
                <!-- 電腦版:右邊區塊 但手機板會長在下面 -->
                <div class="container__right">
                    <!-- 熱門文章 -->
                    <div class="mt-30">
                        <div class="d-flex align-item-center">
                            <div class="stick_desk"></div>
                            <h3>熱門文章</h3>
                        </div>
                        <!-- TODO: 這邊要做輪播牆 -->
                        <div class="hot-article mt-20">
                            <div class="hot-article">
                                <div class="d-flex justify-center">
                                    <div class="article-img-wrap">

                                        <img src="./img/center/hot.jpg" alt="">

                                    </div>
                                </div>
                                <div class="d-flex align-item-center mt-10 single">
                                    <div class="d-filter d-filter-d mr-10">影劇</div>
                                    <a href="#">
                                        <h4 class="single">社內相親副線疑似戀愛中？金旻奎嘴角藏不住笑容</h4>
                                    </a>
                                </div>
                                <p class="multiple mt-10">
                                    韓劇《社內相親》雖然已經完結，但主角們持續受到關注，除了安孝燮與金世正之外，「副線cp」金旻奎、薛仁雅知名度也同步上升，金旻奎預計五月中旬會在日本舉行粉絲見面會，在這之前他參與綜藝《全知干預視角》的錄製，剛現身不久就被藝人們關心：「和薛仁雅真的沒有交往嗎？」
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 熱門創作者 -->
                    <!-- 有輪播牆 搞死偶ㄅ -->
                    <div class="mt-20">
                        <div class="d-flex align-item-center">
                            <div class="stick_desk"></div>
                            <h3>熱門創作者排行</h3>
                        </div>
                        <div class="hot-creator mt-20 ml-20">
                            <ul class="hot-creator-train d-flex">
                                <a>
                                    <li class="train-list d-flex align-item-center">
                                        <div class="member-img-wrap mr-20">

                                            <img src="./img/center/1.jpg" alt="">

                                        </div>
                                        <div class="creator">
                                            <h4>翔子學妹</h4>
                                            <span>136篇文章</span><br>
                                            <span>學妹の日劇片單</span>
                                        </div>
                                    </li>
                                </a>
                                <a>
                                    <li class="train-list d-flex align-item-center">
                                        <div class="member-img-wrap mr-20">

                                            <img src="./img/center/8.jpg" alt="">

                                        </div>
                                        <div class="creator">
                                            <h4>瀚瀚子與鳥鳥</h4>
                                            <span>72篇文章</span><br>
                                            <span>信義區鳥鳥日常</span>
                                        </div>
                                    </li>
                                </a>
                                <a>
                                    <li class="train-list d-flex align-item-center">
                                        <div class="member-img-wrap mr-20">

                                            <img src="./img/center/tinytall.jpg" alt="">

                                        </div>
                                        <div class="creator">
                                            <h4>胎尼頭</h4>
                                            <span>59篇文章</span><br>
                                            <span>韓劇迷妹宣虎控</span>
                                        </div>
                                    </li>
                                </a>
                                <a>
                                    <li class="train-list d-flex align-item-center">
                                        <div class="member-img-wrap mr-20">

                                            <img src="./img/center/dino.jpg" alt="">

                                        </div>
                                        <div class="creator">
                                            <h4>切版王笠鴿</h4>
                                            <span>28篇文章</span><br>
                                            <span>週五微醺電影夜</span>
                                        </div>
                                    </li>
                                </a>
                                <a>
                                    <li class="train-list d-flex align-item-center">
                                        <div class="member-img-wrap mr-20">

                                            <img src="./img/center/wife.jpg" alt="">

                                        </div>
                                        <div class="creator">
                                            <h4>桌布是結衣</h4>
                                            <span>16篇文章</span><br>
                                            <span>黑橘遊戲不要玩</span>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                            <!-- 輪播牆箭頭 -->
                            <div class="arrow-right">
                                <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1427_26206)">
                                        <path d="M1.2498 15.001C0.929961 15.001 0.609961 14.8789 0.366211 14.6348C-0.12207 14.1465 -0.12207 13.3555 0.366211 12.8672L5.73418 7.50097L0.366211 2.13379C-0.12207 1.64551 -0.12207 0.854492 0.366211 0.366211C0.854492 -0.12207 1.64551 -0.12207 2.13379 0.366211L8.38379 6.61621C8.87207 7.10449 8.87207 7.8955 8.38379 8.38379L2.13379 14.6338C1.88965 14.8799 1.56973 15.001 1.2498 15.001Z" fill="#10FFA2" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1427_26206">
                                            <rect width="8.75" height="15.001" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>
                        </div>
                    </div>
                    <!-- 許願池 -->
                    <div class="wish mt-20">
                        <div class="d-flex align-item-center ">
                            <div class="stick_desk"></div>
                            <h3>就差你一票!</h3>
                        </div>
                        <div>
                            <div class="wish-img-wrap mt-20">
                                <img src="./img/forum/forum_img03.jpg" alt="">
                            </div>
                            <div class="d-flex justify-between align-item-center">
                                <div class="d-flex align-item-center mt-10">
                                    <div class="d-filter d-filter-a mr-10">動漫</div>
                                    <a href="#">
                                        <h4>天國之吻</h4>
                                    </a>
                                </div>
                                <div><span>2005</span></div>
                            </div>
                            <div class="progress-bar-1 mt-10 mb-10"></div>
                            <div class="d-flex justify-end">
                                <span>
                                    已有1人參與許願
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="wish-img-wrap mt-20">
                                <img src="./img/forum/forum_img01.jpg" alt="">
                            </div>
                            <div class="d-flex justify-between align-item-center">
                                <div class="d-flex align-item-center mt-10">
                                    <div class="d-filter d-filter-a mr-10">動漫</div>
                                    <a href="#">
                                        <h4>Keroro</h4>
                                    </a>
                                </div>
                                <div><span>2003</span></div>
                            </div>
                            <div class="progress-bar-4 mt-10 mb-10"></div>
                            <div class="d-flex justify-end">
                                <span>
                                    已有214人參與許願
                                </span>
                            </div>
                        </div>
                        <!-- <div>
                            <div class="wish-img-wrap mt-20">
                                <img src="./img/forum/forum_img04.jpg" alt="">
                            </div>
                            <div class="d-flex justify-between align-item-center">
                                <div class="d-flex align-item-center mt-10">
                                    <div class="d-filter d-filter-m mr-10">電影</div>
                                    <a href="#">
                                        <h4>末日之戰 Z</h4>
                                    </a>
                                </div>
                                <div><span>2013</span></div>
                            </div>
                            <div class="progress-bar-2 mt-10 mb-10"></div>
                            <div class="d-flex justify-end">
                                <span>
                                    已有1345人參與許願
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="wish-img-wrap mt-20">
                                <img src="./img/forum/forum_img02.jpg" alt="">
                            </div>
                            <div class="d-flex justify-between align-item-center">
                                <div class="d-flex align-item-center mt-10">
                                    <div class="d-filter d-filter-m mr-10">電影</div>
                                    <a href="#">
                                        <h4>NANA</h4>
                                    </a>
                                </div>
                                <div><span>2005</span></div>
                            </div>
                            <div class="progress-bar-3 mt-10 mb-10"></div>
                            <div class="d-flex justify-end">
                                <span>
                                    已有457人參與許願
                                </span>
                            </div>
                        </div> -->
                    </div>
 
                    <!-- 商品 -->
                    <div class="d-flex align-item-center ">
                            <div class="stick_desk"></div>
                            <h3>商城周邊</h3>
                        </div>
                    <div class="products store__main mt_20">
                        <div class="container_prodcts">
                            <div class="row_products">
                                <div class="image__card__12">
                                    <div class="carousel__images__box__12">
                                        <img class="carousel__images__12" src="./img/mall/gst/gst11.jpg" alt="">
                                        <div class="image__card__text__12">
                                            <div class="movie__name__12">
                                                <p class="Product__id">
                                                    鬼怪娃娃經典系列組
                                                </p>
                                            </div>
                                            <div class="movie__icons__12">
                                                <div class="movie__icon__box__12">
                                                    <p class="Price">
                                                        899

                                                    </p>
                                                    <p class="ntd">
                                                        NTD
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="image__card__12">
                                    <div class="carousel__images__box__12">
                                        <img class="carousel__images__12" src="./img/mall/gst/gst02.jpg" alt="">
                                        <div class="image__card__text__12">
                                            <div class="movie__name__12">
                                                <p class="Product__id">
                                                    韓劇鬼怪PVC夾鍊袋
                                                </p>
                                            </div>
                                            <div class="movie__icons__12">
                                                <div class="movie__icon__box__12">
                                                    <p class="Price">
                                                        190
                                                    </p>
                                                    <p class="ntd">
                                                        NTD
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include __DIR__ . '/parts/movwe_footer.php' ?>
        </div>

        <script src="./js/forum.js"></script>
        <script src="./js/slider.js"></script>
        <script src="./js/Nav.js"></script>
        <script src="./js/dropdown_customstyle.js"></script>


        <script>
            var slider = new Slider("slider", {
                play_icon: '<i class="fas fa-play"></i>',
                pause_icon: '<i class="far fa-pause-circle"></i>',
                prev_icon: '<i class="fas fa-angle-left"></i>',
                next_icon: '<i class="fas fa-angle-right"></i>'
            });

            $('.card-article').on('click', function() {
                const dataid = $(this).attr('data-forumid');
                console.log('dataid', dataid);
                location.href = './forum_article.php?art=' + dataid;
            });
        </script>

</body>

</html>