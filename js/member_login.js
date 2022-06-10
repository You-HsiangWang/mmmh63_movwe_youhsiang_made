(() => {
    // loading畫面
    // const $loginbtn = $('.login_form_one_continue');
    // const $loadinganimate = $('.login_loading');
    // $loginbtn.on('click', function () {
    //     $loginbtn.css({
    //         'opacity': '1',
    //         'animation-name': 'widthgone',
    //         'animation-timing-function': 'linear',
    //         'animation-duration': '.3s',
    //         'animation-fill-mode': 'forwards',
    //     }).on('animationend', function () {
    //         $loginbtn.css({
    //             'opacity': '0',
    //             'animation-name': '',
    //             'animation-timing-function': '',
    //             'animation-duration': '',
    //             'animation-fill-mode': 'initial',
    //         })
    //     });
    //     setTimeout(function () {
    //         $loadinganimate.removeClass('login_d_none');
    //     }, 280);
    // });

    $('.login_form_keeplogin_btn').on('click', function () {
        if ($('.login_form_keeplogin_btn_toggle').hasClass('login_form_keeplogin_btn_toggle_on')) {
            $('.login_form_keeplogin_btn_toggle').removeClass('login_form_keeplogin_btn_toggle_on');
        } else {
            $('.login_form_keeplogin_btn_toggle').addClass('login_form_keeplogin_btn_toggle_on');
        };
    });

    $('.member_password_status i:nth-child(1)').on('click', function () {
        $('.member_password_status i:nth-child(1)').css('display', 'none');
        $('.member_password_status i:nth-child(2)').css('display', 'block');
        $('#login_form_password_first_password').attr('type', 'text');
    });
    $('.member_password_status i:nth-child(2)').on('click', function () {
        $('.member_password_status i:nth-child(2)').css('display', 'none');
        $('.member_password_status i:nth-child(1)').css('display', 'block');
        $('#login_form_password_first_password').attr('type', 'password');
    });
    $('.register_password_status i:nth-child(1)').on('click', function () {
        $('.register_password_status i:nth-child(1)').css('display', 'none');
        $('.register_password_status i:nth-child(2)').css('display', 'block');
        $('#register_form_psd').attr('type', 'text');
    });
    $('.register_password_status i:nth-child(2)').on('click', function () {
        $('.register_password_status i:nth-child(2)').css('display', 'none');
        $('.register_password_status i:nth-child(1)').css('display', 'block');
        $('#register_form_psd').attr('type', 'password');
    });
    $('.register_password_confirm_status i:nth-child(1)').on('click', function () {
        $('.register_password_confirm_status i:nth-child(1)').css('display', 'none');
        $('.register_password_confirm_status i:nth-child(2)').css('display', 'block');
        $('#register_form_psdconfirm').attr('type', 'text');
    });
    $('.register_password_confirm_status i:nth-child(2)').on('click', function () {
        $('.register_password_confirm_status i:nth-child(2)').css('display', 'none');
        $('.register_password_confirm_status i:nth-child(1)').css('display', 'block');
        $('#register_form_psdconfirm').attr('type', 'password');
    });

    $('.login_form_email_first .login_form_title_discrib a').on('click', function () {
        $('.login_form_container').css({
            'transition': '.3s',
            'transform': 'translateY(-100%)',
            'opacity': '0',
        });
        $('.register_form_container').css({
            'transition': '.3s',
            'transform': 'translateY(-100%)',
            'opacity': '0',
        });
        setTimeout(function () {
            $('.register_form_container').removeClass('login_d_none');
            $('.login_form_container').addClass('login_d_none');
            setTimeout(function () {
                $('.register_form_container').css({
                    'transition': '.3s',
                    'transform': 'translateY(0%)',
                    'opacity': '1',
                });
            }, 100);
        }, 400)
    });

    $('.register_form_wrap .register_form_title_discrib a').on('click', function () {
        $('.register_form_container').css({
            'transition': '.3s',
            'transform': 'translateY(-100%)',
            'opacity': '0',
        });
        $('.login_form_container').css({
            'transition': '.3s',
            'transform': 'translateY(-100%)',
            'opacity': '0',
        });
        setTimeout(function () {
            $('.register_form_container').addClass('login_d_none');
            $('.login_form_container').removeClass('login_d_none');
            setTimeout(function () {
                $('.login_form_container').css({
                    'transition': '.3s',
                    'transform': 'translateY(0%)',
                    'opacity': '1',
                });
            }, 100);
        }, 400)
    })
})();