(() => {
    function debounce(func, delay = 10) {
        let timer = null;

        return () => {
            let context = this;
            let args = arguments;

            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(context, args);
            }, delay)
        }
    };


    const slideboxs = document.querySelectorAll('.p_slide-in');
    let wHeight;
    let dheight;
    let wtop;
    let dtop;


    window.addEventListener('scroll', debounce(scrollscrolladd));
    let oldsctop = $(window).scrollTop();

    function scrollscrolladd (){
        if ($(window).width() >= 750) {
            let newsctop = $(window).scrollTop();
            for (let i = 0; i < slideboxs.length; i++) {
                wHeight = $(window).height();
                dheight = $(slideboxs[i]).height();
                dtop = $(slideboxs[i]).offset().top;
                wtop = $(window).scrollTop();
                console.log(wHeight, dheight, wtop);

                // 滑动页面的底部距离扣除图片一半的高
                const slideInAt = (wtop + wHeight) - dheight / 2;
                // 图片底部距离顶端的距离
                const imgBottom = dtop + dheight;
                // 已滑过了图片的一半
                const isHalfShow = slideInAt > dtop;
                // 未完全滑过图片
                const isNotScrollPast = wtop < imgBottom;
                if (isHalfShow && isNotScrollPast) {
                    $(slideboxs[i]).addClass('p-slide-active');
                    console.log('滑');
                }else if(newsctop < oldsctop && !(isHalfShow)){
                    $(slideboxs[i]).removeClass('p-slide-active');
                    console.log('不滑');
                };
            };
            oldsctop = $(window).scrollTop();
        };
    };

    scrollscrolladd ();
})();