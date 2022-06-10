<?php

require './parts/movwe_connect_db.php';
$pageName = 'point_exchange';
$title = 'MOVWE-優惠券兌換';

// 拿到限量的優惠券
$getLimit = 'SELECT * FROM `coupon` WHERE `coupon_type` = 1';
$stmt = $pdo->query($getLimit);
$row = $stmt->fetchAll();
// 拿到一般的影劇平台優惠券
$getOttN = 'SELECT * FROM `coupon` WHERE `coupon_type` = 2';
$stmtOtt = $pdo->query($getOttN);
$rowOtt = $stmtOtt->fetchAll();
// 拿到商城折價券
$getShop = 'SELECT * FROM `coupon` WHERE `coupon_type` = 3';
$stmtShop = $pdo->query($getShop);
$rowShop = $stmtShop->fetchAll();

?>

<?php include __DIR__ . '/parts/movwe_head.php' ?>
<link rel="stylesheet" href="./css/point_nav.css">
<link rel="stylesheet" href="./css/point_coupon_exchange.css">
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
                    <div class="custom-select" style="width: 160px;" data-page="2" data-which="point">
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
            <!-- 限量優惠券 -->
            <div class="point-ce-section_row-one">
                <!-- 標題 -->
                <div class="point-cs-section_title">
                    <div class="point-cs-section_title-left">
                        <img src="./img/icons/stick-s.svg" alt="">
                        <h2>限量優惠券</h2>
                    </div>
                </div>
                <!-- 限量優惠券roll區 -->
                <div class="point-ce-section_card-roll-limited-wrap">
                    <div class="point-ce-section_card-roll-limited">
                        <!-- 這邊動態產生 -->
                        <?php foreach ($row as $rowinfo) : ?>
                            <div class="point-ce-section_coupon-limited point-ce-section_coupon" data-couponid="<?= $rowinfo['coupon_sid'] ?>">
                                <div class="point-ce-section_coupon-limited-bgi">
                                    <img src="./img/other/discount_card.png" alt="">
                                    <img src="./img/other/discount_tag.png" alt="">
                                    <img src="./img/other/discount_string.png" alt="">
                                    <!-- <img src="./img/other/points_less.png" alt="" id="cpCantChange" style="width: 100px;"> -->
                                    <div class="point-ce-section_coupon-limited-content-wrap">
                                        <div class="point-ce-section_coupon-limited-img">
                                            <img src="./img/other/<?= $rowinfo['coupon_picture'] ?>" alt="">
                                            <img src="./img/other/points_less.png" alt="" id="cpCantChange">
                                        </div>
                                        <div class="point-ce-section_coupon-limited-content">
                                            <div class="point-ce-section_coupon-limited-content-info">
                                                <p class="point-ce-section_coupon-limited-content-name"><?= $rowinfo['coupon_name'] ?></p>
                                                <div class="point-ce-section_coupon-limited-content-type">
                                                    <img src="./img/logo/<?= $rowinfo['coupon_brand_img'] ?>" alt="" style="opacity: .7;">
                                                    <p><?= $rowinfo['coupon_brand'] ?></p>
                                                </div>
                                            </div>
                                            <div class="point-ce-section_coupon-limited-content-quantity">
                                                <p><span><?= $rowinfo['coupon_rest'] ?></span> / <?= $rowinfo['coupon_total'] ?></p>
                                                <div>
                                                    <img src="./img/other/coin.svg" alt="">
                                                    <p><span><?= $rowinfo['coupon_price'] ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- TODO: 判斷到第幾頁 拿不同的a id 往右滑的箭頭 連a連結 id -->
                <div class="point-ce-section_card-roll-limited-arrow">
                    <a><i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <!-- OTT 一般優惠券 -->
            <div class="point-ce-section_row-two">
                <div class="point-cs-section_title">
                    <div class="point-cs-section_title-left">
                        <img src="./img/icons/stick-s.svg" alt="">
                        <h2>影音串流平台優惠券</h2>
                    </div>
                    <div class="point-cs-section_title-right">
                        <button href="">
                            <p>查看全部 (14)</p>
                            <img src="./img/icons/arrow.svg" alt="">
                        </button>
                    </div>
                </div>
                <div class="point-ce-section_card-roll-normal-wrap">
                    <div class="point-ce-section_card-roll-normal">
                        <?php foreach ($rowOtt as $rowOttinfo) : ?>
                            <div class="point-ce-section_coupon-normal point-ce-section_coupon" data-couponid="<?= $rowOttinfo['coupon_sid'] ?>">
                                <div class="point-ce-section_coupon-normal-content-wrap">
                                    <div class="point-ce-section_coupon-normal-img">
                                        <img src="./img/other/<?= $rowOttinfo['coupon_picture'] ?>" alt="">
                                        <img src="./img/other/points_less.png" id="cpCantChange" alt="">
                                    </div>
                                    <div class="point-ce-section_coupon-normal-content">
                                        <div class="point-ce-section_coupon-normal-content-info">
                                            <p class="point-ce-section_coupon-normal-content-name"><?= $rowOttinfo['coupon_name'] ?></p>
                                            <div class="point-ce-section_coupon-normal-content-type">
                                                <img src="./img/logo/<?= $rowOttinfo['coupon_brand_img'] ?>" alt="" style="opacity: .7;">
                                                <p><?= $rowOttinfo['coupon_brand'] ?></p>
                                            </div>
                                        </div>
                                        <div class="point-ce-section_coupon-normal-content-quantity">
                                            <!-- <p><span>30</span> / 100張</p> -->
                                            <div>
                                                <img src="./img/other/coin.svg" alt="">
                                                <p><span><?= $rowOttinfo['coupon_price'] ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
                <div class="point-ce-section_card-roll-normal-arrow">
                    <!-- #coupon-normal-ott_3 -->
                    <a><i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <!-- 商城用 一般優惠券 -->
            <div class="point-ce-section_row-three">
                <div class="point-cs-section_title">
                    <div class="point-cs-section_title-left">
                        <img src="./img/icons/stick-s.svg" alt="">
                        <h2>MOVEWE商城折價券</h2>
                    </div>
                    <div class="point-cs-section_title-right">
                        <button href="">
                            <p>查看全部 (14)</p>
                            <img src="./img/icons/arrow.svg" alt="">
                        </button>
                    </div>
                </div>
                <div class="point-ce-section_card-roll-normal-wrap">
                    <div class="point-ce-section_card-roll-normal">
                        <?php foreach ($rowShop as $rowShopinfo) : ?>
                            <div class="point-ce-section_coupon-normal point-ce-section_coupon" data-couponid="<?= $rowShopinfo['coupon_sid'] ?>">
                                <div class="point-ce-section_coupon-normal-content-wrap">
                                    <div class="point-ce-section_coupon-normal-img">
                                        <img src="./img/other/<?= $rowShopinfo['coupon_picture'] ?>" alt="">
                                        <img src="./img/other/points_less.png" alt="" id="cpCantChange">
                                    </div>
                                    <div class="point-ce-section_coupon-normal-content">
                                        <div class="point-ce-section_coupon-normal-content-info">
                                            <p class="point-ce-section_coupon-normal-content-name"><?= $rowShopinfo['coupon_name'] ?></p>
                                            <div class="point-ce-section_coupon-normal-content-type">
                                                <p><?= $rowShopinfo['coupon_brand'] ?></p>
                                            </div>
                                        </div>
                                        <div class="point-ce-section_coupon-normal-content-quantity">
                                            <!-- <p><span>30</span> / 100張</p> -->
                                            <div>
                                                <img src="./img/other/coin.svg" alt="">
                                                <p><span><?= $rowShopinfo['coupon_price'] ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="point-ce-section_card-roll-normal-arrow">
                    <!-- #coupon-normal-ott_3 -->
                    <a><i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>

            <div class="point-ce-section_light-box" id="pointCeSectionLightBox" style="display: none;">
                <div class="point-section_coupon-detail-card">
                    <div class="point-section_coupon-detail-card-title">
                        <div class="point-section_coupon-detail-card-title-left">
                            <h2>Netflix 3天試用兌換券</h2>
                            <div>
                                <img src="./img/logo/netflix.svg" alt="">
                                <p>OTT平台優惠</p>
                            </div>
                        </div>
                        <!-- <div class="point-section_coupon-detail-card-title-right">
                            <div>
                                <img src="./img/other/coin.svg" alt="">
                            </div>
                            <div>
                                <p>目前點數</p>
                                <p><span>2688</span> pt</p>
                            </div>
                        </div> -->
                    </div>
                    <div class="point-section_coupon-detail-card-code" style="display: none;">
                        <button class="point-section_coupon-detail-card-code-wrap">
                            <h2>MHA33RTY679</h2>
                        </button>
                    </div>
                    <div class="point-section_coupon-detail-card-coupunimg">
                        <img src="./img/other/discount_10.svg" alt="">
                    </div>
                    <!-- 要換一個寫法才行 -->
                    <div class="point-section_coupon-detail-card-notice">
                        <p>兌換後可將序號於註冊netflix帳號時使用，可獲得3天的免費試用期。</p>
                        <p>兌換後不可退貨。<br>
                            一個帳號僅能兌換一次。<br>
                            限量優惠，換完為止。</p>
                    </div>
                    <div class="point-section_coupon-detail-card-changenow">
                        <p>使用3000點</p>
                        <button>
                            <h2>立即兌換</h2>
                        </button>
                    </div>
                    <div class="point-section_coupon-detail-card-changesuccess" style="display: none;">
                        <img src="./img/logo/logo.png" alt="">
                        <h2>兌換成功</h2>
                        <p>優惠券已新增至會員專區的"我的優惠券"。</p>
                        <button>
                            <h2>查看序號</h2>
                        </button>
                    </div>
                </div>
            </div>

            <?php include __DIR__. '/parts/movwe_footer.php' ?>
        </div>
    </div>

    <script src="./js/Nav.js"></script>
    <script src="./js/dropdown_customstyle.js"></script>
    <!-- <script src="./js/point_coupon_exchange.js"></script> -->
    <script>
        const pceSession = <?= json_encode($_SESSION, JSON_UNESCAPED_UNICODE) ?>;
        (() => {
            // 點擊卡片跑出光箱 顯示卡片詳細
            const ceCoupon = document.querySelectorAll('.point-ce-section_coupon');
            const ceCouponDetail = document.querySelector('#pointCeSectionLightBox');
            let generatedcpcode = '';
            let restpoints = '';
            let nowmbsid = '';
            let nowcpsid = '';
            let moneymoney = <?php echo $_SESSION['admin']['member_points'] ?>;

            function getCouponLightboxData() {
                const domid = this.getAttribute('data-couponid');
                $(this).one('click', getCouponLightboxData);
                let domObj;
                console.log('link success - click', domid);
                if (domid) {
                    // {把domid包成物件} 'domid': 1
                    // 把前端東西丟後端需要key value
                    $.post('point_coupon_exchange_api.php', {
                        domid
                    }, function(data) {
                        console.log(data);
                        if (data.coupongeto && data.money - data.cpPrice >= 0) {
                            console.log('pass');
                            $('.footer__container').css('display', 'none');
                            $(ceCouponDetail).css('display', 'flex');
                            $('body').css({
                                'height': '100vh',
                                'overflow': 'hidden'
                            });
                            $('.point-section_coupon-detail-card-title-left h2').text(data.cpName);
                            $('.point-section_coupon-detail-card-title-left > div > img').attr('src', `./img/logo/${data.cpBrandimg}`);
                            $('.point-section_coupon-detail-card-title-left > div > p').text(data.cpBrand);
                            $('.point-section_coupon-detail-card-title-right > div:nth-child(2) > p:nth-child(2) > span').text(data.money);
                            $('.point-section_coupon-detail-card-coupunimg > img').attr('src', `./img/other/${data.cpImg}`);
                            document.querySelector('.point-section_coupon-detail-card-notice').innerHTML = data.cpNotice;
                            $('.point-section_coupon-detail-card-changenow > p').text('使用' + data.cpPrice + '點');
                            $('.point-section_coupon-detail-card-changenow > button').on('click', function() {
                                const couponCode = generateRandomString(12);
                                $('.point-section_coupon-detail-card-code > .point-section_coupon-detail-card-code-wrap > h2').text(couponCode);
                                // 有bug有可能出現一樣的數字
                                generatedcpcode = couponCode;
                                restpoints = data.money - data.cpPrice;
                                nowmbsid = <?php echo $_SESSION['admin']['member_sid'] ?>;
                                nowcpsid = data.cpSid;
                                moneymoney = restpoints;
                                console.log(generatedcpcode, restpoints, nowmbsid, nowcpsid);
                                $.post('point_coupon_addtomember_api.php', {
                                    generatedcpcode,
                                    restpoints,
                                    nowmbsid,
                                    nowcpsid,
                                }, function(data) {
                                    console.log(data);
                                    $('.point-section_coupon-detail-card-title, .point-section_coupon-detail-card-title-left, .point-section_coupon-detail-card-title-right, .point-section_coupon-detail-card-coupunimg, .point-section_coupon-detail-card-notice, .point-section_coupon-detail-card-changenow').css('display', 'none');
                                    $('.point-section_coupon-detail-card-changesuccess').css('display', 'flex');
                                    $('.point-section_nav-showpoints-points > span').text(`${restpoints}pt`);
                                    $('.point-section_coupon-detail-card-changesuccess > button').on('click', function() {
                                        $('.point-section_coupon-detail-card-title-right > div:nth-child(2) > p:nth-child(2) > span').text(`${restpoints}`);
                                        $('.point-section_coupon-detail-card-title, .point-section_coupon-detail-card-title-left, .point-section_coupon-detail-card-title-right, .point-section_coupon-detail-card-coupunimg').css('display', 'flex');
                                        $(' .point-section_coupon-detail-card-notice, .point-section_coupon-detail-card-code').css('display', 'block');
                                        $('.point-section_coupon-detail-card-changesuccess').css('display', 'none');
                                    });
                                }, 'json');
                            });
                        } else if (data.coupongeto && data.cpPrice - data.money > 0) {
                            console.log('點數不足');
                        } else {
                            console.log('資料失敗');
                        };
                    }, 'json');
                };
            };

            function generateRandomString(num) {
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result1 = ' ';
                const charactersLength = characters.length;
                for (let i = 0; i < num; i++) {
                    result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
                }

                return result1;
            };

            function closeCouponLightbox(eve , mm) {
                if (eve.target.id == "pointCeSectionLightBox") {
                    $('.footer__container').css('display', 'block');
                    $('#pointCeSectionLightBox').css('display', 'none');
                    $('body').css({
                        'overflow': 'auto',
                        'height': 'auto',
                    });
                    $('.point-section_coupon-detail-card-code').css('display', 'none');
                    $('.point-section_coupon-detail-card-changesuccess').css('display', 'none');
                    $('.point-section_coupon-detail-card-changenow').css('display', 'flex');
                    $('.point-section_coupon-detail-card-coupunimg').css('display', 'flex');
                    $('.point-section_coupon-detail-card-title').css('display', 'flex');
                    $('.point-section_coupon-detail-card-notice').css('display', 'block');
                    $('.point-section_coupon-detail-card-title-left').css('display', 'flex');
                    $('.point-section_coupon-detail-card-title-right').css('display', 'flex');
                    couponStatuslimited(mm);
                    couponStatusnormal(mm);
                    // location.href = 'point_coupon_exchange.php';
                }; //點選的如果不是選單，選單隱藏。如果是選單，選單顯現
            };

            function couponStatuslimited(mm) {
                if (<?php echo !empty($_SESSION['admin']) ?>) {
                    const alllimited = document.querySelectorAll('.point-ce-section_coupon-limited-content-quantity > div > p > span');
                    for (let i = 0; i < alllimited.length; i++) {
                        if (alllimited[i].innerText > mm) {
                            console.log('你錢不夠');
                            $(alllimited[i]).parents('.point-ce-section_coupon').addClass('point_coupon_cant_change');
                            $(alllimited[i]).parents('.point-ce-section_coupon').find('#cpCantChange').css('display', 'block');
                        } else {
                            console.log('你錢夠');
                            $(alllimited[i]).parents('.point-ce-section_coupon').removeClass('point_coupon_cant_change');
                            $(alllimited[i]).parents('.point-ce-section_coupon').find('#cpCantChange').css('display', 'none');
                        };
                    };
                } else {
                    console.log('沒有登入不用執行');
                };
            };

            function couponStatusnormal(mm) {
                if (<?php echo !empty($_SESSION['admin']) ?>) {
                    const allnormal = document.querySelectorAll('.point-ce-section_coupon-normal > .point-ce-section_coupon-normal-content-wrap > .point-ce-section_coupon-normal-content > .point-ce-section_coupon-normal-content-quantity > div > p > span');
                    for (let i = 0; i < allnormal.length; i++) {
                        if (allnormal[i].innerText > mm) {
                            console.log('你錢不夠');
                            $(allnormal[i]).parents('.point-ce-section_coupon').addClass('point_coupon_cant_change');
                            $(allnormal[i]).parents('.point-ce-section_coupon').find('#cpCantChange').css('display', 'block');
                        } else {
                            console.log('你錢夠');
                            $(allnormal[i]).parents('.point-ce-section_coupon').removeClass('point_coupon_cant_change');
                            $(allnormal[i]).parents('.point-ce-section_coupon').find('#cpCantChange').css('display', 'none');
                        };
                    };
                } else {
                    console.log('沒有登入不用執行');
                };
            };

            ceCoupon.forEach(element => {
                $(element).one('click', getCouponLightboxData);
            });
            document.addEventListener('click', closeCouponLightbox);
            couponStatuslimited(<?php echo $_SESSION['admin']['member_points'] ?>);
            couponStatusnormal(<?php echo $_SESSION['admin']['member_points'] ?>);

            // function ceCouponToArray(ceCouponNodeList) {
            //     ceCouponNodeList.forEach(element => {
            //         const couponDom = element;
            //         ceCouponArray.push(couponDom);
            //     });
            // };
            // function ceCouponAddEvent(couponDOMArray) {
            //     for (let i = 0; i < couponDOMArray.length; i++) {
            //         couponDOMArray[i].addeventlistener('click', ceCouponLightBox);
            //     }
            // };
            // function ceCouponLightBox() {
            //     ceCouponDetail.style = 'display: flex;';
            // };

            // ceCouponToArray(ceCoupon);
            // ceCouponAddEvent(ceCouponArray);
            // console.log('ready');
        })();
    </script>
</body>

</html>