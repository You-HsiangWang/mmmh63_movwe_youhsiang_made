(function iter(i) {
    if (i < 21) {
        gogo(i).then(() => iter(i + 1))
    }
})(16);

function gogo(index) {
    var Nightmare = require('nightmare');
    var nightmare = Nightmare({
        openDevTools: {
            mode: 'detach'
        },
        show: true
    });
    let url = '';
    return nightmare
        .goto('https://www.iq.com/film-library?chnid=2&value=4807881279032033;must&')
        .viewport(1920, 1080)
        .wait('.style__PicTextUnitWrapper-sc-1m6a06z-0')
        .click('.second-label .second-label-level:nth-child(5) .second-label-every > div:nth-child(2)')
        .wait(4000)
        .click(`.style__PicTextUnitWrapper-sc-1m6a06z-0:nth-child(${index}) a`)
        .wait(4000)
        .evaluate(function (url) {
            url = document.querySelector('#block-video_information1 .intl-album-title').getAttribute('href');

            location.href = url;
        }, url)
        .wait('.focus-img-link')
        .evaluate(function () {
            let detailobject = {};
            let regex = /\((.+?)\)/g;
            let iqiyibgpicresult;

            let iqiyibgpic = document.querySelector('.focus-content .focus-wrapper:first-child .focus-img-link').getAttribute('style');
            let options = iqiyibgpic.match(regex);
            if (options) {
                let option = options[0]
                if (option) {
                    iqiyibgpicresult = option.substring(1, option.length - 1);
                }
            };

            // 拿到每一集名稱
            let iqiyiname = document.querySelector('.focus-info-title').innerText;

            // ---------------------------------
            detailobject = {
                previewbigpic: iqiyibgpicresult,
                previewname: iqiyiname,
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