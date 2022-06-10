<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVWE-測驗結果</title>
    <link rel="icon" href="./img/logo/logo.png">

    <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            box-sizing: border-box;
            color: white;
            /* outline: 1px solid white; */
        }

        html {
            font-size: 10px;
        }

        .cont {
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background-image: url(./img/other/background_image_n.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .board {
            width: 70%;
            /* height: 90%; */
            z-index: 99;
            /* background-color: black; */
            /* border-radius: 20px; */
            /* border: 6px solid goldenrod; */

            margin: 4px;
            /* color: #fff; */
            background-color: #212529;
            /* border-color: #fff; */
            border: 4px solid #fff;
            padding: 1.5rem 2rem;
        }

        
        /* 新版 */
        ._btn {
            position: relative;
            /* z-index: 99; */
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            background-color: black;
            /* padding: 2rem; */
            /* border-radius: 1rem; */
            /* border: 1px solid goldenrod; */
        }

        .bg {
            position: absolute;
        }

        .bg img {
            width: 100%;
        }

        #bgelif {
            width: 10%;
            bottom: 4%;
            left: 0;
            animation-name: bgelif;
            animation-duration: 10s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        #bgelif img {
            animation-name: bgelifimg;
            animation-duration: 10s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        #bgprincess {
            width: 10%;
            bottom: 4%;
            left: 0%;
            /* transform: scaleX(-100%); */
            animation-name: bgprin;
            animation-duration: 20s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        #bgprincess img {
            animation-name: bgprinimg;
            animation-duration: 20s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        @keyframes bgprinimg {
            0% {
                transform: scaleX(-1);
            }

            50% {
                transform: scaleX(-1);
            }

            51% {
                transform: scaleX(1);
            }

            100% {
                transform: scaleX(1);
            }
        }

        @keyframes bgprin {
            0% {
                transform: translateX(-40vw);
            }

            50% {
                transform: translateX(140vw);
            }

            51% {
                transform: translateX(140vw);
            }

            100% {
                transform: translateX(-40vw);
            }
        }

        @keyframes bgelifimg {
            0% {
                transform: scaleX(1);
            }

            50% {
                transform: scaleX(1);
            }

            51% {
                transform: scaleX(-1);
            }

            100% {
                transform: scaleX(-1);
            }
        }

        @keyframes bgelif {
            0% {
                transform: translateX(-40vw);
            }

            50% {
                transform: translateX(140vw);
            }

            51% {
                transform: translateX(140vw);
            }

            100% {
                transform: translateX(-40vw);
            }
        }

        /* ---------------------------- */
        .d-flex {
            display: flex;
        }

        .jc-ai {
            justify-content: flex-start;
            align-items: center;
        }

        .jc-aif {
            justify-content: flex-start;
            align-items: flex-start;
        }

        .c-flex {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

        }

        .ji-ac {
            justify-content: center;
            align-items: flex-start;
        }

        .align-center{
            text-align: center;
        }


        .fg-1 {
            flex-grow: 1;
        }

        .w-40 {
            width: 40%;
        }

        .w-60 {
            width: 60%;
        }

        .w-100 {
            width: 100%;
        }

        .row {
            display: flex;
            /* align-items: center; */
        }

        .mg-t4 {
            margin-top: 4rem;
        }

        .gap-100{
            gap:100px
        }

        .mg-b4 {
            margin-bottom: 4rem;
        }

        .mg-b2 {
            margin-bottom: 2rem;
        }

        .mg-r2 {
            margin-right: 2rem;
        }

        .mg-lr2 {
            margin-left: 2rem;
            margin-right: 2rem;
            display: flex;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.5;
        }

        h3 {
            font-size: 2.4rem;
            line-height: 1.5;
        }

        img {
            border-radius: 10px;
        }
/* 
        button {
            all: unset;
            cursor: pointer;
            padding: .8rem 1.8rem;
            border-radius: 10px;
            background-color: #10FFA2;
            font-size: 1.6rem;
            color: black;
        } */

        /* .tags {
            margin-top: 2rem;
            margin-bottom: 2rem;
        } */

        .tags span {
            padding: .8rem 1.5rem;
            border-radius: 10px;
            font-size: 1.6rem;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 4rem 8rem;
        }

        .title {
            justify-content: flex-start;
            align-items: center;
        }

        .title h3 {
            margin: 0 2rem;
        }

        .board_ott_pic_wrap {
            padding: 2rem 0;
        }

        .board_ott_score_wrap {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding-top: 65.44px;
        }

        .board_ott_score {
            align-items: center;
            margin: 1.6rem;
        }

        .board_bar_gray {
            width: 100%;
            height: .8rem;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, .5);
            overflow: hidden;
        }

        .board_bar_green {
            width: 95%;
            height: 100%;
            background-color: #10FFA2;
        }

        .board_ott_score:nth-child(1) .board_bar_green {
            width: 90%;
        }

        .board_ott_score:nth-child(2) .board_bar_green {
            width: 70%;
        }

        .board_ott_score:nth-child(3) .board_bar_green {
            width: 30%;
        }

        .board_ott_score:nth-child(4) .board_bar_green {
            width: 50%;
        }

        .board_ott_score:nth-child(5) .board_bar_green {
            width: 25%;
        }

        .board_ott_type {
            white-space: nowrap;
            margin: 0 2rem;
        }

        .board_ott_txt {
            margin: 0 2rem;
        }
    </style>
</head>

<body>
    <div class="cont">
        <div class="bg" id="bgelif">
            <img src="./img/other/gif/logo_8bit_gif.gif" alt="">
        </div>
        <div class="bg" id="bgprincess">
            <img src="./img/other/princess.png" alt="">
        </div>
        <div class="board">
            <div class="container w-100">
                <div class="d-flex w-100 jc-aif mg-b2 gap-100">
                    <div class="col w-100">
                        <div class="title d-flex w-100 mg-b2">
                            <img src="./img/icons/stick.svg" alt="">
                            <h3>您的隱藏性格是...</h3>
                        </div>
                        <div class="d-flex ">
                            <div class="">
                                <img src="./img/other/bean.webp" alt="" style="width: 100%;">
                            </div>
                            <div style="display: flex; flex-direction: column;">
                            <div class="c-flex ji-ac">
                                <div class="tags mg-lr2 mg-b4">
                                    <span style="color: #10FFA2; border: 1px solid #10FFA2;">喜劇人格</span>
                                </div>
                            </div>
                            <div class="c-flex ji-ac">
                                
                                <p class="mg-lr2">
                                    喜歡看喜劇片的你，在思想上更有創意、個性也比較外向、大方。在看電影時，喜歡毫無遮攔的哈哈大笑，相對來說也比較沒心機
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col w-100">
                        <div class="title d-flex w-100 mg-b2">
                            <img src="./img/icons/stick.svg" alt="">
                            <h3>推薦影片</h3>
                        </div>
                        <div class="d-flex">
                            <div class="">
                                <img src="./videodb/video/a_100451604_m_601_zh-TW_m9_260_360.webp" alt="" style="height: 242.3px;">
                            </div>
                            <div class="c-flex">
                                <div class="tags mg-lr2">
                                    <span style="color: #FEB73A; border: 1px solid #FEB73A;">電視劇</span>
                                </div>
                                <div class="d-flex mg-lr2 mg-b2">
                                    <img src="./img/logo/netflix_s.svg" alt="" style="width: 20px; border-radius: 0px; margin-right:4px;">
                                    <img src="./img/logo/iqiyi_s.svg" alt="" style="width: 20px; border-radius: 0px;">
                                </div>
                                <p class="mg-lr2 mg-b2">
                                    所以我和黑粉結婚了
                                </p>
                                <!-- <p class="mg-lr2 mg-b2">
                                    改編自同名韓漫《所以我和黑粉結婚了》，世界級K-POP大明星侯俊和極度討厭他的「黑粉」李瑾盈兩人的同居浪漫羅曼史！
                                </p> -->
                                <p class="mg-lr2 mg-b2 d-flex jc-ai align-center">
                                    <i><img src="./img/icons/start.svg" alt=""></i><span>9.5</span><span style="color: rgba(255,255,255,.5); margin-left: 3rem">共16集</span>
                                </p>
                                <div class="mg-lr2">
                                    <!-- 修改 -->
                                    <button class="_btn nes-btn is-warning">更多資訊</button>
                                    <!-- style="color: #10FFA2; background-color: transparent; border: #10FFA2 1px solid;" -->
                                    <button class="btn nes-btn is-warning" >+加入片單</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col w-100">
                    <div class="title d-flex w-100">
                        <img src="./img/icons/stick.svg" alt="">
                        <h3>最適合您使用的平台是...</h3>
                    </div>
                    <div class="row">
                        <div class="board_ott_pic_wrap col c-flex w-40">
                            <img src="./img/logo/iqiyi_s.svg" alt="" style="width: 10%; margin-bottom: 20px;">
                            <img src="./img/other/dqiqiyib.jpeg" alt="" style="width: 100%;">
                        </div>
                        <div class="board_ott_score_wrap col w-60">
                            <div class="board_ott_score d-flex">
                                <p class="board_ott_type w-40">原創獨家影視作品</p>
                                <div class="board_bar_gray">
                                    <div class="board_bar_green"></div>
                                </div>
                            </div>
                            <div class="board_ott_score d-flex">
                                <p class="board_ott_type w-40">歐美影視作品</p>
                                <div class="board_bar_gray">
                                    <div class="board_bar_green"></div>
                                </div>
                            </div>
                            <div class="board_ott_score d-flex">
                                <p class="board_ott_type w-40">日本影視作品</p>
                                <div class="board_bar_gray">
                                    <div class="board_bar_green"></div>
                                </div>
                            </div>
                            <div class="board_ott_score d-flex">
                                <p class="board_ott_type w-40">韓國影視作品</p>
                                <div class="board_bar_gray">
                                    <div class="board_bar_green"></div>
                                </div>
                            </div>
                            <div class="board_ott_score d-flex">
                                <p class="board_ott_type w-40">華語影視作品</p>
                                <div class="board_bar_gray">
                                    <div class="board_bar_green"></div>
                                </div>
                            </div>
                            <!-- <div class="board_ott_score d-flex">
                                <p class="board_ott_txt">北京愛奇藝科技有限公司是百度集團旗下的視訊網站平台，並同時經營內容製作及分銷，截止2019年，主要服務地區為中國大陸、香港、澳門、 台灣、馬來西亞、新加坡、緬甸、泰國、柬埔寨、菲律賓和印尼。愛奇藝為2021年中國市場份額最大的五個影音平台之一。</p>
                                <div class="board_bar_gray">
                                    <div class="board_bar_green"></div>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
                <div class="row mg-t4">
                    <button class="_btn nes-btn is-warning" onclick="location.href='index_home.php'">回首頁</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>