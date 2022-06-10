(() => {
    // 綁定filterbtn點擊後要觸發的功能 filterApi---------------------------------------
    const filterBtns = document.querySelectorAll('.filter_function');
    for (let i = 0; i < filterBtns.length; i++) {
        filterBtns[i].addEventListener('click', filterActive);
    };

    // 切換filterbtn active的狀態 並呼叫filterGetData--------------------------------
    function filterActive() {
        if(!$('.home__text__box').hasClass('home_d_none')){
            $('.home__text__box').addClass('home_d_none');
        };

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
                $('.home__text__box').removeClass('home_d_none');
                return;
            };
        }
        // 原本不active
        else if ($(this).hasClass('ff_plat') && !$(this).hasClass('filterActive')) {
            $(this).addClass('filterActive');
            filterGetData(pagestart, pagesize, scrollfunc);
            if (!$('.filter_function').hasClass('filterActive')) {
                $('#ottFilterSearchFunc').addClass('filter_d_none');
                $('.home__text__box').removeClass('home_d_none');
                console.log('filter工程生退');
                return;
            };
        }
        // 1-2.判斷其他單選btn 被點擊的active狀態 原本active
        else if ($(this).hasClass('ff_genr filterActive') || $(this).hasClass('ff_plac filterActive') || $(this).hasClass('ff_styl filterActive')) {
            $(this).removeClass('filterActive');
            filterGetData(pagestart, pagesize, scrollfunc);
            if (!$('.filter_function').hasClass('filterActive')) {
                $('#ottFilterSearchFunc').addClass('filter_d_none');
                $('.home__text__box').removeClass('home_d_none');
                console.log('filter工程生退');
                return;
            };
        }
        // 原本不active
        else if (($(this).hasClass('ff_genr') || $(this).hasClass('ff_plac') || $(this).hasClass('ff_styl')) && !$(this).hasClass('filterActive')) {
            $(this).addClass('filterActive');
            $(this).siblings().removeClass('filterActive');
            filterGetData(pagestart, pagesize, scrollfunc);
            if (!$('.filter_function').hasClass('filterActive')) {
                $('#ottFilterSearchFunc').addClass('filter_d_none');
                $('.home__text__box').removeClass('home_d_none');
                console.log('filter工程生退');
                return;
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