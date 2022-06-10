<?php

// require './parts/movwe_connect_db.php';
// $pageName = 'login';
$title = '預覽文章';

?>

<?php include __DIR__ . '/parts/movwe_head.php' ?>


<link rel="stylesheet" href="./css/mystyle.css">
<link rel="stylesheet" href="./css/forum_article.css">
<style>
    .text__container {
        flex-direction: column;
        width: 94%;
        margin: 120px auto;
    }

    @media screen and (min-width: 750px) {
        .text__container {
            flex-direction: column;
            width: 70%;
            margin: 120px auto;
        }
        .content-img-wrap {
            width: 60%;
            margin: 48px auto;
        };
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
                <div class="progress-bar d-flex justify-between align-item-center mb-2">
                    <div class="d-flex justify-center align-item-center">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.7108 18.5V10.756C12.7108 10.5747 12.7108 10.3827 12.7108 10.18C12.7215 9.96667 12.7321 9.748 12.7428 9.524C12.3801 9.876 11.9588 10.1853 11.4788 10.452C10.9988 10.708 10.5081 10.8947 10.0068 11.012L9.67081 9.844C9.86281 9.82267 10.1028 9.75333 10.3908 9.636C10.6895 9.508 10.9988 9.35333 11.3188 9.172C11.6495 8.98 11.9535 8.77733 12.2308 8.564C12.5081 8.35067 12.7215 8.14267 12.8708 7.94H13.9908V18.5H12.7108Z" fill="#fff" />
                            <rect x="0.5" y="0.5" width="24" height="24" rx="12" stroke="#fff" />
                        </svg>
                        <h3 class="ml-10" style="color: #fff;">編輯文章</h3>
                    </div>
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1427_26206)">
                            <path d="M1.2498 15.001C0.929961 15.001 0.609961 14.8789 0.366211 14.6348C-0.12207 14.1465 -0.12207 13.3555 0.366211 12.8672L5.73418 7.50097L0.366211 2.13379C-0.12207 1.64551 -0.12207 0.854492 0.366211 0.366211C0.854492 -0.12207 1.64551 -0.12207 2.13379 0.366211L8.38379 6.61621C8.87207 7.10449 8.87207 7.8955 8.38379 8.38379L2.13379 14.6338C1.88965 14.8799 1.56973 15.001 1.2498 15.001Z" fill="#fff" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1427_26206">
                                <rect width="8.75" height="15.001" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div class="d-flex justify-center align-item-center">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.01994 18.5V17.46C10.0759 16.6813 10.9559 15.9987 11.6599 15.412C12.3746 14.8253 12.9453 14.292 13.3719 13.812C13.7986 13.332 14.1026 12.8787 14.2839 12.452C14.4653 12.0147 14.5559 11.5613 14.5559 11.092C14.5559 10.4627 14.3533 9.956 13.9479 9.572C13.5533 9.17733 13.0093 8.98 12.3159 8.98C11.5906 8.98 11.0093 9.22 10.5719 9.7C10.1346 10.1693 9.8786 10.7987 9.80394 11.588L8.68394 10.916C8.77994 10.2973 8.97727 9.75333 9.27594 9.284C9.58527 8.81467 9.99594 8.44667 10.5079 8.18C11.0306 7.91333 11.6493 7.78 12.3639 7.78C12.9079 7.78 13.3933 7.86 13.8199 8.02C14.2573 8.18 14.6306 8.40933 14.9399 8.708C15.2493 8.996 15.4839 9.34267 15.6439 9.748C15.8146 10.1533 15.8999 10.6013 15.8999 11.092C15.8999 11.7533 15.7399 12.404 15.4199 13.044C15.0999 13.6733 14.5719 14.3347 13.8359 15.028C13.0999 15.7213 12.1026 16.4893 10.8439 17.332V17.348C10.9613 17.3373 11.1213 17.332 11.3239 17.332C11.5373 17.3213 11.7453 17.316 11.9479 17.316C12.1613 17.3053 12.3213 17.3 12.4279 17.3H16.1239V18.5H9.01994Z" fill="#10FFA2" />
                            <rect x="0.5" y="0.5" width="24" height="24" rx="12" stroke="#10FFA2" />
                        </svg>
                        <h3 class="ml-10" style="color: #10FFA2;">預覽文章</h3>
                    </div>
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1427_26206)">
                            <path d="M1.2498 15.001C0.929961 15.001 0.609961 14.8789 0.366211 14.6348C-0.12207 14.1465 -0.12207 13.3555 0.366211 12.8672L5.73418 7.50097L0.366211 2.13379C-0.12207 1.64551 -0.12207 0.854492 0.366211 0.366211C0.854492 -0.12207 1.64551 -0.12207 2.13379 0.366211L8.38379 6.61621C8.87207 7.10449 8.87207 7.8955 8.38379 8.38379L2.13379 14.6338C1.88965 14.8799 1.56973 15.001 1.2498 15.001Z" fill="#fff" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1427_26206">
                                <rect width="8.75" height="15.001" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div class="d-flex justify-center align-item-center">
                        <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.3646 18.66C12.4259 18.66 11.5939 18.4413 10.8686 18.004C10.1539 17.556 9.66861 16.9427 9.41261 16.164L10.6926 15.508C10.8206 15.9027 10.9966 16.2493 11.2206 16.548C11.4446 16.836 11.7379 17.06 12.1006 17.22C12.4739 17.38 12.9379 17.46 13.4926 17.46C13.9619 17.46 14.3566 17.3747 14.6766 17.204C14.9966 17.0333 15.2419 16.804 15.4126 16.516C15.5833 16.2173 15.6686 15.876 15.6686 15.492C15.6686 15.108 15.5939 14.788 15.4446 14.532C15.3059 14.276 15.0819 14.0893 14.7726 13.972C14.4633 13.844 14.0579 13.78 13.5566 13.78C13.4393 13.78 13.3113 13.7853 13.1726 13.796C13.0339 13.796 12.8899 13.8067 12.7406 13.828V12.548C12.8366 12.5587 12.9273 12.564 13.0126 12.564C13.1086 12.564 13.1939 12.564 13.2686 12.564C14.0473 12.564 14.6019 12.4147 14.9326 12.116C15.2633 11.8067 15.4286 11.3267 15.4286 10.676C15.4286 10.1213 15.2579 9.7 14.9166 9.412C14.5753 9.124 14.0899 8.98 13.4606 8.98C12.7886 8.98 12.2766 9.12933 11.9246 9.428C11.5726 9.716 11.2953 10.1107 11.0926 10.612L9.87661 10.036C10.0473 9.588 10.3033 9.19333 10.6446 8.852C10.9859 8.51067 11.3966 8.244 11.8766 8.052C12.3673 7.86 12.9059 7.764 13.4926 7.764C14.2286 7.764 14.8366 7.892 15.3166 8.148C15.7966 8.39333 16.1539 8.724 16.3886 9.14C16.6339 9.556 16.7566 10.0147 16.7566 10.516C16.7566 10.9 16.7033 11.2467 16.5966 11.556C16.4899 11.8547 16.3406 12.116 16.1486 12.34C15.9673 12.564 15.7593 12.7453 15.5246 12.884C15.2899 13.012 15.0393 13.0973 14.7726 13.14V13.172C15.1246 13.1827 15.4339 13.252 15.7006 13.38C15.9779 13.508 16.2126 13.6787 16.4046 13.892C16.5966 14.1053 16.7406 14.3507 16.8366 14.628C16.9433 14.8947 16.9966 15.1773 16.9966 15.476C16.9966 16.0947 16.8419 16.644 16.5326 17.124C16.2339 17.604 15.8126 17.9827 15.2686 18.26C14.7246 18.5267 14.0899 18.66 13.3646 18.66Z" fill="#FFFFFD" />
                            <rect x="1.38867" y="0.5" width="24" height="24" rx="12" stroke="#FFFFFD" />
                        </svg>

                        <h3 class="ml-10">發布文章</h3>
                    </div>
                </div>
                <div class="left__container" style="width: 100%;">
                    <div class="d-flex creater justify-between align-item-center">
                        <div class="d-flex">
                            <div class="d-flex justify-center align-item-center mr-20">
                                <div class="member-img-wrap">
                                    <img src="./img/member/<?php echo $_SESSION['admin']['member_avatar'] ?>" alt="">
                                </div>
                            </div>
                            <div class="d-flex justify-center align-item-center">
                                <h3><?php echo $_SESSION['admin']['member_nickname'] ?></h3>
                            </div>
                        </div>
                        <!-- <div><span>2022年06月07日 發表</span></div> -->
                    </div>
                    <div class="d-flex mt-20 align-item-center">
                        <div class="mr-10">
                            <button class="d-filter d-filter-d forum_type"></button>
                        </div>
                        <h2 class="forum_title"></h2>
                    </div>
                    <div class="mt-20">
                        <div class="content-img-wrap">
                            <img src="./img/forum/2521_a.jpg" alt="" class="forum_image">
                        </div>
                        <div class="forum_content" style="margin: 48px auto;">

                        </div>
                    </div>
                    <!-- <div class="hashtag d-flex mt-30">
                        <ul class="d-flex ar-filter">
                            <li class="filter_4w d-flex justify-center align-item-center">#韓劇心得</li>
                            <li class="filter_4w d-flex justify-center align-item-center ml-10">#2521</li>
                            <li class="filter_3w d-flex justify-center align-item-center ml-10">#南柱赫</li>
                        </ul>
                    </div> -->
                </div>
                <div class="btn-bottom w-100 justify-center d-flex">
                    <button class="btn_4w btn-preview mt-10" style="margin-right: 20px;" onclick="gotopublish()">發布文章</button>
                    <button class="prev_btn_4w delete btn-quit mt-10" style="margin-right: 20px;">繼續編輯</button>
                </div>
            </div>

            <?php include __DIR__ . '/parts/movwe_footer.php' ?>
        </div>

        <script src="./js/Nav.js"></script>
        <script>
            // 拿到前一頁傳過來的
            const fpreview = JSON.parse(window.sessionStorage.getItem('foruminput'));
            console.log(fpreview);

            // 放到dom裡面 type
            $('.forum_type').text(fpreview.type);
            if (fpreview.type == '影劇') {
                $('.forum_type').css({
                    'border': '1px solid #FC6F51',
                    'color': '#FC6F51',
                });
            } else if (fpreview.type == '電影') {
                $('.forum_type').css({
                    'border': '1px solid #10FFA2',
                    'color': '#10FFA2',
                });
            } else if (fpreview.type == '動畫') {
                $('.forum_type').css({
                    'border': '1px solid #1CD8FF',
                    'color': '#1CD8FF',
                });
            };
            // 放到dom裡面 title
            $('.forum_title').text(fpreview.title);
            // image
            $('.forum_image').attr('src', `./img/forum/${fpreview.pic}`);
            // 內文
            document.querySelector('.forum_content').innerHTML = fpreview.content;

            function gotopublish() {
                $.post('api_forum_publish.php', fpreview, function(data) {
                    console.log(data, 'success');
                    if (data.success == true) {
                        location.href = './forum_publish.php'
                    };
                }, 'json');
            };
        </script>
</body>

</html>