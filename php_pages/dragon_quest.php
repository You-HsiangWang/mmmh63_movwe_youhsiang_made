<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVWE-心理測驗</title>
    <link rel="icon" href="./img/logo/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />

    <script src="./js/jquery-3.6.0.js"></script>



    <style>
        * {
            margin: 0;
            box-sizing: border-box;
            color: white;
            font-family: 'DotGothic16', sans-serif;
            font-size: 20px;
            /* outline: 1px solid yellowgreen; */
        }

        body {
            background-color: rgb(0, 0, 0);
        }

        /* 新增 */
        p {
            margin-bottom: 0;
        }

        /* 新增 */
        .d_none {
            display: none;
        }

        .pd_lr_20 {
            padding: 0 40px;
        }

        .fs {
            width: 100%;
            height: 100vh;
        }

        .slogan {
            font-size: 3rem;
            transition: 3s;
        }

        /* 新增 */
        .b_border {
            /* position: relative; */
            margin: 4px;
            /* color: #fff; */
            background-color: #212529;
            /* border-color: #fff; */
            border: 4px solid #fff;
            padding: 1.5rem 2rem;
        }

        .bgi {
            position: fixed;
            top: 0;
            left: 0;
            background: url(./img/other/background_image_n.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        #tableShutter {
            pointer-events: none;
            border-collapse: collapse;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 99;
        }

        #tableShutter td {
            background-color: transparent;
            transition: 1s;
        }

        .sceen_one {
            position: absolute;
            top: 0;
            left: 0;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: 4s;
        }

        .sceen_two {
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sceen_three {
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden;
            background-image: url(./img/other/background_image_n.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            animation-duration: 3s;
            animation-timing-function: linear;
            animation-fill-mode: forwards;
        }

        .sceen_three_bgtrain {
            height: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: nowrap;
            transition: .1s;
            transition-timing-function: linear;
            transform: translateX(0%);
        }

        .sceen_three_bgs {
            width: 100%;
            height: 100%;
            background-image: url(./img/other/background_image_transparent_n.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            flex-shrink: 0;
            position: relative;
        }

        .sceen_four {
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99;
        }

        /* 舊版 */
        /* .sceen_four p {
            background-color: black;
            padding: 2rem;
            border-radius: 1rem;
            border: 1px solid goldenrod;
        } */

        /* 新增 */
        .sceen_four p {
            /* background-color: black; */
            padding: 2rem;
            /* border-radius: 1rem; */
            /* border: 1px solid goldenrod; */
            /* position: relative; */
            margin: 4px;
            background-color: #212529;
            border: 4px white solid;
        }

        .sceen_five {
            position: absolute;
            top: 0;
            left: 0;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            /* transition: 4s; */
        }

        /* 舊版 */
        /* .slogan_btn {
            position: relative;
            z-index: 99;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            background-color: black;
            padding: 2rem;
            border-radius: 1rem;
            border: 1px solid goldenrod;
        } */

        /* 新版 */
        .slogan_btn {
            position: relative;
            /* z-index: 99; */
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            background-color: black;
            padding: 2rem;
            /* border-radius: 1rem; */
            /* border: 1px solid goldenrod; */
        }

        .heart {
            position: absolute;
            top: 5px;
            right: 5px;
            /* transform: translateX(0%); */
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
        }

        .heart img {
            width: 25%;
            flex-shrink: 1;
            transition: .5s;
        }

        .elif {
            position: absolute;
            left: 10%;
            bottom: 8.5%;
            width: 20%;
            transform: translateX(-30vw);
            transition: 2s;
            transition-timing-function: cubic-bezier(.29, .75, .68, .99);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            animation-duration: 1s;
            animation-timing-function: linear;
        }

        .elif img {
            margin-top: 20px;
            width: 60%;
            animation-duration: 3s;
            animation-timing-function: linear;
            /* animation-name: shock; */
        }

        .fireball {
            position: absolute;
            left: 10%;
            bottom: 8.5%;
            width: 8%;
            transform: translate(0, 0);
            transition: 1s;
            transition-timing-function: cubic-bezier(.29, .75, .68, .99);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .fireball img {
            width: 100%;
        }

        .dragon {
            position: absolute;
            right: 10%;
            bottom: 10%;
            width: 35%;
            transform: translateX(0vw);
            transition: 2s;
            transition-timing-function: cubic-bezier(.29, .75, .68, .99);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            animation-duration: 1.5s;
            animation-timing-function: linear;
        }

        .dragon img {
            width: 100%;
            transform: scaleX(100%);
        }

        .princess {
            position: absolute;
            right: 5%;
            bottom: 10%;
            width: 10%;
            transform: translateX(0vw);
            transition: 2s;
            transition-timing-function: cubic-bezier(.29, .75, .68, .99);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .princess img {
            width: 100%;
        }

        /* 舊版 */
        /* .btn {
            background-color: chocolate;
            position: absolute;
            right: 10%;
            bottom: 10%;
            padding: 20px;
            border-radius: 30px;
        } */
        /* 新版 */
        .btn {
            /* background-color: chocolate; */
            position: absolute;
            right: 10%;
            bottom: 10%;
            /* padding: 20px; */
            /* border-radius: 30px; */
        }

        #btnTwo {
            position: relative;
            right: 0;
            bottom: 0;
        }

        /* 舊版 */
        /* .conver_box {
            border: 2px solid rgb(174, 131, 21);
            border-radius: 20px;
            background-color: rgb(36, 35, 35);
            transition: .2s;
        } */

        /* 新版 */
        .conver_box {
            /* border: 2px solid rgb(174, 131, 21);
            border-radius: 20px;
            background-color: rgb(36, 35, 35); */
            transition: .2s;
        }

        /* 改寫 */
        .conver_sation {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            width: 100%;
            /* 移除 */
            /* height: 100px;
            padding: 20px; */
        }

        .fightbox_boss {
            width: 30%;
            position: absolute;
            right: 10%;
            top: 20%;
        }

        .fightbox_elif {
            width: 30%;
            position: absolute;
            left: 10%;
            top: 10%;
        }

        @keyframes shock {
            0% {
                transform: scale(1) rotate(-10deg);
            }

            5% {
                transform: scale(1.115) rotate(-30deg);
            }

            10% {
                transform: scale(1.25) rotate(-30deg);
            }

            20% {
                transform: scale(1.5) rotate(-30deg);
            }

            40% {
                transform: scale(1) rotate(-30deg);
            }

            60% {
                transform: scale(1.5) rotate(-30deg);
            }

            80% {
                transform: scale(1) rotate(-30deg);
            }

            100% {
                transform: scale(1) rotate(-30deg);
            }
        }

        @keyframes intofight {
            0% {
                transform: scale(1);
                filter: brightness(1);
            }

            15% {
                transform: scale(2) rotate(10deg);
                filter: brightness(0);
            }

            30% {
                transform: scale(1) rotate(0deg);
                filter: brightness(1);
            }

            40% {
                transform: scale(2) rotate(-10deg);
                filter: brightness(0);
            }

            50% {
                transform: scale(1) rotate(0deg);
                filter: brightness(1);
            }

            58% {
                transform: scale(2) rotate(10deg);
                filter: brightness(0);
            }

            66% {
                transform: scale(1) rotate(0deg);
                filter: brightness(1);
            }

            70% {
                transform: scale(2) rotate(-10deg);
                filter: brightness(0);
            }

            74% {
                transform: scale(1) rotate(0deg);
                filter: brightness(1);
            }

            80% {
                transform: scale(2) rotate(10deg);
                filter: brightness(0);
            }

            100% {
                transform: scale(2.5) rotate(0deg);
                filter: brightness(1);
            }
        }

        @keyframes beenhit {
            0% {
                opacity: 1;
                transform: scale(1) translateX(0);
            }

            10% {
                opacity: .5;
                transform: scale(1.1) translateX(-20px);
            }

            20% {
                opacity: 0;
                transform: scale(1) translateX(0px);
            }

            30% {
                opacity: .5;
                transform: scale(.9) translateX(30px);
            }

            40% {
                opacity: 1;
                transform: scale(1) translateX(0);
            }

            50% {
                opacity: .5;
                transform: scale(1.1) translateX(-20px);
            }

            60% {
                opacity: 0;
                transform: scale(1) translateX(0px);
            }

            70% {
                opacity: .5;
                transform: scale(.9) translateX(30px);
            }

            80% {
                opacity: 1;
                transform: scale(1) translateX(0);
            }

            90% {
                opacity: .5;
                transform: scale(1.1) translateX(-20px);
            }

            100% {
                opacity: 1;
                transform: scale(1) translateX(0);
            }

            ;
        }

        @keyframes shotfire {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.3);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes dragonend {
            0% {
                opacity: 1;
                transform: scale(1) translateX(0);
            }

            10% {
                opacity: .5;
                transform: scale(1.1) translateX(-20px);
            }

            20% {
                opacity: 0;
                transform: scale(1) translateX(0px);
            }

            30% {
                opacity: .5;
                transform: scale(.9) translateX(30px);
            }

            40% {
                opacity: 1;
                transform: scale(1) translateX(0);
            }

            50% {
                opacity: .5;
                transform: scale(1.1) translateX(-20px);
            }

            60% {
                opacity: 0;
                transform: scale(1) translateX(0px);
            }

            70% {
                opacity: .5;
                transform: scale(.9) translateX(30px);
            }

            75% {
                opacity: 1;
                transform: scale(1) translateX(0);
            }

            80% {
                opacity: .5;
                transform: scale(1.1) translateX(-20px);
            }

            85% {
                opacity: 1;
                transform: scale(.9) translateX(0);
            }

            ;

            90% {
                opacity: .5;
                transform: scale(.7) translate(30px, -30px);
            }

            95% {
                opacity: .25;
                transform: scale(.4) translateX(15px, -60px);
            }

            99% {
                opacity: 0;
                transform: scale(.1) translateX(0px);
            }

            100% {
                opacity: 0;
                transform: scale(1) translateX(0px);
            }
        }
    </style>
</head>

<body>
    <div class="bgi fs" id="bgi">
        <!-- 第五幕 結算結果 -->
        <div class="sceen_six fs" id="sceen_six" style="display: none;">

        </div>
        <!-- 第四幕 結算畫面 -->
        <div class="sceen_five fs" id="sceen_five" style="display: none;">
            <!-- slogan放這裡 -->
            <!-- <p class="slogan" id="resultOne" style="display: none;">恭喜你完成遊戲</p> -->
            <p class="slogan" id="resultTwo" style="display: none;">根據你遊戲中的表現...</p>
            <!-- <button id="btnResult" class="btnre" style="display: none;">回首頁</button> -->
            <!-- 下方show 上方準備 -->
            <div id="resultLogo" style="display: none; width: 20%;"><img src="./img/logo/logo_8bit.svg" alt="" style="width: 100%;"></div>
            <p class="slogan" id="showResultOne">恭喜你完成遊戲</p>
            <p class="slogan" id="showResultTwo" style="font-size: 1.5rem"></p>
        </div>
        <!-- 第三幕 打架拉 -->
        <div class="sceen_four fs" id="sceen_four" style="display: none;">
            <!-- slogan放這裡 -->
            <p class="slogan" id="sloganTentwo" style="display: none;">回答巨龍的問題，答對即可發射火球攻擊！</p>
            <p class="slogan" id="sloganTenthree" style="display: none;">FIGHT!</p>

            <!-- 下方show -->
            <!-- nes-container is-dark is-centered -->
            <div class="slogan_btn nes-container is-dark is-centered" id="sloganBtnOne">
                <h6 class="slogan" id="showSloganTentwo" style="display: none;"></h6>
                <!-- nes-btn is-warning -->
                <button class="btn nes-btn is-warning" id="btnTwo" style="display: none; z-index: 99;">戰鬥</button>
            </div>
            <p class="slogan" id="showSloganTenthree" style="display: none; z-index: 99;">FIGHT!</p>
            <p class="slogan" id="showSloganTenfour" style="display: none; z-index: 99;">ATTACK!</p>
            <div class="heart" id="heart" style="display: none; z-index: 99;">
                <img src="./img/other/heart.png" alt="heart1" id="heart1">
                <img src="./img/other/heart.png" alt="heart2" id="heart2">
                <img src="./img/other/heart.png" alt="heart3" id="heart3">
                <img src="./img/other/heart.png" alt="heart4" id="heart4">
            </div>
            <div class="fightbox_boss" style="z-index: 99;">

            </div>
            <div class="fightbox_elif" style="z-index: 99;">

            </div>
        </div>
        <!-- 第二.5幕 出發找龍 -->
        <div class="sceen_three fs" id="sceen_three">
            <div class="sceen_three_bgtrain" id="sceenThreeBgtrain">
                <div class="sceen_three_bgs"></div>
                <div class="sceen_three_bgs"></div>
                <div class="sceen_three_bgs">
                    <div class="dragon" id="bosschar">
                        <!-- nes-balloon is-dark -->
                        <div class="conver_box nes-balloon is-dark" id="conversation" style="display: none;">
                            <div class="conver_sation ">
                                <p id="sloganTen">哈哈哈，小精靈你終於來了</p>
                                <p id="sloganTenone" style="display: none;">想救公主的話就先答對所有問題打敗我!!!</p>
                            </div>
                        </div>
                        <img src="./img/other/dragon.webp" alt="dragon">
                    </div>
                    <div class="princess" id="princesschar">
                        <!-- nes-balloon is-dark -->
                        <div class="conver_box nes-balloon is-dark" id="conversation">
                            <div class="conver_sation">
                                <p id="sloganHelp">help!!!</p>
                            </div>
                        </div>
                        <img src="./img/other/princess.png" alt="princess">
                    </div>
                </div>
            </div>
        </div>
        <!-- 第二幕 黑背景切有色背景-->
        <div class="sceen_two fs" id="sceen_two">
            <!-- slogan放這裡 -->
            <!-- nes-container is-dark is-centered -->

            <p class="slogan" id="sloganThree" style="display: none;">小精靈踏上了拯救公主的旅程!!!</p>

            <!-- 下方show -->
            <p class="slogan b_border d-none" id="showSloganThree">（準備中...）</i></p>
        </div>
        <!-- 第一幕 slogan介紹故事背景-->
        <div class="sceen_one fs" id="sceen_one">
            <!-- slogan放這裡 -->
            <p class="slogan" id="sloganOne" style="display: none;">從前從前，在精靈國度有一位被巨龍囚禁的公主...</p>
            <p class="slogan" id="sloganTwo" style="display: none;">有天，MOVWE小精靈收到了公主的求救信...</p>
            <!-- nes-btn is-warning -->
            <button id="btnOne" class="btn nes-btn is-warning" style="display: none;">繼續...</button>
            <!-- 下方show 上方準備 -->
            <p class="slogan" id="showSloganOne"></p>
            <p class="slogan" id="showSloganTwo"></p>
        </div>

        <!-- 主角 -->
        <div class="elif" id="mainChar">
            <!-- nes-balloon is-dark -->
            <div class="conver_box nes-balloon is-dark" id="conversationElif">
                <div class="conver_sation">
                    <p id="sloganFour">press -></p>
                    <p id="sloganFive" style="display: none;">公主！我來救你了！</p>
                    <p id="sloganSix" style="display: none;">不過，巨龍那麼強...我該怎麼打敗他？</p>
                    <p id="sloganSeven" style="display: none;">他一定有什麼弱點才對</p>
                    <p id="sloganEight" style="display: none;">聽說他很愛宅在家看劇...</p>
                    <p id="sloganNine" style="display: none; font-size: 3rem;">!!!</p>
                    <p id="sloganLast" style="display: none;">哈哈哈！小事啦，讚的</p>
                </div>
            </div>
            <img src="./img/other/gif/logo_8bit_gif.gif" alt="cat">
        </div>
        <div class="dragon" id="bosscharAll" style="display: none;">
            <!-- nes-balloon is-dark -->
            <div class="conver_box nes-balloon is-dark" id="conversation" style="display: none;">
                <div class="conver_sation">
                </div>
            </div>
            <img src="./img/other/dragon.webp" alt="dragon">
        </div>
        <div class="fireball" id="fireball" style="display: none;">
            <img src="./img/other/fireball.png" alt="fireball">
        </div>
        <div class="princess" id="princesscharAll" style="display: none;">
            <!-- nes-balloon is-dark -->
            <div class="conver_box nes-balloon is-dark " id="conversation" style="display: none">
                <div class="conver_sation ">
                    <p id="sloganHelp">help!!!</p>
                </div>
            </div>
            <img src="./img/other/princess.png" alt="princess">
        </div>
    </div>
    <table class="fs" id="tableShutter">
    </table>

    <script src="./js/dragon.js"></script>
</body>

</html>