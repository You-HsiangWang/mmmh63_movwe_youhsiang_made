(() => {
    // 點擊卡片跑出光箱 顯示卡片詳細
    const ceCoupon = document.querySelectorAll('.point-ce-section_coupon');
    const ceCouponArray = [];
    const ceCouponDetail = document.querySelector('#pointCeSectionLightBox');

    ceCoupon.forEach(element => {
        element.addEventListener('click',function(){
            console.log('link success - click');
        })
    });

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
