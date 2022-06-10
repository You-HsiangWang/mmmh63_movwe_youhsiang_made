// shutter轉場
function shutter(end) {
    const table = document.querySelector('#tableShutter');
    let td = '';
    let tr = '';
    // let resulttr = '';
    let boxCount = 0;
    const rowNum = 4; //有幾行
    const boxNum = 5; //一行有幾個box

    for (let ii = 0; ii < rowNum; ii++) {
        td = '';
        for (let i = 0; i < boxNum; i++) {
            td += `<td class="colorbox${boxCount}"></td>`;
            boxCount++;
        };
        tr += `<tr>${td}</tr>`;
    };
    table.innerHTML = tr;
    console.log(boxCount);

    const htmlTd = [...document.querySelectorAll('td')];
    const domTd = htmlTd.slice();
    // console.log(domTd, domTd.constructor.name, tdTotal);
    let count = 0;


    const colorChange1 = () => {
        if (count < boxCount) {
            $(domTd[count]).css('background-color', `rgba(0, ${Math.floor(count / boxNum) * Math.floor(boxCount / rowNum)}, 0`);
            count++;

            setTimeout(colorChange1, 100);
        }
        else {
            count = 0;
            clearTimeout(colorChange1);
            stop(colorChange1);
            setTimeout(colorChange2, 1000);
        }
    };

    const colorChange2 = () => {
        $(sceenThree).css('display', 'none');
        document.querySelector('#bgi').append(mainChar);
        document.querySelector('#bosscharAll').style = 'display: block;';
        document.querySelector('#princesscharAll').style = 'display: block;';
        if (count < boxCount) {
            $(domTd[count]).css('background-color', `transparent`);
            count++;

            setTimeout(colorChange2, 100);
        }
        else {
            count = 0;
            clearTimeout(colorChange2);
            stop(colorChange2);
            end();
            return;
        }
    };

    colorChange1();
};
function shutter2(end) {
    const table = document.querySelector('#tableShutter');
    let td = '';
    let tr = '';
    // let resulttr = '';
    let boxCount = 0;
    const rowNum = 4; //有幾行
    const boxNum = 5; //一行有幾個box

    for (let ii = 0; ii < rowNum; ii++) {
        td = '';
        for (let i = 0; i < boxNum; i++) {
            td += `<td class="colorbox${boxCount}"></td>`;
            boxCount++;
        };
        tr += `<tr>${td}</tr>`;
    };
    table.innerHTML = tr;
    console.log(boxCount);

    const htmlTd = [...document.querySelectorAll('td')];
    const domTd = htmlTd.slice();
    // console.log(domTd, domTd.constructor.name, tdTotal);
    let count = 0;


    const colorChange1 = () => {
        if (count < boxCount) {
            $(domTd[count]).css('background-color', `rgba(0, ${Math.floor(count / boxNum) * Math.floor(boxCount / rowNum)}, 0`);
            count++;

            setTimeout(colorChange1, 100);
        }
        else {
            count = 0;
            clearTimeout(colorChange1);
            stop(colorChange1);
            setTimeout(colorChange2, 1000);
        }
    };

    const colorChange2 = () => {
        // $(sceenThree).css('display', 'none');
        // document.querySelector('#bgi').append(mainChar);
        document.querySelector('#bosscharAll').style = 'display: none;';
        document.querySelector('#princesscharAll').style = 'display: block;';
        $('#princesscharAll .conver_box').css('display', 'none');
        if (count < boxCount) {
            $(domTd[count]).css('background-color', `transparent`);
            count++;

            setTimeout(colorChange2, 100);
        }
        else {
            count = 0;
            clearTimeout(colorChange2);
            stop(colorChange2);
            end();
            return;
        }
    };

    colorChange1();
};

// 第一幕-------------------------------------------------------------------------------------
//抓到slogan
const sloganOne = document.querySelector('#sloganOne').innerText;
const sloganTwo = document.querySelector('#sloganTwo').innerText;
//抓到要擺的位置
const showOne = document.querySelector('#showSloganOne');
const showTwo = document.querySelector('#showSloganTwo');
// 抓到按鈕 並記得初始化
const btnOne = document.querySelector('#btnOne');
btnOne.style = 'display: none';


//跑什麼包來著 讓字一個個出現
function startSceenOne() {
    console.log('第一幕開始');
    let i = 0;
    let ii = 0;
    function sOne() {
        if (i <= sloganOne.length) {
            showOne.innerHTML = sloganOne.substring(0, i);
            i++;
            setTimeout(sOne, 100);
            // console.log('h1');
        }
        if (i === sloganOne.length) {
            $(btnOne).one('click', sTwo);
            btnOne.style = 'display: block';
            // sTwo();
        }
        // console.log(i,'io');
    };
    function sTwo() {
        btnOne.style = 'display: none';
        $('#showSloganOne').remove();
        if (ii <= sloganTwo.length) {
            showTwo.innerHTML = sloganTwo.substring(0, ii);
            ii++;
            setTimeout(sTwo, 100);
            // console.log('h1');
        }
        if (ii === sloganTwo.length) {
            setTimeout(function () {
                $("#sceen_one").css('background-color', 'transparent');
                $('#showSloganTwo').css('color', 'transparent')
                $('#showSloganTwo').one('transitionend', function () {
                    startSceenTwo();
                    $('#showSloganTwo').remove();
                    $('#sceen_one').css('display', 'none');
                    console.log('第一幕結束');
                });
                // console.log('end');
            }, 1000);
        }
    }
    setTimeout(sOne, 200);
};


// 第二幕-----------------------------------------------------------------------------------
// 抓到主角div 抓到slogan3
const mainChar = document.querySelector('#mainChar');
const conversationElif = document.querySelector('#conversationElif');
const sloganThree = document.querySelector('#sloganThree').innerText;
//會跑動的背景 龍
const sceenThree = document.querySelector('.sceen_three');
const threeTrain = document.querySelector('#sceenThreeBgtrain');
const dragon = document.querySelector('#bosschar');
const conversationDragon = document.querySelector('#bosschar > .conver_box');
const conversationPrincess = document.querySelector('#princesschar > .conver_box');

// 抓到要擺的位置
const showThree = document.querySelector('#showSloganThree');

// 第二幕啟動func
function startSceenTwo() {
    console.log('第二幕開始');
    // 初始化
    $(conversationElif).css('display', 'none');
    // 主角出現
    mainChar.style = 'transform: translateX(0%)';
    $(mainChar).one('transitionend', sThree);

    // sloganthree出現 文字
    let i = 0;
    function sThree() {
        if (i <= sloganThree.length) {
            showThree.innerHTML = sloganThree.substring(0, i);
            i++;
            setTimeout(sThree, 100);
            // console.log('h1');
        }
        if (i === sloganThree.length) {
            setTimeout(function () {
                showThree.style = 'transition: 2s; opacity: 0;';
                $(showThree).one('transitionend', sFour);
            }, 200)
            // $(btnOne).one('click', sTwo);
            // btnOne.style = 'display: block';
            // sTwo();
        }
        // console.log(i,'io');
    };

    // sloganfour出現 出發去救公主
    function sFour() {
        // console.log('4start!');
        $(conversationElif).css('display', 'flex');

        let opaci = 1;
        let r = 0;
        function opaciNum() {
            console.log(r);
            if (r > 0) {
                return;
            }
            opaci = (opaci > 0) ? 0 : 1;
            // console.log(opaci);
            $(conversationElif).css('opacity', `${opaci}`);
            setTimeout(opaciNum, 500);
        };
        setTimeout(opaciNum, 2000);
        setTimeout(sFive, 500);

        function sFive() {
            let rr = 0
            $('#sceen_two').css('display', 'none');
            // $(conversationElif).css('display', 'none');
            // window.removeEventListener('keydown', run);
            window.addEventListener('keydown', run);
            function run() {
                $(conversationElif).find('p:first').css('display', 'none');
                console.log('running', r);
                r++;
                $(threeTrain).css('transform', `translateX(-${r}%)`);
                if (r === 1) {
                    $(conversationElif).css('display', 'none');
                }

                if (r === 5) {
                    $(conversationElif).css('opacity', '1');
                    $(conversationElif).css('display', 'block');
                    $(conversationElif).find('#sloganFive').css('display', 'block');
                }
                if (r === 30) {
                    $(conversationElif).css('display', 'none');
                    $(conversationElif).find('#sloganFive').css('display', 'none');
                }
                if (r === 40) {
                    $(conversationElif).css('display', 'block');
                    $(conversationElif).find('#sloganSix').css('display', 'block');
                }
                if (r === 65) {
                    $(conversationElif).css('display', 'none');
                    $(conversationElif).find('#sloganSix').css('display', 'none');
                }
                if (r === 90) {
                    $(conversationElif).css('display', 'block');
                    $(conversationElif).find('#sloganSeven').css('display', 'block');
                }
                if (r === 120) {
                    $(conversationElif).css('display', 'none');
                    $(conversationElif).find('#sloganSeven').css('display', 'none');
                }
                if (r === 140) {
                    $(conversationElif).css('display', 'block');
                    $(conversationElif).find('#sloganEight').css('display', 'block');
                }
                if (r === 170) {
                    $(conversationElif).css('display', 'none');
                    $(conversationElif).find('#sloganEight').css('display', 'none');
                    let opaciP = 1;
                    function opaciNumP() {
                        if (rr === 1) {
                            return;
                        };
                        opaciP = (opaciP > 0) ? 0 : 1;
                        // console.log(opaci);
                        $(conversationPrincess).css('opacity', `${opaciP}`);
                        setTimeout(opaciNumP, 500);
                    };
                    opaciNumP();
                }
                if (r === 198) {
                    $(conversationElif).css('display', 'block');
                    $(conversationElif).find('#sloganNine').css('display', 'block');
                }

                if (r === 199) {
                    $('.elif img').css('animation-name', 'shock');
                    $('.elif img').one('animationend', function () {
                        $('.elif img').css('animation-name', 'unset');
                        $(conversationElif).css('display', 'none');
                        $(conversationElif).find('#sloganNine').css('display', 'none');
                    });
                }

                // 停止跑步
                if (r > 200) {
                    window.removeEventListener('keydown', run);
                    setTimeout(() => {
                        $(conversationDragon).css('display', 'block');
                        $(conversationDragon).find('#sloganTen').css('display', 'block');
                        setTimeout(() => {
                            $(conversationDragon).css('display', 'none');
                            $(conversationDragon).find('#sloganTen').css('display', 'none');
                            $(conversationDragon).css('display', 'block');
                            $(conversationDragon).find('#sloganTenone').css('display', 'block');
                            setTimeout(() => {
                                setTimeout(function () {
                                    shutter(startSceenThree);
                                }, 2000);
                                sceenThree.append(mainChar);
                                $(sceenThree).css('animation-name', 'intofight');
                                $(sceenThree).one('animationend', function () {
                                    $(conversationDragon).css('display', 'none');
                                    $(conversationDragon).find('#sloganTenone').css('display', 'none');
                                    $(conversationPrincess).css('display', 'none');
                                    rr = 1;
                                });
                            }, 2000);
                        }, 2000);
                    }, 500);
                }
            }
        };
    };
};


//第三幕----------------------------------------------------------------------------------------
//抓到slogan
const sloganTentwo = document.querySelector('#sloganTentwo').innerText;
const sloganTenthree = document.querySelector('#sloganTenthree').innerText;
//抓到要擺的位置
const showTentwo = document.querySelector('#showSloganTentwo');
const showTenthree = document.querySelector('#showSloganTenthree');
const showTenfour = document.querySelector('#showSloganTenfour');
// 抓到主角和龍的offset;
let elifOffsetLeft;
let elifOffsetTop;
let dragonOffsetLeft;
let dragonOffsetTop;
let dragonHeight;
let dragonWidth;
let elifHeight;
let elifWidth;
let princessOffsetLeft;
let princessOffsetTop;


//戰鬥前說明
function startSceenThree() {
    $('#sceen_four').css('display', 'flex');
    console.log('第三幕開始 戰鬥');
    let i = 0;
    let ii = 0;
    function sOne() {
        if (i == 0) {
            $(showTentwo).css('display', 'block');
        };
        if (i <= sloganTentwo.length) {
            showTentwo.innerHTML = sloganTentwo.substring(0, i);
            i++;
            setTimeout(sOne, 200);
            // console.log('h1');
        };
        if (i === sloganTentwo.length) {
            $('#btnTwo').one('click', sTwo);
            $('#btnTwo').css('display', 'block');
        };
    };
    function sTwo() {
        $('#showSloganTentwo').remove();
        $('#btnTwo').css('display', 'none');
        $('#sloganBtnOne').css('display', 'none');
        $(showTenthree).css('display', 'block');

        setTimeout(function () {
            $(showTenthree).css('display', 'none');
            $('#heart').css('display', 'flex');
            startFight();

        }, 1000);

    }
    setTimeout(sOne, 200);
};

//開始戰鬥
function startFight() {
    const bossBox = document.querySelector('.fightbox_boss');
    const elifBox = document.querySelector('.fightbox_elif');
    const bossQ = document.createElement('p');
    const elifA = document.createElement('p');
    const elifB = document.createElement('p');
    const elifC = document.createElement('p');
    const fireball = document.querySelector('#fireball');
    let qustNum = 1;
    let bossQone;
    let bossQtwo;
    let bossQthree;
    let bossQfour;
    let bossQend;
    let elifAone;
    let elifAtwo;
    let elifAthree;
    let elifAfour;
    let elifBone;
    let elifBtwo;
    let elifBthree;
    let elifBfour;
    let elifCone;
    let elifCtwo;
    let elifCthree;
    let elifCfour;
    let bosstalkOne;
    let bosstalkTwo;
    let bosstalkThree;
    let bosstalkFour;
    // let bosstalkP;

    // 定義問題和答案和擊倒的對話
    const qOne = '問題一：一個閒得發慌的周末,你決定打開電視打發時間這時你會選擇...?';
    const qTwo = '問題二：看完後你覺得劇情有些差強人意，可能是因為不太熟悉該製作團隊的所設計的效果，通常你比較常觀看哪個地區所製作的影視作品呢?';
    const qThree = '問題三：這時你打開instagram發現你之前很想看的電影居然已經下映了，這時候你會...?';
    const qFour = '問題四：於是你決定出門去逛逛，到了超市後發現了一個新出的商品而你非常感興趣，而售價方式有以下3種，你會選擇...?';
    const qEnd = '原來你比我還熱愛看劇啊';
    const qEnd2 = '好吧,我承認，你真的很厲害...';
    const qEnd3 = '是我輸了，我會乖乖離開...';

    const aOneOne = 'A. 驚險刺激的動作大片';
    const aTwoOne = 'A. 日本';
    const aThreeOne = 'A. 瘋狂搜尋片源，下映後就是要趕快看到!';
    const aFourOne = 'A. 找朋友一起大量團購，平分價格也更優惠';

    const aOneTwo = 'B. 笑到不要不要的輕鬆喜劇';
    const aTwoTwo = 'B. 歐美西洋';
    const aThreeTwo = 'B. 隨緣吧不急著看，之後有找到片源再看就好';
    const aFourTwo = 'B. 還要找朋友太麻煩了，自己也能一次買很多';

    const aOneThree = 'C. 啊是初戀的港覺啊愛情片';
    const aTwoThree = 'C. 韓國';
    const aThreeThree = 'C. 沒看也沒關係';
    const aFourThree = 'C. 因為是新產品，先買單包裝的試試看好了';

    const aOneFour = 'D. 1xxxxxx';
    const aTwoFour = 'D. 2xxxxxx';
    const aThreeFour = 'D. 3xxxxxx';
    const aFourFour = 'D. 4xxxxxx';

    const bTalkOne = '還不錯嘛，那這招呢？';
    const bTalkTwo = '沒想到你這麼厲害，看招！';
    const bTalkThree = '怎麼可能...';
    const bTalkFour = '嗚啊啊啊啊，沒想到你竟然打敗我了！';

    function questionOne(q, bossqs) {
        console.log(qustNum, 'qustion');
        $(bossBox).css('opacity', '1');
        bossqs = document.createTextNode(`${q}`);
        bossQ.append(bossqs);
        bossBox.append(bossQ);
        if (qustNum === 1) {
            setTimeout(function () { answerOne(aOneOne, aOneTwo, aOneThree, elifAone, elifBone, elifCone, bossqs); }, 1000);
        };
        if (qustNum === 2) {
            setTimeout(function () { answerOne(aTwoOne, aTwoTwo, aTwoThree, elifAtwo, elifBtwo, elifCtwo, bossqs); }, 1000);
        };
        if (qustNum === 3) {
            setTimeout(function () { answerOne(aThreeOne, aThreeTwo, aThreeThree, elifAthree, elifBthree, elifCthree, bossqs); }, 1000);
        };
        if (qustNum === 4) {
            setTimeout(function () { answerOne(aFourOne, aFourTwo, aFourThree, elifAfour, elifBfour, elifCfour, bossqs); }, 1000);
        };
    };
    function answerOne(a1, a2, a3, aa, ab, ac, bossqs) {
        function delayatk() {
            attack(bossqs, aa, ab, ac);
            $('.fightbox_elif p').off('click', delayatk);
        };
        console.log(qustNum, 'answer');
        $(elifBox).css('opacity', '1');
        aa = document.createTextNode(`${a1}`);
        elifA.append(aa);
        ab = document.createTextNode(`${a2}`);
        elifB.append(ab);
        ac = document.createTextNode(`${a3}`);
        elifC.append(ac);


        elifBox.append(elifA);
        elifBox.append(elifB);
        elifBox.append(elifC);
        if (qustNum >= 1 && qustNum < 5) {
            $('.fightbox_elif p').one('click', delayatk);
        };
    };
    function attack(bq, aa, ab, ac) {
        console.log(qustNum, 'attack');
        console.log('attack!!!', bq, aa, ab, ac, typeof bq, typeof aa);
        $(elifBox).css('transition', '.5s').css('opacity', '0').one('transitionend', function () {
            // document.querySelector('.fightbox_elif p').remove();
            $(showTenfour).css('display', 'block');
            aa.parentNode.removeChild(aa);
            ab.parentNode.removeChild(ab);
            ac.parentNode.removeChild(ac);
            setTimeout(shotFireball, 500);
        });
        $(bossBox).css('transition', '.3s').css('opacity', '0').one('transitionend', function () {
            bq.parentNode.removeChild(bq);
        });
    };
    function shotFireball() {
        console.log(qustNum, 'shotfireball');
        $(showTenfour).css('display', 'none');
        dragonOffsetLeft = $('#bosscharAll > img').offset().left;
        dragonOffsetTop = $('#bosscharAll > img').offset().top;
        elifOffsetLeft = $('#mainChar > img').offset().left;
        elifOffsetTop = $('#mainChar > img').offset().top;
        dragonWidth = $('#bosscharAll > img').width();
        dragonHeight = $('#bosscharAll > img').height();
        elifWidth = $('#mainChar > img').width();
        elifHeight = $('#mainChar > img').height();

        console.log('fire!!!', dragonOffsetLeft, dragonOffsetTop, elifOffsetLeft, elifOffsetTop, dragonWidth, dragonHeight, elifWidth, elifHeight);
        $(fireball).css('top', `${elifOffsetTop + (elifHeight / 2)}px`);
        $(fireball).css('left', `${elifOffsetLeft + (elifWidth / 2)}px`);
        $(fireball).css('display', 'flex');
        $('#bosscharAll').one('animationend', function () {
            console.log('shotfire3');
            $(`#heart img:nth-child(${qustNum})`).css('opacity', '0');
            $('#bosscharAll').css('animation-name', 'unset');
            if (qustNum === 4) {
                bosstalk(bTalkFour, bosstalkFour);
            };
            if (qustNum === 3) {
                bosstalk(bTalkThree, bosstalkThree);
            };
            if (qustNum === 2) {
                bosstalk(bTalkTwo, bosstalkTwo);
            };
            if (qustNum === 1) {
                bosstalk(bTalkOne, bosstalkOne);
            };
        });
        $('#mainChar').one('animationend', function () {
            console.log('shotfire4');
            $('#mainChar').css('animation-name', 'unset');
        });
        $(fireball).one('transitionend', function () {
            console.log('shotfire2');
            $('#bosscharAll').css('animation-name', 'beenhit');
            $(fireball).css('display', 'none');
            $(fireball).css('transform', 'translate(0, 0)');
        });
        setTimeout(function () {
            $(fireball).css('transform', `translate(${(dragonOffsetLeft + dragonWidth / 5) - (elifOffsetLeft + elifWidth / 2)}px, ${(dragonOffsetTop + dragonHeight / 2) - (elifOffsetTop + elifHeight / 2)}px)`);
            $('#mainChar').css('animation-name', 'shotfire');
            console.log('shotfire1');
        }, 50);
    };
    function bosstalk(bst, bq) {
        qustNum++;
        console.log(qustNum, 'bosstalk');
        bq = document.createTextNode(`${bst}`);
        bosstalkP = document.createElement('p');
        bosstalkP.append(bq);
        document.querySelector('#bosscharAll .conver_sation').append(bosstalkP);
        // $('#bosscharAll .conver_sation').css('display', 'flex');
        $('#bosscharAll .conver_box').css('display', 'flex');
        setTimeout(function () {
            $('#bosscharAll .conver_box').css('display', 'none');
            $('#bosscharAll .conver_box p').remove();
            bq.parentNode.removeChild(bq);
            // bosstalkP.remove();
        }, 1800);
        if (qustNum === 2) {
            setTimeout(function () { questionOne(qTwo, bossQtwo); }, 2000);
        }
        if (qustNum === 3) {
            setTimeout(function () { questionOne(qThree, bossQthree); }, 2000);
        }
        if (qustNum === 4) {
            setTimeout(function () { questionOne(qFour, bossQfour); }, 2000);
        }
        if (qustNum === 5) {
            setTimeout(function () { dragonend(qEnd, bossQend); }, 2000);
        }
    };
    function dragonend(bst, bq) {
        qustNum++;
        console.log(qustNum, 'bosstalkend');
        bq = document.createTextNode(`${bst}`);
        bosstalkP = document.createElement('p');
        bosstalkP.append(bq);
        document.querySelector('#bosscharAll .conver_sation').append(bosstalkP);
        // $('#bosscharAll .conver_sation').css('display', 'flex');
        $('#bosscharAll .conver_box').css('display', 'flex');
        setTimeout(function () {
            $('#bosscharAll .conver_box').css('display', 'none');
            $('#bosscharAll .conver_box p').remove();
            bq.parentNode.removeChild(bq);
        }, 1800);
        if (qustNum === 6) {
            setTimeout(function () {
                dragonend(qEnd2, bossQend);
            }, 2000);
        } else if (qustNum === 7) {
            setTimeout(function () {
                dragonend(qEnd3, bossQend);
            }, 2000);
        } else if (qustNum === 8) {
            $('#bosscharAll').on('animationend', function () {
                $('#bosscharAll').css('display', 'none');
                // princessthankyou();
            });
            setTimeout(function () {
                console.log(qustNum);
                $('#bosscharAll').css(
                    {
                        "animation-duration": "4s",
                        "animation-fill-mode": "forwards",
                        "animation-name": "dragonend",
                    }
                );
                setTimeout(function () {
                    shutter2(princessthankyou);
                }, 3000);
            }, 2000);
        }
    };
    questionOne(qOne, bossQone);
};

// 公主跑出來感謝你
function princessthankyou() {
    $('#sceen_four').css('display', 'none');
    $('#princesscharAll #sloganHelp').css('display', 'none');
    const princess = document.querySelector('#princesscharAll');
    princessOffsetLeft = $('#princesscharAll > img').offset().left;
    princessOffsetTop = $('#princesscharAll > img').offset().top;
    elifOffsetLeft = $('#mainChar > img').offset().left;
    elifOffsetTop = $('#mainChar > img').offset().top;
    elifWidth = $('#mainChar > img').width();
    elifHeight = $('#mainChar > img').height();
    const moverate = (princessOffsetLeft - (elifOffsetLeft + elifWidth)) / 2;
    $(mainChar).css(
        {   
            "transform": `translateX(${moverate}px)`,
            "transition": "1.5s",
            "transition-timing-function": "linear"
        }
    );
    $(princess).css(
        {   
            "transform": `translateX(-${moverate}px)`,
            "transition": "1.5s",
            "transition-timing-function": "linear"
        }
    );
    $(princess).one('transitionend', function(){
        document.querySelector('#princesscharAll #sloganHelp').innerText = '謝謝你救了我！';
        $('#princesscharAll #sloganHelp').css('display', 'flex');
        $('#princesscharAll .conver_box').css('display', 'flex');
        setTimeout(function(){
            $('#princesscharAll .conver_box').css('display', 'none');
            $('#mainChar #sloganLast').css('display', 'flex');
            $('#mainChar .conver_box').css('display', 'flex');
            setTimeout(function(){
                const moveout = 100;
                $('#mainChar .conver_box').css('display', 'none');
                $('.elif > img').css('transform', 'scaleX(-1)');
                $(mainChar).css(
                    {   
                        "transform": `translateX(-100vw)`,
                        "transition": "1.5s",
                        "transition-timing-function": "linear"
                    }
                );
                $(princess).css(
                    {   
                        "transform": `translateX(-100vw)`,
                        "transition": "1.5s",
                        "transition-timing-function": "linear"
                    }
                );
                setTimeout(fadeout,1000);
            },1000);
        },1000)
    });
};

// fadeout
function fadeout(){
    $('#bgi').one('transitionend', function(){
        startSceenFive();
    });
    $('#bgi').css({
        'transition': '2s',
        'opacity': '0'
    });
};

// sceenfive 結算
// const resultOne = document.querySelector('#resultOne').innerText;
const resultTwo = document.querySelector('#resultTwo').innerText;
//抓到要擺的位置
const showResultOne = document.querySelector('#showResultOne');
const showResultTwo = document.querySelector('#showResultTwo');
// 抓到按鈕 並記得初始化
const btnResult = document.querySelector('#btnResult');

function startSceenFive () {
    console.log('恭喜完成遊戲');
    $('#sceen_five').css('display', 'flex');
    $('#bgi').css('opacity', '1');
    $('#resultLogo').css('display', 'block');
    let i = 0;
    function sOne() {
        console.log(i,resultTwo.length);
        if (i <= resultTwo.length) {
            showResultTwo.innerHTML = resultTwo.substring(0, i);
            i++;
            setTimeout(sOne, 200);
        }
        if(i == resultTwo.length + 1){
            $('#sceen_five').css('display', 'none');
            startResult();
        };
    };
    setTimeout(sOne, 200);
};

function startResult(){
    console.log('結果計算');
    // window.location.assign('dragon_sceensix.html');
    window.location.assign('dragon_quest_result.php');
};






// start game -----------------------------------------------------------------------
// TODO: 問題可以用左右兩側飛入，結尾恭喜完成挑戰，狀態欄,背景公主貓咪跑來跑去。
window.addEventListener('load', startSceenOne);

//單獨測試第二幕出場
// startSceenTwo();
        //單獨測試第二幕有路的部分
        // sFive();