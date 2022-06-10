var Nightmare = require('nightmare');
var nightmare = Nightmare({ show: true });

nightmare
    .goto('https://www.iq.com/film-library?chnid=2&value=4807881279032033;must&')
    .wait('.style__PicTextUnitWrapper-sc-1m6a06z-0')
    .click('.second-label .second-label-level:nth-child(5) .second-label-every > div:nth-child(2)')
    .wait(4000)
    .evaluate(function () {
        // const resultdata = {
        //     videosrc: '',
        //     videoname: '',
        // };
        const resultarray = [];
        // -----
        let iqiyinodelist = document.querySelectorAll('.style__PicTextUnitWrapper-sc-1m6a06z-0 img');
        let iqiyiimgsrc = [];
        iqiyinodelist.forEach((doms) => {
            iqiyiimgsrc.push(doms.getAttribute('src'));
        });
        console.log(iqiyiimgsrc);
        // ------
        let iqiyinamenodelist = document.querySelectorAll('.style__PicTextUnitWrapper-sc-1m6a06z-0 .text-box > p');
        let iqiyinametxt = [];
        iqiyinamenodelist.forEach((doms) => {
            iqiyinametxt.push(doms.innerHTML);
        });
        console.log(iqiyinametxt);
        // ---------
        let iqiyilinknodelist = document.querySelectorAll('.style__PicTextUnitWrapper-sc-1m6a06z-0 a');
        let iqiyilink = [];
        iqiyilinknodelist.forEach((doms) => {
            iqiyilink.push(doms.getAttribute('href'));
        });
        console.log(iqiyilink);

        // -------------
        for (let i = 0; i < iqiyiimgsrc.length; i++) {
            const resultobject = {
                videosrc: `${iqiyiimgsrc[i]}`,
                videoname: `${iqiyinametxt[i]}`,
                videodetaillink: `${iqiyilink[i]}`,
            };
            resultarray.push(resultobject);
        };
        console.log(resultarray);
        return JSON.stringify(resultarray);
    })
    .end()
    .then(function (result) {
        console.log(result)
    })
    .catch(function (error) {
        console.error('search failed:', error);
    });