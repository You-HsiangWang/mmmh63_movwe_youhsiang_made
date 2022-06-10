<?php

require './parts/movwe_connect_db.php';
$pageName = 'point_index';
$title = 'MOVWE-如何累積Movwe點數';

?>

<?php include __DIR__ . '/parts/movwe_head.php' ?>
<link rel="stylesheet" href="./css/point_nav.css">
<link rel="stylesheet" href="./css/point_index.css">
<link rel="stylesheet" href="./css/dropdown_customstyle.css">
</head>

<body>

    <!----------nav_top-------------->
    <?php include __DIR__ . '/parts/movwe_nav_fin.php' ?>
    <div class="layout">
        <?php include __DIR__ . '/parts/movwe_nav_leftdiv.php' ?>

        <!--------------------------------------------------------------------------->
        <div class="container">
            <!-- 點數專區navbar TODO: 需要判斷登入和抓資料和判斷頁面 -->
            <!-- 點數專區navbar 定義大小 -->
            <div class="point-section_nav">
                <!-- 點數專區navbar 排版 -->
                <div class="point-section_nav-container">
                    <!-- 點數專區navbar 下拉式選單 切換當前頁面-->
                    <div class="custom-select" style="width: 160px;" data-page="1" data-which="point">
                        <select name="pointSection_Nav_Dropdown" id="" class="point-section_nav-dropdown">
                            <option value="">
                                <a href="">如何累積MOVWE點數</a>
                            </option>
                            <option value="">
                                <a href="">兌換優惠券</a>
                            </option>
                            <option value="">
                                <a href="">我的優惠券</a>
                            </option>
                        </select>
                    </div>
                    <!-- 點數專區navbar 顯示目前點數 判斷是否登入 抓取資料庫中的點數-->
                    <div class="point-section_nav-showpoints">
                        <img src="./img/other/coin.svg" alt="" class="point-section_nav-showpoints-img">
                        <div class="point-section_nav-showpoints-container">
                            <p class="point-section_nav-showpoints-points">
                                目前點數
                            </p>
                            <p class="point-section_nav-showpoints-points">
                                <!-- 這邊要抓資料庫中的點數 -->
                                <span id=""><?php if (isset($_SESSION['admin']['member_loginstatus'])) {
                                                echo $_SESSION['admin']['member_loginstatus'] == 1 ? $_SESSION['admin']['member_points'] . ' pt' : '尚未登入';
                                            } else {
                                                echo '尚未登入';
                                            } ?></span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="point-section_banner">
                <div class="point-section_banner_container">
                    <img src="./img/banner/point_banner.jpg" alt="" class="p_web_d-none">
                    <img src="./img/banner/point_banner_s.jpg" alt="" class="p_phone_d-none">
                    <!-- <h1>用MOVWE<br>換Movie</h1> -->
                </div>
            </div>
            <div class="point-section_info_one p_slide-in p_silde-l">
                <div class="point-section_info_title">
                    <img src="./img/icons/stick-s.svg" alt="">
                    <h2>什麼是MOVWE點數？</h2>
                </div>
                <div class="point-section_info_wrap">
                    <div class="point-section_info_text">
                        <p>
                            MOVWE點數是提供會員使用MOVWE的服務時所獲得的行動點數。可以在兌換區兌換<span>OTT折價券</span>，<span>商品折扣</span>等優惠！
                        </p>
                    </div>
                    <div class="point-section_info_img">
                        <img src="./img/banner/mell_point.jpg" alt="">
                    </div>
                </div>
                <!-- <div class="point-section_animate_roll">
                    <div class="point-section_animate_roll_train rollone">
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/netflix.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap"><img src="./img/other/discount_01.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/kktv.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_02.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/IQiyi.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_03.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/friday.svg" alt="">
                        </div>
                    </div>
                    <div class="point-section_animate_roll_train rolltwo">
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/netflix.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap"><img src="./img/other/discount_01.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/kktv.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_02.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/IQiyi.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_03.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/friday.svg" alt="">
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="point-section-animate-wrap">
                <div class="point-section_animate_roll">
                    <div class="point-section_animate_roll_train rollone">
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/netflix.svg" alt="" style="width: 200px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap"><img src="./img/other/discount_200.png" alt="" style="width: 250px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/kktv.svg" alt="" style="width: 200px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_7days.png" alt="" style="width: 250px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/IQiyi.svg" alt="" style="width: 200px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_50.png" alt="" style="width: 250px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/friday.svg" alt="" style="width: 200px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_100.png" alt="" style="width: 250px;">
                        </div>
                    </div>
                    <div class="point-section_animate_roll_train rolltwo">
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/netflix.svg" alt="" style="width: 200px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap"><img src="./img/other/discount_4days.png" alt="" style="width: 250px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/kktv.svg" alt="" style="width: 200px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_250.png" alt="" style="width: 250px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/IQiyi.svg" alt="" style="width: 200px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_2hr.png" alt="" style="width: 250px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/friday.svg" alt="" style="width: 200px;">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_150.png" alt="" style="width: 250px;">
                        </div>
                    </div>
                </div>
                <!-- 這邊可以加消失出現的動畫 -->
                <div class="point-section_info_two p_slide-in p_silde-r">
                    <div class="point-section_info_title">
                        <img src="./img/icons/stick-s.svg" alt="">
                        <h2>MOVWE點數可以換什麼東西？</h2>
                    </div>
                    <div class="point-section_info_cardwrap">
                        <div class="point-section_info_card">
                            <div class="point-section_info_card_imgwrap">
                                <div class="point-section_info_card_imganimation">
                                    <img src="./img/other/discount_50.png" alt="">
                                </div>
                            </div>
                            <p>
                                商城折價券
                            </p>
                        </div>
                        <div class="point-section_info_card">
                            <div class="point-section_info_card_imgwrap">
                                <div class="point-section_info_card_imganimation">
                                    <img src="./img/other/discount_2hr.png" alt="">
                                </div>

                            </div>
                            <p>
                                OTT平台優惠
                            </p>
                        </div>
                    </div>
                    <!-- <div class="point-section_animate_roll_fullsize">
                    <div class="point-section_animate_roll_train rollone">
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/netflix.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap"><img src="./img/other/discount_01.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/kktv.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_02.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/IQiyi.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_03.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/friday.svg" alt="">
                        </div>
                    </div>
                    <div class="point-section_animate_roll_train rolltwo">
                        <div class="point-section_animate_roll_train_imgwrap"><img src="./img/other/discount_01.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/netflix.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_02.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/kktv.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/other/discount_03.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/IQiyi.svg" alt="">
                        </div>
                        <div class="point-section_animate_roll_train_imgwrap">
                            <img src="./img/logo/friday.svg" alt="">
                        </div>
                    </div>
                </div> -->
                </div>
            </div>

            <!--text__container------內容放這邊------------->
            <div class="text__container point_index_width-60_destkoponly">
                <div class="point-section_info_three">
                    <div class="point-section_info_title">
                        <img src="./img/icons/stick-s.svg" alt="">
                        <h2>如何獲得MOVWE點數？</h2>
                    </div>
                    <!-- TODO: 這邊可以夾輪播牆 -->
                    <div class="point-section_info_numberpicphone">
                        <img src="./img/banner/point.png" alt="">
                    </div>
                    <div class="point-section_info_numbercardwrap">
                        <div class="point-section_info_numbercard_fullsize p_slide-in p_silde-l">
                            <div class="point-section_info_numbercard">
                                <div class="point-section_info_numbercard_numwrap">

                                    <img src="./img/other/num_01.svg" alt="">

                                </div>
                                <div class="point-section_info_card_pwrap">
                                    <h2>會員專屬集點活動</h2>
                                    <p>會員透過Movwe連結觀看影片，即可領取50點! 點數可用來兌換訂閱影音平台優惠，快來加入我們!</p>
                                </div>
                            </div>
                            <div class="point-section_info_numberpic">
                                <img src="./img/banner/point.png" alt="">
                            </div>
                        </div>
                        <div class="point-section_info_numbercard_fullsize p_slide-in p_silde-r">
                            <div class="point-section_info_numbercard">
                                <div class="point-section_info_numbercard_numwrap">

                                    <img src="./img/other/num_02.svg" alt="">

                                </div>
                                <div class="point-section_info_card_pwrap">
                                    <h2>與朋友分享專屬連結
                                    </h2>
                                    <p>朋友透過您的專屬連結註冊Movwe會員，即可獲得100點we point! 同時您也會收到100點we points回饋唷!
                                    </p>
                                </div>
                            </div>
                            <div class="point-section_info_numberpic">
                                <img src="./img/banner/share.png" alt="">
                            </div>
                        </div>
                        <div class="point-section_info_numbercard_fullsize p_slide-in p_silde-l">
                            <div class="point-section_info_numbercard">
                                <div class="point-section_info_numbercard_numwrap">

                                    <img src="./img/other/num_03.svg" alt="">

                                </div>
                                <div class="point-section_info_card_pwrap">
                                    <h2>至商城購買周邊商品</h2>
                                    <p>會員在Movwe商城購買周邊，每500塊即可獲得500we points! we point點數可用來兌換訂閱影音平台優惠，快來加入我們!</p>
                                </div>
                            </div>
                            <div class="point-section_info_numberpic">
                                <img src="./img/banner/mall_banner_s.jpg" alt="" style="border-radius: 10px">
                            </div>
                        </div>
                        <div class="point-section_info_numbercard_fullsize p_slide-in p_silde-r">
                            <div class="point-section_info_numbercard">
                                <div class="point-section_info_numbercard_numwrap">

                                    <img src="./img/other/num_04.svg" alt="">

                                </div>
                                <div class="point-section_info_card_pwrap">
                                    <h2>在討論區發文</h2>
                                    <p>會員在討論區發的前5篇文章每篇可以獲得30we points! 之後成為熱門作者可獲得大量we points!</p>
                                </div>
                            </div>
                            <div class="point-section_info_numberpic">
                                <img src="./img/banner/forum_banner01_s.jpg" alt="" style="border-radius: 10px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->
            <?php include __DIR__. '/parts/movwe_footer.php' ?>
        </div>
    </div>

    <script src="./js/Nav.js"></script>
    <script src="./js/dropdown_customstyle.js"></script>
    <script src="./js/point_index.js"></script>

</body>

</html>