<?php

require './parts/movwe_connect_db.php';
$pageName = 'point_mycoupon';
$title = 'MOVWE-我的優惠券';

// 拿到這個會員手裡的優惠券
$mbidentity = $_SESSION['admin']['member_sid'];
$getmycp = 'SELECT * FROM `member_has_coupon` FULL JOIN `coupon` ON `mhc_coupon_sid` = `coupon_sid` WHERE `mhc_member_sid` =?';
$mystmt = $pdo->prepare($getmycp);
$mystmt->execute([$mbidentity]);
$myrow = $mystmt->fetchAll();
$myrowlenght = count($myrow);
?>

<?php include __DIR__ . '/parts/movwe_head.php' ?>

<link rel="stylesheet" href="./css/point_nav.css">
<link rel="stylesheet" href="./css/point_mycoupon.css">
<link rel="stylesheet" href="./css/dropdown_customstyle.css">
</head>

<body>
    <!----------nav_top-------------->
    <?php include __DIR__. '/parts/movwe_nav_fin.php' ?>
    <div class="layout">
        <!----------nav_left-------------->
        <div class="left_div"></div>

        <!--------------------------------------------------------------------------->
        <div class="container">
            <!-- 點數專區navbar TODO: 需要判斷登入和抓資料和判斷頁面 -->
            <!-- 點數專區navbar 定義大小 -->
            <div class="point-section_nav">
                <!-- 點數專區navbar 排版 -->
                <div class="point-section_nav-container">
                    <!-- 點數專區navbar 下拉式選單 切換當前頁面-->
                    <div class="custom-select" style="width: 160px;" data-page="3" data-which="point">
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
            <!-- 商城用 一般優惠券 -->
            <div class="point-mycp-section_row-one">
                <div class="point-mycp-section_title">
                    <div class="point-mycp-section_title-left">
                        <img src="./img/icons/stick-s.svg" alt="">
                        <h2>我的優惠券</h2>
                    </div>
                    <div class="point-mycp-section_title-right">
                        <p>總共 (<?php echo $myrowlenght ?>)張</p>
                    </div>
                </div>
                <div class="point-mycp-section_card-roll-normal-wrap">
                    <div class="point-mycp-section_card-roll-normal">
                        <?php foreach ($myrow as $myrowinfo) : ?>
                            <div class="point-mycp-section_coupon-normal" data-couponid="<?= $myrowinfo['coupon_sid'] ?>" data-mhcsid="<?= $myrowinfo['mhc_sid'] ?>" data-mbsid="<?= $myrowinfo['mhc_member_sid'] ?>">
                                <div class="point-mycp-section_coupon-normal-content-wrap">
                                    <div class="point-mycp-section_coupon-normal-img">
                                        <img src="./img/other/<?= $myrowinfo['coupon_picture']; ?>" alt="">
                                    </div>
                                    <div class="point-mycp-section_coupon-normal-content">
                                        <div class="point-mycp-section_coupon-normal-content-info">
                                            <p class="point-mycp-section_coupon-normal-content-name"><?= $myrowinfo['coupon_name']; ?></p>
                                            <div class="point-mycp-section_coupon-normal-content-type">
                                                <img src="./img/logo/<?= $myrowinfo['coupon_brand_img']; ?>" alt="" style="opacity: .7;">
                                                <p><?= $myrowinfo['coupon_brand']; ?></p>
                                            </div>
                                        </div>
                                        <div class="point-mycp-section_coupon-normal-content-quantity">
                                            <!-- <p><span>30</span> / 100張</p> -->
                                            <!-- <div>
                                                <img src="./img/other/coin.svg" alt="">
                                                <p><span></span></p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="point-mycp-section_light-box" id="pointMycpSectionLightBox" style="display: none;">
                <div class="point-section_coupon-detail-card">
                    <div class="point-section_coupon-detail-card-title">
                        <div class="point-section_coupon-detail-card-title-left">
                            <h2>Netflix 3天試用兌換券</h2>
                            <div>
                                <img src="./img/logo/netflix_s.svg" alt="">
                                <p>OTT平台優惠</p>
                            </div>
                        </div>
                        <div class="point-section_coupon-detail-card-title-right">
                            <div>
                                <img src="./img/other/coin.svg" alt="">
                            </div>
                            <div>
                                <p>目前點數</p>
                                <p><span>2688</span> pt</p>
                            </div>
                        </div>
                    </div>
                    <div class="point-section_coupon-detail-card-code" style="display: none;">
                        <button class="point-section_coupon-detail-card-code-wrap">
                            <h2>MHA33RTY679</h2>
                        </button>
                    </div>
                    <div class="point-section_coupon-detail-card-coupunimg">
                        <img src="./img/other/discount_10.svg" alt="">
                    </div>
                    <div class="point-section_coupon-detail-card-notice">
                        <p>兌換後可將序號於註冊netflix帳號時使用，可獲得3天的免費試用期。</p>
                        <p>兌換後不可退貨。<br>
                            一個帳號僅能兌換一次。<br>
                            限量優惠，換完為止。</p>
                    </div>
                </div>
            </div>

            <?php include __DIR__. '/parts/movwe_footer.php' ?>
        </div>
    </div>

    <script src="./js/Nav.js"></script>
    <script src="./js/dropdown_customstyle.js"></script>
    <script>
        (() => {
            // 點擊卡片跑出光箱 顯示卡片詳細
            const mcCoupon = document.querySelectorAll('.point-mycp-section_coupon-normal');
            const mcCouponDetail = document.querySelector('.point-mycp-section_light-box');
            let generatedcpcode = '';
            let restpoints = '';
            let nowmbsid = '';
            let nowcpsid = '';

            function getCouponLightboxData() {
                const domid = this.getAttribute('data-couponid');
                const cpid = this.getAttribute('data-mhcsid');
                const cpmbid = this.getAttribute('data-mbsid');
                let domObj;
                console.log('link success - click', domid);
                if (<?php echo $_SESSION['admin']['member_sid']; ?> == cpmbid) {
                    $.post('point_mycoupon_detail_api.php', {
                        domid,
                        cpid,
                        cpmbid,
                    }, function(data) {
                        console.log('pass');
                        $(mcCouponDetail).css('display', 'flex');
                        $('.footer__container').css('display', 'none');
                        $('body').css({
                            'height': '100vh',
                            'overflow': 'hidden'
                        });
                        $('.point-section_coupon-detail-card-title-right > div:nth-child(2) > p:nth-child(2) > span').text(<?php echo $_SESSION['admin']['member_points'] ?>);
                        $('.point-section_coupon-detail-card-title-left > h2').text(data.mycpname);
                        $('.point-section_coupon-detail-card-title-left > div > p').text(data.mycpbrand);
                        $('.point-section_coupon-detail-card-title-left > div > img').attr('src', `./img/logo/${data.mycpbrandimg}`);
                        $('.point-section_coupon-detail-card-code h2').text(data.mycpcode);
                        $('.point-section_coupon-detail-card-coupunimg > img').attr('src', `./img/other/${data.mycppicture}`);
                        document.querySelector('.point-section_coupon-detail-card-notice').innerHTML = data.mycpnotice;
                        $('.point-section_coupon-detail-card-title, .point-section_coupon-detail-card-title-left, .point-section_coupon-detail-card-title-right, .point-section_coupon-detail-card-coupunimg').css('display', 'flex');
                        $(' .point-section_coupon-detail-card-notice, .point-section_coupon-detail-card-code').css('display', 'block');
                        $('.point-section_coupon-detail-card-changesuccess').css('display', 'none');
                    }, 'json');
                } else {
                    console.log('會員id出錯，資料失敗');
                };
            };

            function closeCouponLightbox(eve) {
                console.log('hi');
                if (eve.target.id == "pointMycpSectionLightBox") {
                    $('#pointMycpSectionLightBox').css('display', 'none');
                    $('.footer__container').css('display', 'block');
                    $('body').css({
                        'overflow': 'auto',
                        'height': 'auto',
                    });
                }; //點選的如果不是選單，選單隱藏。如果是選單，選單顯現
            };

            mcCoupon.forEach(element => {
                element.addEventListener('click', getCouponLightboxData);
            });
            document.addEventListener('click', closeCouponLightbox);
        })();
    </script>
</body>