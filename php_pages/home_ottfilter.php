<?php

require './parts/movwe_connect_db.php';

?>

<?php include __DIR__ . '/parts/movwe_head.php'; ?>
<link rel="stylesheet" href="./css/Home.css">
<link rel="stylesheet" href="./css/filter.css">
<link rel="stylesheet" href="./css/Carousel_1.css">
<script src="./js/jquery-3.6.0.js"></script>
<!-- <style>
    #ottFilterSearchFunc {
        display: flex;
        flex-wrap: wrap;
    }

    #ottFilterSearchFunc .filter__card {
        flex-shrink: 0;
        padding: 0;
        margin: 0 0.14% 40px 0.14%;
    }
    #ottFilterSearchFunc .no-article{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    #ottFilterSearchFunc .no-article-pic{
        width: 10%;
        height: 10%;
        margin-bottom: 1rem;
    }
    #ottFilterSearchFunc .no-article-pic img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    #ottFilterSearchFunc .no-article-word{
        color: white;
        font-size: 1.5rem;
    }
    #ottFilterSearchFunc .information__actor__name{
        white-space: nowrap;
    }
    #ottFilterSearchFunc .filter__card .information__bottom_5{
        width: 100%;
        overflow: hidden;
        flex-wrap: wrap;
    }
    /* .filter__card .information__bottom_5 a p{
        width: 100%;
        flex-shrink: 1;
        text-overflow: ellipsis;
    } */
    #ottFilterSearchFunc.filter_d_none{
        display: none;
    }
</style> -->
</head>

<body>
    <!----------nav_top-------------->

    <!--text__container------內容放這邊------------->

    <div class="text__container">
        <div class="index_filter">
            <div class="ott_platform">
                <div class="ott_platform_title">
                    <span>平台 / </span>
                </div>
                <ul class="platform">
                    <button class="filter_2w platform__1 filter_function ff_plat" data-filter='1'>Netflix
                    </button>
                    <button class="filter_2w platform__2 filter_function ff_plat" data-filter='2'>iQiYi
                    </button>
                    <button class="filter_2w platform__3 filter_function ff_plat" data-filter='3'>KKTV
                    </button>
                    <button class="filter_2w platform__4 filter_function ff_plat" data-filter='4'>Friday
                    </button>
                </ul>
            </div>
            <div class="genre">
                <div class="genre_title">
                    <span>類別 / </span>
                </div>
                <ul class="genre_item">
                    <button class="filter_2w genre_item__1 filter_function ff_genr" data-filter='1'>電影
                    </button>
                    <button class="filter_2w genre_item__2 filter_function ff_genr" data-filter='2'>電視劇
                    </button>
                    <button class="filter_2w genre_item__3 filter_function ff_genr" data-filter='3'>綜藝
                    </button>
                    <button class="filter_2w genre_item__4 filter_function ff_genr" data-filter='4'>動畫
                    </button>
                </ul>
            </div>
            <ul class="browse-filters">
                <li class="browse-filter">
                    <div class="browse-filter-title">
                        <span>地區 /</span>
                    </div>
                    <ul class="browse-filter-items">
                        <button class="browse-filter-item filter_2w browse_item__1 filter_function ff_plac" data-filter='1'>
                            韓國
                        </button>
                        <button class="browse-filter-item filter_2w browse_item__2 filter_function ff_plac" data-filter='2'>
                            日本
                        </button>
                        <button class="browse-filter-item filter_2w browse_item__3 filter_function ff_plac" data-filter='3'>
                            歐美
                        </button>
                        <button class="browse-filter-item filter_2w browse_item__4 filter_function ff_plac" data-filter='4'>
                            台灣 </button>
                        <button class="browse-filter-item filter_2w browse_item__5 filter_function ff_plac" data-filter='5'>
                            中國 </button>
                    </ul>
                </li>
                <li class="browse-filter">
                    <div class="browse-filter-title">
                        <span>風格 /</span>
                    </div>
                    <ul class="browse-filter-items">
                        <button class="browse-filter-item filter_2w style_item__1 filter_function ff_styl" data-filter='1'>
                            浪漫愛情</button>
                        <button class="browse-filter-item filter_2w style_item__2 filter_function ff_styl" data-filter='2'>
                            輕鬆喜劇</button>
                        <button class="browse-filter-item filter_2w style_item__3 filter_function ff_styl" data-filter='3'>
                            劇情文藝</button>
                        <button class="browse-filter-item filter_2w style_item__4 filter_function ff_styl" data-filter='4'>
                            青春校園</button>
                        <button class="browse-filter-item filter_2w style_item__5 filter_function ff_styl" data-filter='5'>
                            奇幻冒險</button>
                        <button class="browse-filter-item filter_2w style_item__6 filter_function ff_styl" data-filter='6'>
                            科技未來</button>
                        <button class="browse-filter-item filter_2w style_item__7 filter_function ff_styl" data-filter='7'>
                            犯罪動作</button>
                        <button class="browse-filter-item filter_2w style_item__8 filter_function ff_styl" data-filter='8'>
                            懸疑推理</button>
                        <button class="browse-filter-item filter_2w style_item__9 filter_function ff_styl" data-filter='9'>
                            靈異驚悚</button>

                    </ul>
                </li>
            </ul>
        </div>

        <!------篩選後_BOX----------------------------------->
        <div class="Filter__text__box filter_d_none" id="ottFilterSearchFunc">
        </div>

    </div>

    <!-- <script src="./js/Carousel_1.js"></script> -->
    <script src="./js/Filter.js"></script>
    /*
    <script>
        (() => {
            // 綁定filterbtn點擊後要觸發的功能 filterApi---------------------------------------
            const filterBtns = document.querySelectorAll('.filter_function');
            for (let i = 0; i < filterBtns.length; i++) {
                filterBtns[i].addEventListener('click', filterActive);
            };

            // 切換filterbtn active的狀態 並呼叫filterGetData--------------------------------
            function filterActive() {
                // 頁面歸零
                counter = 0;
                // size
                pagesize = 10;
                // offset 起始點
                pagestart = 0;
                // 結束標誌
                isend = false;
                // 正在ajax
                isajax = false;
                // remove displaynone
                $('#ottFilterSearchFunc').removeClass('filter_d_none');
                let scrollfunc = false;
                // 將btn拆成4列 第一列多選
                // 1-1.判斷ott平台btn 被點擊的active狀態 原本active
                if ($(this).hasClass('ff_plat filterActive')) {
                    $(this).removeClass('filterActive');
                    filterGetData(pagestart, pagesize, scrollfunc);
                    if (!$('.filter_function').hasClass('filterActive')) {
                        $('#ottFilterSearchFunc').addClass('filter_d_none');
                        console.log('filter工程生退');
                        return;
                    };
                }
                // 原本不active
                else if ($(this).hasClass('ff_plat') && !$(this).hasClass('filterActive')) {
                    $(this).addClass('filterActive');
                    filterGetData(pagestart, pagesize, scrollfunc);
                    if (!$('.filter_function').hasClass('filterActive')) {
                        $('#ottFilterSearchFunc').addClass('filter_d_none');
                        console.log('filter工程生退');
                        exit;
                    };
                }
                // 1-2.判斷其他單選btn 被點擊的active狀態 原本active
                else if ($(this).hasClass('ff_genr filterActive') || $(this).hasClass('ff_plac filterActive') || $(this).hasClass('ff_styl filterActive')) {
                    $(this).removeClass('filterActive');
                    filterGetData(pagestart, pagesize, scrollfunc);
                    if (!$('.filter_function').hasClass('filterActive')) {
                        $('#ottFilterSearchFunc').addClass('filter_d_none');
                        console.log('filter工程生退');
                        exit;
                    };
                }
                // 原本不active
                else if (($(this).hasClass('ff_genr') || $(this).hasClass('ff_plac') || $(this).hasClass('ff_styl')) && !$(this).hasClass('filterActive')) {
                    $(this).addClass('filterActive');
                    $(this).siblings().removeClass('filterActive');
                    filterGetData(pagestart, pagesize, scrollfunc);
                    if (!$('.filter_function').hasClass('filterActive')) {
                        $('#ottFilterSearchFunc').addClass('filter_d_none');
                        console.log('filter工程生退');
                        exit;
                    };
                };
            };
            // 將filterbtn拆成四組 判斷情況每一行activebtn的數量 1.都沒有就返回預設 2.有任一個 取得data-值 並呼叫api----------------------------------------------------------------------------
            function filterGetData(offset, size, bool) {
                // 宣告變數 拿到4個row 全部有active的btn
                const fPlat = document.querySelectorAll('.ff_plat.filterActive.filter_function');
                const fGenre = document.querySelectorAll('.ff_genr.filterActive.filter_function');
                const fPlace = document.querySelectorAll('.ff_plac.filterActive.filter_function');
                const fStyle = document.querySelectorAll('.ff_styl.filterActive.filter_function');
                // 宣告儲存data-filter的變數 用來送值到api
                let fPlatArray = [];
                let dPlarData;
                let fGenrData;
                let fPlacData;
                let fStylData;
                // 宣告傳去api的物件 
                let fDataObj = {};

                // 若四個row都返回空陣列 => 返回初始狀態 
                if (fPlat.length == 0 && fGenre.length == 0 && fPlace.length == 0 && fStyle.length == 0) {
                    // display none filter
                    // display block 
                    console.log('返回初始狀態');
                    fDataObj = {
                        "f_ott": 0,
                        "f_genre": 0,
                        "f_place": 0,
                        "f_style": 0,
                        "pagestart": offset,
                        "pagesize": size,
                    };
                    (bool == true) ? filterApiscroll(fDataObj): filterApi(fDataObj);
                } else {
                    console.log('要呼叫api');
                    // 先判斷是否沒有被點擊
                    if (fPlat.length != 0) {
                        // ottbtn 特別多選 要傳陣列 
                        for (let i1 = 0; i1 < fPlat.length; i1++) {
                            // 拿到data-filter
                            fPlatData = fPlat[i1].getAttribute('data-filter');
                            // 傳這個到api
                            fPlatArray.push(fPlatData);
                        };
                    } else {
                        fPlatArray = '0';
                    };

                    // 其餘三個直接拿陣列的第一個 data-filter 若有被點擊拿data 若沒有拿0
                    fGenrData = (fGenre.length != 0) ? fGenre[0].getAttribute('data-filter') : '0';
                    fPlacData = (fPlace.length != 0) ? fPlace[0].getAttribute('data-filter') : '0';
                    fStylData = (fStyle.length != 0) ? fStyle[0].getAttribute('data-filter') : '0';

                    //f_ott陣列裡面放數字 其他都是數字
                    fDataObj = {
                        "f_ott": fPlatArray,
                        "f_genre": fGenrData,
                        "f_place": fPlacData,
                        "f_style": fStylData,
                        "pagestart": offset,
                        "pagesize": size,
                    };
                    // console.log(fPlatArray, fGenrData, fPlacData, fStylData, fDataObj);
                    // 呼叫傳送api 把obj傳過去
                    (bool == true) ? filterApiscroll(fDataObj): filterApi(fDataObj);
                };
            };
            // 傳給api然後對api回傳的內容做壞壞的事---------------------------------------------
            function filterApi(par) {
                console.log('get', par);
                $.get('api_home_ottfilter.php', par, function(data) {
                    if(data == ''){
                        const noresult = '<div class="no-article" style="display: flex"><div class="no-article-pic"><img src="./img/talls_img/crying.gif"></div><div class="no-article-word">"資料庫修建中，僅請期待"</div></div>';
                        $('#ottFilterSearchFunc').html(noresult);
                        isend = true;
                        return;
                    };
                    $('#ottFilterSearchFunc').html(data);
                }, 'text');
                /*
                            $.ajax({
                                type: 'get',
                                url: 'api_home_ottfilter.php',
                                async: true,
                                cache: false,
                                dataType: 'json',
                                data: par,
                                success: function(){
                                    console.log('success');
                                },
                                error: function(){
                                    console.log('error');
                                },
                                complete: function(){
                                    console.log('complete');
                                },
                            }).done(function(data){
                                console.log('done');
                                console.log(data);
                                $('#ottFilterSearchFunc').html(data.dom);
                            });
                            */
            };
            function filterApiscroll(par) {
                console.log('get', par);
                $.get('api_home_ottfilter.php', par, function(data) {
                    setTimeout(function(){
                        $('#ottFilterSearchFunc').append(data);
                        isajax = false;
                    }, 1000)
                }, 'text');
            };

            // 往下滑時觸發loading-----------------------------------------------------------
            // 初始化
            // 計數器
            let counter = 0;
            // size
            let pagesize = 10;
            // offset 起始點
            let pagestart = 0;
            // 結束標誌
            let isend = false;
            // 正在ajax
            let isajax = false;

            function scrollLoad() {
                // 沒有顯示不要做
                if ($('#ottFilterSearchFunc').hasClass('filter_d_none')) {
                    console.log('沒有顯示不能做');
                    return;
                };

                // 正在ajax或到底了 不要繼續做
                if (isend == true || isajax == true) {
                    console.log('ajax中 or 到底了');
                    return
                }

                // 滾到底部時，載入新內容
                if ($(window).scrollTop() + $(window).height() > $('#ottFilterSearchFunc').height()) {
                    counter++;
                    // pagesize += 10;
                    pagestart = counter * pagesize;
                    console.log('getnew片', pagestart, pagesize);
                    let scrollfunc = true;
                    filterGetData(pagestart, pagesize, scrollfunc);
                    isajax = true;
                }
            };

            // loading時給預設值
            const fDefaultObj = {
                "f_ott": '0',
                "f_genre": '0',
                "f_place": '0',
                "f_style": '0',
                "pagestart": 0,
                "pagesize": 10,
            };
            filterApi(fDefaultObj);
            $(window).scroll(scrollLoad);

        })();


        // let wheight;
        // let wsctop;
        // window.addEventListener('scroll', scrollLoad);

        // function scrollLoad() {
        //     wheight = $(window).height();
        //     wsctop = $(window).scrollTop();
        //     console.log(wheight, wsctop);
        //     if (wsctop * 12 > wheight) {
        //         filterGetData();
        //     };
        // };
    </script>
    

</body>

</html>