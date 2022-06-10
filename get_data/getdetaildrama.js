(function iter(i) {
    if (i < 21) {
        gogo(i).then(() => iter(i + 1))
    }
})(1);

function gogo(index) {
    var Nightmare = require('nightmare');
    var nightmare = Nightmare({
        openDevTools: {
            mode: 'detach'
        },
        show: true
    });

    return nightmare
        .goto('https://www.iq.com/film-library?chnid=2&value=4807881279032033;must&')
        .viewport(1920, 1080)
        .wait('.style__PicTextUnitWrapper-sc-1m6a06z-0')
        .click('.second-label .second-label-level:nth-child(5) .second-label-every > div:nth-child(2)')
        .wait(4000)
        .click(`.style__PicTextUnitWrapper-sc-1m6a06z-0:nth-child(${index}) a`)
        .wait(4000)
        .click('.episodes-filter-wrap.pc .episodes-page-list-mode')
        .wait(4000)
        .evaluate(function () {
            let detailobject = {};

            // 拿到每一個演員頭像
            let iqiyiactorpic = document.querySelectorAll('#block-video_information1 .slider-item-box.play-film-item > .slider-item > .img-box > div:last-child');
            let iqiyiactorpicarray = [];

            iqiyiactorpic.forEach((dom) => {
                iqiyiactorpicarray.push(dom.getAttribute('style').match(/\((.+?)\)/g)[0]);
            });
            // console.log(iqiyiactorpicarray);

            // 拿到每一個演員姓名
            let iqiyiactorname = document.querySelectorAll('#block-video_information1 .slider-item-box.play-film-item > .slider-item > .slider-item-name');
            let iqiyiactornamearray = [];
            iqiyiactorname.forEach((dom) => {
                iqiyiactornamearray.push(dom.innerText);
            });
            // console.log(iqiyiactornamearray);

            // 拿到每一集的縮圖和名稱
            let iqiyiepisodeall = document.querySelectorAll('.intl-play-scroll-content.source .intl-episodes-list.source .plist-con.conH a > img');
            let iqiyiepisodeallpic = [];
            iqiyiepisodeall.forEach(function (doms) {
                iqiyiepisodeallpic.push(doms.getAttribute('src'));
            });

            let iqiyiepisodenameall = document.querySelectorAll('.intl-play-scroll-content.source .intl-episodes-list.source .v-desc a');
            let iqiyiepisodeallname = [];
            iqiyiepisodenameall.forEach(function (doms) {
                iqiyiepisodeallname.push(doms.innerText);
            });

            // -----
            // 年
            let iqiyiinfoyear = document.querySelector('#block-video_information1 .intl-play-time span:nth-of-type(2)').innerText;
            // 集
            let iqiyiinfoepisodes = document.querySelector('#block-video_information1 .intl-play-time span:nth-of-type(3)').innerText;
            // 評分
            let iqiyiinforatings = document.querySelector('#block-video_information1 .play-score .all-score-info .score-info-number').innerText;

            // 風格
            let iqiyiinfostyles = document.querySelector('#block-video_information1 .intl-play-tag .tag-inline:first-child > div > span').nextSibling.nodeValue;

            // infos
            let iqiyiinfodiscrib = document.querySelector('#block-video_information1 .intl-play-msgAndDesc .intl-play-des span:last-child').innerText;

            // 更新時間
            let iqiyiinfoupdatetime = '';
            if (document.querySelector('.sub-title')) {
                iqiyiinfoupdatetime = document.querySelector('.sub-title').innerText;
            };

            // ---------------------------------
            detailobject = {
                previewpic: iqiyiepisodeallpic,
                previewname: iqiyiepisodeallname,
                actoricon: iqiyiactorpicarray,
                actorname: iqiyiactornamearray,
                videoyear: iqiyiinfoyear,
                videoallepisodes: iqiyiinfoepisodes,
                videoscore: iqiyiinforatings,
                videotype: iqiyiinfostyles,
                videodiscribtion: iqiyiinfodiscrib,
                videoupdatetime: iqiyiinfoupdatetime,
            };
            console.log(detailobject);
            return JSON.stringify(detailobject);
        })
        .end()
        .then(function (result) {
            console.log(result)
        })
        .catch(function (error) {
            console.error('search failed:', error);
        });
};





