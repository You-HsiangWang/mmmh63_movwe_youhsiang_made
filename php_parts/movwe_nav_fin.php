<?php
require './parts/movwe_connect_db.php';

// 判斷登入狀態
if (isset($_SESSION['admin']['member_avatar'])) {
    $class = 1;
    $avapic = $_SESSION['admin']['member_avatar'];
} else {
    $class = 0;
};
?>

<div class="Navbar__container">
    <div class="top_nav">
        <div class="top_nav_left">
            <div class="top_nav_logo">
                <div class="top_nav_logo_box">
                    <img class="top_nav_movwe_img-2" src="./img/icons/close.svg" alt="">
                    <i class="fa-solid fa-bars top_nav_movwe_img bars"></i>
                    <img class="origin__logo" src="./img/logo/logo.svg" alt="">
                </div>
            </div>
            <a href="index_home.php">
                <div class="top_nav_movwe_box">
                    <img class="top_nav_movwe_img mobil__show" src="./img/logo/logo_movwe_word.svg" alt="">
                    <a href="index_home.php"><img class="top_nav_movwe_img desk__show" src="./img/logo/logo_word.svg" alt=""></a>
                </div>
            </a>
        </div>
        <div class="top_nav_right">
            <div class="top_nav_searchbar_box nav_phone_d-none">
                <input type="text" class="top_nav_searchbar" placeholder="輸入片名">
                <div class="search_icon"><i class="fa-solid fa-magnifying-glass"></i></div>
            </div>

            <a class="top__nav__icon__box nav_phone_d-none papaforcart5" href="order_cart.php">
                <div class="top__nav__member">
                    <div class="nav_icon_box icon_W-H">
                        <i class="fa-solid fa-cart-shopping shop__card"></i>
                        <h6 class="forcart5">5</h6>
                    </div>
                    <p class="shopcard__text" style="white-space:nowrap">購物車</p>
                </div>
            </a>

            <a class="top__nav__icon__box nav_phone_d-none" href="member-info-index.php">
                <div class="top__nav__member">
                    <div class="nav_icon_box icon_W-H">
                        <i class="fa-solid fa-file-video movie__likes"></i>
                    </div>
                    <p class="movie__like__text">片單</p>
                </div>
            </a>
            <div class="top__nav__member__box">
                <?php if ($class == 1) {
                    echo '<div class="top__nav__member__logout">
                        <div class="tn_avatar_wrap">
                            <a href="member-info-index.php">
                                <img class="" src="./img/member/' . $avapic . '" alt="">
                            </a>
                        </div>
                        <div class="tn_logout_wrap">
                            <a href="member_logout.php">
                                <p class="tn__logout">登出</p>
                            </a>
                        </div>
                    </div>';
                };
                if ($class == 0) {
                    echo '<div class="top__nav__member__login">
                        <a href="member_login.php">
                            <i class="fa-solid fa-user"></i>
                            <p class="tn__login">登入</p>
                        </a>
                    </div>';
                };
                ?>
            </div>
            <!-- <div class="top__nav__member__box">
                <div class="top__nav__member__login">
                    <a href="member_login.php">
                        <i class="fa-solid fa-user"></i>
                        <p class="tn__login">登入</p>
                    </a>
                </div>
                <div class="top__nav__member__logout">
                    <div class="tn_avatar_wrap">
                        <a href="member-info-index.php">
                            <img class="" src="./img/center/actor-1.jpeg" alt="">
                        </a>
                    </div>
                    <div class="tn_logout_wrap">
                        <a href="member_logout.php">
                            <p class="tn__logout">登出</p>
                        </a>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
    <div class="left_nav">
        <div class="left_nav_box">
        </div>
        <div class="left_nav_box Movie">
            <div class="left_nav_movie icon_box_W-H">
                <div class="nav_icon_box icon_W-H">
                    <i class="fa-solid fa-film"></i>
                </div>
                <div class="nav_text_01 ">
                    <div class="h-60px movie_btn">影劇 <span class="down"><i class="fa-solid fa-angle-down"></i></span></div>
                    <a href="index_home.php#index_filter">
                        <p class="text_a">影劇搜尋器</p>
                    </a>
                    <a href="index_home.php#goingtoupdate">
                        <p class="text_a">ott上片資訊</p>
                    </a>
                    <a href="wish_home.php">
                        <p class="text_a">許願池</p>
                    </a>
                    <a href="dragon_quest.php">
                        <p class="text_a">心理測驗</p>
                    </a>
                    <a href="member-info-index.php">
                        <p class="text_a">我的片單</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="title_bottom">
            <div class="title_">影劇</div>
        </div>
        <div class="left_nav_box Store">
            <div class="left_nav_store icon_box_W-H">
                <div class="nav_icon_box icon_W-H">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div class="nav_text_01 ">
                    <div class="h-60px store_btn">商城 <span class="down"><i class="fa-solid fa-angle-down"></i></span></div>
                    <!-- <a href="#">
                            <p class="text_a">主打活動</p>
                        </a> -->
                    <a href="store.php">
                        <p class="text_a">商品總覽</p>
                    </a>
                    <a href="order_cart.php">
                        <p class="text_a">購物車</p>
                    </a>
                    <a href="member-info-index.php#historyOrder">
                        <p class="text_a">歷史訂單</p>
                    </a>
                    <!-- < class="text_a">商城優或卷</> -->
                </div>
            </div>
        </div>
        <div class="title_bottom">
            <div class="title_">商城</div>
        </div>

        <div class="left_nav_box Form">
            <div class="left_nav_forum icon_box_W-H">
                <div class="nav_icon_box icon_W-H">
                    <i class="fa-solid fa-pencil pp"></i>
                </div>
                <div class="nav_text_01 ">
                    <div class="h-60px form_btn">討論 <span class="down"><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                    <a href="forum.php">
                        <p class="text_a">文章總覽</p>
                    </a>
                    <a>
                        <p class="text_a">熱門作者</p>
                    </a>
                    <a>
                        <p class="text_a">熱門文章</p>
                    </a>
                    <a href="member-info-index.php#myArtCollect">
                        <p class="text_a">收藏文章</p>
                    </a>

                </div>
            </div>
        </div>
        <div class="title_bottom">
            <div class="title_">討論</div>
        </div>

        <div class="left_nav_box">
            <div class="left_nav_discount icon_box_W-H">
                <a href="point_index.php">
                    <div class="nav_icon_box icon_W-H">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div class="nav_text_01">
                        <div class="h-60px">優惠 <span class="down">
                                <!-- <i class="fa-solid fa-angle-down"></i> -->
                            </span></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="title_bottom">
            <div class="title_">優惠</div>
        </div>
        <!-- 手機版購物車我的片單 會員狀態 -->
        <div class="left_nav_box nav_web_d-none papaforcart5">
            <div class="left_nav_discount icon_box_W-H">
                <a href="order_cart.php">
                    <div class="nav_icon_box icon_W-H">
                        <i class="fa-solid fa-cart-shopping shop__card"></i>
                        <h6 class="forcart5">5</h6>
                    </div>
                    <div class="nav_text_01">
                        <div class="h-60px">購物車 <span class="down">
                                <!-- <i class="fa-solid fa-angle-down"></i> -->
                            </span></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="title_bottom nav_web_d-none">
            <div class="title_">購物車</div>
        </div>

        <div class="left_nav_box nav_web_d-none">
            <div class="left_nav_discount icon_box_W-H">
                <a href="member-info-index.php">
                    <div class="nav_icon_box icon_W-H">
                        <i class="fa-solid fa-file-video movie__likes"></i>
                    </div>
                    <div class="nav_text_01">
                        <div class="h-60px">我的片單 <span class="down">
                                <!-- <i class="fa-solid fa-angle-down"></i> -->
                            </span></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="title_bottom nav_web_d-none">
            <div class="title_">片單</div>
        </div>

        <!-- <div class="top__nav__member__box">
            <?php if ($class == 1) {
                echo '<div class="top__nav__member__logout">
                        <div class="tn_avatar_wrap">
                            <a href="member-info-index.php">
                                <img class="" src="./img/member/' . $avapic . '" alt="">
                            </a>
                        </div>
                        <div class="tn_logout_wrap">
                            <a href="member_logout.php">
                                <p class="tn__logout">登出</p>
                            </a>
                        </div>
                    </div>';
            };
            if ($class == 0) {
                echo '<div class="top__nav__member__login">
                        <a href="member_login.php">
                            <i class="fa-solid fa-user"></i>
                            <p class="tn__login">登入</p>
                        </a>
                    </div>';
            };
            ?>
        </div> -->



    </div>
</div>

<script>
    $('.home__logout').on('click', function() {
        location.href = './member_logout.php';
    });
</script>