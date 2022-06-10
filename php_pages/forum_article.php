<?php

require './parts/movwe_connect_db.php';
// $pageName = 'login';
$quertstr = strval($_SERVER['QUERY_STRING']);
$pattern = "/[art=]+/";
$ids = preg_split($pattern, $quertstr)[1];
// 從資笠庫裡拿文章資料
$getforumsql = 'SELECT * FROM `forum` FULL join `member` WHERE `forum_sid`= ? and `forum_arthur` = `member_sid`';
// $getforumsql = 'SELECT * FROM `forum` ORDER BY `forum_sid` DESC LIMIT 7;';
$getforumstmt = $pdo->prepare($getforumsql);
$getforumstmt->execute([$ids]);
$getforumrows = $getforumstmt->fetch();
// 除錯
// if (!empty($getforumrows)) {
// };

// 用forumsid去查找所有的hashtag
// $getforumid = [];
// foreach($getforumrows as $fr){
//     $getforumid[] = $fr['forum_sid'];
// };
$tagsql = "SELECT * FROM `forum_has_hastag` WHERE `f_has_forum_sid` = " . $getforumrows['forum_sid'];
$tags = $pdo->query($tagsql)->fetchAll();
if (empty($tags)) {
    $tags = false;
};

// 用forumsid去找所有留言
// 未來優化應該要把留言者的sid也加進來
$comsql = 'SELECT * FROM `forum_comment` WHERE `f_comment_forum_sid` ='.$ids;
$comrows =  $pdo->query($comsql)->fetchAll();
if(empty($comrows)){
    $comrows = false;
};



$title = 'MOVWE-' . $getforumrows['forum_title'];
// echo $_SERVER['QUERY_STRING'];

?>

<?php include __DIR__ . '/parts/movwe_head.php' ?>


<link rel="stylesheet" href="./css/mystyle.css">
<link rel="stylesheet" href="./css/forum_article.css">
<style>
    @media screen and (min-width: 750px) {
        .content-img-wrap{
            width: 60%;
            margin: 48px auto;
        }
    }
</style>

</head>

<body>
    <?php include __DIR__ . '/parts/movwe_nav_fin.php' ?>
    <div class="layout">

        <?php include __DIR__ . '/parts/movwe_nav_leftdiv.php' ?>

        <div class="container">
            <!--text__container------內容放這邊------------->
            <div class="text__container d-flex justify-between">
                <div class="left__container">
                    <div class="d-flex creater justify-between align-item-center">
                        <div class="d-flex">
                            <div class="d-flex justify-center align-item-center mr-20">
                                <div class="member-img-wrap">
                                    <img src="./img/member/<?php echo $getforumrows['member_avatar'] ?>" alt="">
                                </div>
                            </div>
                            <div class="d-flex justify-center align-item-center">
                                <h3><?php echo $getforumrows['member_nickname'] ?></h3>
                            </div>
                        </div>
                        <div><span><?php echo $getforumrows['forum_uploadtime'] ?> 發表</span></div>
                    </div>
                    <div class="d-flex mt-20 align-item-center">
                        <div class="mr-10">
                            <button class="d-filter d-filter-d" style="<?php
                                                                        $ottcolor = [
                                                                            '2' => '#10FFA2',
                                                                            '3' => '#1CD8FF',
                                                                            '1' => '#FC6F51',
                                                                        ];
                                                                        if ($getforumrows['forum_type'] == '影劇') {
                                                                            $color = $ottcolor['1'];
                                                                        } else if ($getforumrows['forum_type'] == '電影') {
                                                                            $color = $ottcolor['2'];
                                                                        } else if ($getforumrows['forum_type'] == '動畫') {
                                                                            $color = $ottcolor['3'];
                                                                        };
                                                                        echo 'color:' . $color . '; border: 1px solid' . $color;
                                                                        ?>"><?php echo $getforumrows['forum_type'] ?></button>
                        </div>
                        <h2><?php echo $getforumrows['forum_title'] ?></h2>
                    </div>
                    <div class="mt-20">
                        <div class="content-img-wrap">
                            <img src="./img/forum/<?php echo $getforumrows['forum_pic'] ?>" alt="">
                        </div>
                        <p><?php echo $getforumrows['forum_content'] ?></p>
                    </div>
                    <div class="hashtag d-flex mt-30">
                        <ul class="d-flex ar-filter">
                            <?php if ($tags != false) {
                                foreach ($tags as $t) {
                                    echo '<li class="filter_4w d-flex justify-center align-item-center">' . $t['f_has_hastag_name'] . '</li>';
                                };
                            }; ?>
                        </ul>
                    </div>
                    <!-- 愛心 留言 收藏  -->
                    <div class="feedback d-flex justify-between align-item-center mt-20">
                        <div class="d-flex align-item-center">
                            <input type="button" hidden>
                            <svg width="24" height="20" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <span class="ml-10">喜歡</span>
                        </div>
                        <div class="d-flex align-item-center">
                            <input type="button" hidden>
                            <svg width="24" height="24" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.4999 5.24993C7.35156 5.24993 7.20656 5.29391 7.08322 5.37632C6.95989 5.45873 6.86376 5.57587 6.807 5.71291C6.75023 5.84995 6.73538 6.00075 6.76432 6.14623C6.79326 6.29172 6.86469 6.42535 6.96957 6.53024C7.07446 6.63513 7.2081 6.70656 7.35358 6.7355C7.49906 6.76443 7.64986 6.74958 7.78691 6.69282C7.92395 6.63605 8.04108 6.53992 8.12349 6.41659C8.2059 6.29325 8.24989 6.14825 8.24989 5.99992C8.24989 5.80101 8.17087 5.61024 8.03022 5.46959C7.88957 5.32894 7.69881 5.24993 7.4999 5.24993ZM12.7498 0H2.24997C1.65324 0 1.08095 0.23705 0.659001 0.659001C0.23705 1.08095 0 1.65324 0 2.24997V9.74986C0 10.3466 0.23705 10.9189 0.659001 11.3408C1.08095 11.7628 1.65324 11.9998 2.24997 11.9998H10.9423L13.7173 14.7823C13.7874 14.8518 13.8705 14.9068 13.9619 14.9441C14.0533 14.9814 14.1511 15.0004 14.2498 14.9998C14.3482 15.0023 14.4458 14.9818 14.5348 14.9398C14.6718 14.8835 14.789 14.788 14.8718 14.6652C14.9545 14.5424 14.9991 14.3979 14.9998 14.2498V2.24997C14.9998 1.65324 14.7627 1.08095 14.3408 0.659001C13.9188 0.23705 13.3466 0 12.7498 0ZM13.4998 12.4423L11.7823 10.7174C11.7123 10.6478 11.6291 10.5928 11.5378 10.5555C11.4464 10.5182 11.3485 10.4993 11.2498 10.4999H2.24997C2.05106 10.4999 1.8603 10.4208 1.71965 10.2802C1.579 10.1395 1.49998 9.94877 1.49998 9.74986V2.24997C1.49998 2.05106 1.579 1.8603 1.71965 1.71965C1.8603 1.579 2.05106 1.49998 2.24997 1.49998H12.7498C12.9487 1.49998 13.1395 1.579 13.2801 1.71965C13.4208 1.8603 13.4998 2.05106 13.4998 2.24997V12.4423ZM4.49994 5.24993C4.3516 5.24993 4.2066 5.29391 4.08327 5.37632C3.95993 5.45873 3.8638 5.57587 3.80704 5.71291C3.75027 5.84995 3.73542 6.00075 3.76436 6.14623C3.7933 6.29172 3.86473 6.42535 3.96962 6.53024C4.0745 6.63513 4.20814 6.70656 4.35362 6.7355C4.49911 6.76443 4.6499 6.74958 4.78695 6.69282C4.92399 6.63605 5.04112 6.53992 5.12353 6.41659C5.20594 6.29325 5.24993 6.14825 5.24993 5.99992C5.24993 5.80101 5.17091 5.61024 5.03026 5.46959C4.88961 5.32894 4.69885 5.24993 4.49994 5.24993V5.24993ZM10.4999 5.24993C10.3515 5.24993 10.2065 5.29391 10.0832 5.37632C9.95985 5.45873 9.86372 5.57587 9.80695 5.71291C9.75019 5.84995 9.73534 6.00075 9.76428 6.14623C9.79321 6.29172 9.86464 6.42535 9.96953 6.53024C10.0744 6.63513 10.2081 6.70656 10.3535 6.7355C10.499 6.76443 10.6498 6.74958 10.7869 6.69282C10.9239 6.63605 11.041 6.53992 11.1234 6.41659C11.2059 6.29325 11.2498 6.14825 11.2498 5.99992C11.2498 5.80101 11.1708 5.61024 11.0302 5.46959C10.8895 5.32894 10.6988 5.24993 10.4999 5.24993Z" fill="#ffffff80" />
                            </svg>
                            </input>
                            <span class="ml-10">留言</span>
                        </div>
                        <div class="d-flex align-item-center">
                            <input type="button" hidden>
                            <svg width="24" height="24" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.97267 1.00018L14.0048 7.03233C14.6651 7.69257 14.6651 8.77295 14.0048 9.43319L9.43319 14.0048C8.77295 14.6651 7.69257 14.6651 7.03233 14.0048L1.00018 7.97267C0.680064 7.65255 0.5 7.2224 0.5 6.77224V1.65041C0.5 1.01018 1.01018 0.5 1.65041 0.5H6.77224C7.2224 0.5 7.65255 0.680064 7.97267 1.00018Z" stroke="#ffffff80" />
                                <path d="M3.34 4.48859C3.94199 4.48859 4.43 4.00058 4.43 3.39859C4.43 2.7966 3.94199 2.30859 3.34 2.30859C2.73801 2.30859 2.25 2.7966 2.25 3.39859C2.25 4.00058 2.73801 4.48859 3.34 4.48859Z" fill="#ffffff80" />
                            </svg>
                            </input>
                            <span class="ml-10">收藏</span>
                        </div>
                    </div>
                    <div class="comment mt-20" id="comment_head">
                        <div class="comment-card d-flex align-item-center">
                            <div>
                                <div class="comment-img-wrap">
                                    <img src="./img/member/<?php echo $_SESSION['admin']['member_avatar'] ?>" alt="">
                                </div>
                            </div>
                            <div class="w-100 ml-20">
                                <h4 data-authersid="<?php echo $_SESSION['admin']['member_sid'] ?>"><?php echo $_SESSION['admin']['member_nickname'] ?></h4>
                                <div class="d-flex justify-between align-item-center">
                                    <input type="text" placeholder="&nbsp;&nbsp;寫下你的留言～" name="comment_input" id="comment_input">
                                    <button class="white" id="comment_btn" onclick="getcomment()">送出</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment mt-20" id="comment_bars">
                        <!-- TODO:留言功能 這邊叫留言-->
                        <?php if($comrows != false): ?>
                            <?php foreach($comrows as $com): ?>
                        <div class="comment-card d-flex justify-between align-item-center mt-20" data-forumsid="<?= $com['f_comment_forum_sid'] ?>">
                            <div class="d-flex">
                                <div>
                                    <div class="comment-img-wrap">
                                        <img src="./img/member/<?= $com['f_comment_pic'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="ml-20">
                                    <h4 data-authersid="<?= $com['f_comment_authur_sid'] ?>"><?= $com['f_comment_authur'] ?></h4>
                                    <p><?= $com['f_comment_content'] ?></p>
                                    <span><?= $com['f_comment_uploadtime'] ?></span>
                                </div>
                            </div>
                            <div>
                                <svg width="24" height="20" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1427_26189)">
                                        <path d="M8.35907 1.43364L8.73934 1.84474L9.15044 1.43433C10.2981 0.315787 11.8877 -0.193294 13.4499 0.0667277C15.8103 0.460015 17.5403 2.50251 17.5403 4.89717V5.09587C17.5403 6.5176 16.9511 7.87766 15.9096 8.84718L9.71913 14.6266C9.46219 14.8664 9.12303 15 8.77017 15C8.41731 15 8.07815 14.8664 7.82121 14.6266L1.63036 8.84718C0.590274 7.87766 0 6.5176 0 5.09587V4.89717C0 2.50251 1.73074 0.460015 4.09046 0.0667277C5.62182 -0.193294 7.24224 0.315787 8.35907 1.43364C8.35907 1.43398 8.32824 1.43364 8.35907 1.43364ZM8.73934 4.17089L7.19771 2.5676C6.4543 1.85434 5.39914 1.51586 4.3611 1.68852C2.79378 1.94992 1.64441 3.30758 1.64441 4.89717V5.09587C1.64441 6.06196 2.04557 6.98694 2.75233 7.6447L8.77017 13.2631L14.7894 7.6447C15.4951 6.98694 15.8959 6.06196 15.8959 5.09587V4.89717C15.8959 3.30758 14.7449 1.94992 13.1792 1.68852C12.1412 1.51586 11.086 1.85434 10.3426 2.5676L8.73934 4.17089Z" fill="#FC6F51" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1427_26189">
                                            <rect width="17.5403" height="15" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                                <?php endforeach; ?>
                                    <?php endif; ?>
                    </div>
                </div>
                <div class="right__container">
                    <!-- 熱門創作者 -->
                    <div>
                        <div class="d-flex align-item-center">
                            <div class="stick_desk"></div>
                            <h2>熱門創作者排行</h2>
                        </div>
                        <div class="mt-20 ml-20">
                            <a href="#" class="card-creater">
                                <div class="d-flex align-item-center">
                                    <div class="member-img-wrap mr-20">
                                        <img src="./img/forum/1.jpg" alt="">
                                    </div>
                                    <div class="creater">
                                        <h4>翔子學妹</h4>
                                        <span>136篇文章</span><br>
                                        <span>學妹の日劇片單</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="mt-20 ml-20">
                            <a href="#" class="card-creater">
                                <div class="d-flex align-item-center">
                                    <div class="member-img-wrap mr-20">
                                        <img src="./img/forum/8.jpg" alt="">
                                    </div>
                                    <div class="creater">
                                        <h4>瀚瀚子與鳥鳥</h4>
                                        <span>72篇文章</span><br>
                                        <span>信義區鳥鳥日常</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="mt-20 ml-20">
                            <a href="#" class="card-creater">
                                <div class="d-flex align-item-center">
                                    <div class="member-img-wrap mr-20">
                                        <img src="./img/forum/tinytall.jpg" alt="">
                                    </div>
                                    <div class="creater">
                                        <h4>胎尼頭</h4>
                                        <span>59篇文章</span><br>
                                        <span>韓劇迷妹宣虎控</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="mt-20 ml-20">
                            <a href="#" class="card-creater">
                                <div class="d-flex align-item-center">
                                    <div class="member-img-wrap mr-20">
                                        <img src="./img/forum/dino.jpg" alt="">
                                    </div>
                                    <div class="creater">
                                        <h4>切版王笠鴿</h4>
                                        <span>28篇文章</span><br>
                                        <span>週五微醺電影夜</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="mt-20 ml-20">
                            <a href="#" class="card-creater">
                                <div class="d-flex align-item-center">
                                    <div class="member-img-wrap mr-20">
                                        <img src="./img/forum/wife.jpg" alt="">
                                    </div>
                                    <div class="creater">
                                        <h4>桌布是結衣</h4>
                                        <span>16篇文章</span><br>
                                        <span>黑橘遊戲不要玩</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- 熱門文章 -->
                    <div class="mt-20">
                        <div class="d-flex align-item-center">
                            <div class="stick_desk"></div>
                            <h2>熱門文章</h2>
                        </div>
                        <div class="mt-20">
                            <div class="hot-article">
                                <div class="article-img-wrap">
                                    <img src="./img/forum/2.jpg" alt="">
                                </div>
                                <div class="d-flex align-item-center mt-10">
                                    <a class="d-filter d-filter-d mr-10" href="#">影劇</a>
                                    <a href="#">
                                        <h4>步步驚心哭得我不要不要</h4>
                                    </a>
                                </div>
                                <p class="mt-10">
                                    李準基、IU主演的《步步驚心麗》已經完結六年了，悲劇的結局卻讓網友始終念念不忘，之前網路也一直有傳言有另外拍現代版結局，最近李準基也首度談到現代版結局走向！
                                </p>

                            </div>
                        </div>
                        <div class="mt-20">
                            <div class="hot-article">
                                <div class="article-img-wrap">
                                    <img src="./img/forum/spyfamily-1.jpg" alt="">
                                </div>
                                <div class="d-flex align-item-center mt-10">
                                    <a class="d-filter d-filter-a mr-10" href="#">動漫</a>
                                    <a href="#">
                                        <h4 class="single">間諜家家酒Spy x Family—相親相愛</h4>
                                    </a>
                                </div>
                                <p class="mt-10 multiple">
                                    一家三口在暑假之際，為了安妮亞的暑假作業-遊記，來到了海邊，安妮亞坐在金黃的沙灘上堆著沙灘碉堡，約兒穿著一身小洋裝外加一件薄外套，玲瓏有緻的曲線散發著魅力，黃昏則穿著藏青色薄長袖連帽外套與休閒短褲，完美呈現穿衣顯瘦，脫衣有肉的身材。
                                </p>
                            </div>
                        </div>
                        <div class="mt-20">
                            <div class="hot-article">
                                <div class="article-img-wrap">
                                    <img src="./img/forum/gangubai.jpg" alt="">
                                </div>
                                <div class="d-flex align-item-center mt-10">
                                    <a class="d-filter d-filter-m mr-10" href="#">電影</a>
                                    <a href="#">
                                        <h4>孟買女帝 | 1000盧比打造人美心狠</h4>
                                    </a>
                                </div>
                                <p class="mt-10 multiple">
                                    「你們知道，世界上最古老的職業是什麼嗎？」「就是賣淫。」客人主動找上門，遭受白眼的卻是性工作者！由真人故事改編的電影《孟買女帝》空降 Netflix 電影專區第一名！劇情描述16歲少女「甘古」被情人拐騙到孟買妓院，以1000盧比販售給妓院老鴇！就此，她的電影夢碎、人生徹底改變！但是她靠著過人的勇氣、驚人的毅力、聰明的才智與流利的口條，從一個默默無名的性工作者，逐漸轉變成為名留青史的女權守護者「甘古拜」。
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include __DIR__ . '/parts/movwe_footer.php' ?>
        </div>

        <script src="./js/Nav.js"></script>
        <script>
            // 拿到留言input
            function getcomment() {
                const $commentVal = $('#comment_input').val();
                const $commentPic = $('#comment_head .comment-img-wrap > img').attr('src').split('/')[$('#comment_head .comment-img-wrap > img').attr('src').split('/').length - 1];
                const $commentAva = $('#comment_head > .comment-card h4').text();
                console.log($commentVal);

                function pad(num) {
                    return ('00' + num).slice(-2)
                };
                let date;
                date = new Date();
                date = date.getUTCFullYear() + '-' +
                    pad(date.getUTCMonth() + 1) + '-' +
                    pad(date.getUTCDate()) + ' ' +
                    pad(date.getUTCHours()) + ':' +
                    pad(date.getUTCMinutes()) + ':' +
                    pad(date.getUTCSeconds());
                // 送到append
                appcomment($commentVal, $commentPic, $commentAva, date);
                // 送到api
                apicomment($commentVal, $commentPic, $commentAva, date);
                $('#comment_input').val('');
            };
            // 留言成功

            // append到 comment_bars底下
            function appcomment(val, pic, ava, tim) {
                const newDom = document.createElement('div');
                newDom.classList.add('comment-card');
                newDom.classList.add('d-flex');
                newDom.classList.add('justify-between');
                newDom.classList.add('align-item-center');
                newDom.classList.add('mt-20');
                newDom.innerHTML = `<div class="d-flex">
                                <div>
                                    <div class="comment-img-wrap">
                                        <img src="./img/member/${pic}" alt="">
                                    </div>
                                </div>
                                <div class="ml-20">
                                    <h4>${ava}</h4>
                                    <p>${val}</p>
                                    <span>${tim}</span>
                                </div>
                            </div>
                            <div>
                                <svg width="24" height="20" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1427_26189)">
                                        <path d="M8.35907 1.43364L8.73934 1.84474L9.15044 1.43433C10.2981 0.315787 11.8877 -0.193294 13.4499 0.0667277C15.8103 0.460015 17.5403 2.50251 17.5403 4.89717V5.09587C17.5403 6.5176 16.9511 7.87766 15.9096 8.84718L9.71913 14.6266C9.46219 14.8664 9.12303 15 8.77017 15C8.41731 15 8.07815 14.8664 7.82121 14.6266L1.63036 8.84718C0.590274 7.87766 0 6.5176 0 5.09587V4.89717C0 2.50251 1.73074 0.460015 4.09046 0.0667277C5.62182 -0.193294 7.24224 0.315787 8.35907 1.43364C8.35907 1.43398 8.32824 1.43364 8.35907 1.43364ZM8.73934 4.17089L7.19771 2.5676C6.4543 1.85434 5.39914 1.51586 4.3611 1.68852C2.79378 1.94992 1.64441 3.30758 1.64441 4.89717V5.09587C1.64441 6.06196 2.04557 6.98694 2.75233 7.6447L8.77017 13.2631L14.7894 7.6447C15.4951 6.98694 15.8959 6.06196 15.8959 5.09587V4.89717C15.8959 3.30758 14.7449 1.94992 13.1792 1.68852C12.1412 1.51586 11.086 1.85434 10.3426 2.5676L8.73934 4.17089Z" fill="#FC6F51" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1427_26189">
                                            <rect width="17.5403" height="15" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>`;
                const adddom = document.querySelector('#comment_bars');
                adddom.prepend(newDom);
            };
            // 匯入資料庫
            // TODO: 存getcomment的四個變數到
            function apicomment(val, pic, ava, tim) {
                const like = 0;
                const qrs = new URLSearchParams(window.location.search).get('art');
                const athursid = $('#comment_head h4').attr('data-authersid');
                const obj = {
                    'val': val,
                    'pic': pic,
                    'ava': ava,
                    'tim': tim,
                    'qrs': qrs,
                    'like': like,
                    'atsid': athursid
                };
                $.get('api_commemt_add.php', obj, function(data) {
                    console.log('hihi');
                }, 'json');
            };
        </script>
</body>

</html>