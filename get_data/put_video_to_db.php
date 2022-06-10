<?php
require './parts/movwe_connect_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>把影劇json檔放到db裏</title>
</head>

<body>
    <script src="./js/jquery-3.6.0.js"></script>
    <script>
        const requestUrl = './json/videodb_jp_animae.json';
        const request = new XMLHttpRequest();
        let result;

        request.open('GET', requestUrl);
        request.responseType = 'json';
        request.send();

        request.onload = function() {
            result = request.response;
            console.log(result);
            changeJson(result);
            let linkid = 103;
            // result.length
            for (let i = 0; i < result.length; i++) {
                linkid++;
                $.post('put_video_to_db_api.php', {
                    'videoarray': result[i],
                    'linkkey': linkid,
                }, function(data) {
                    console.log(data,'data');
                }, 'json');
            };
        };

        function changeJson(r) {
            for (let i = 0; i < r.length; i++) {
                const a1 = r[i]['previewbigpic'].split('/');
                r[i]['previewbigpic'] = a1[a1.length - 1];

                const a4 = r[i]['videosrc'].split('/');
                r[i]['videosrc'] = a4[a4.length - 1];

                for (let ii = 0; ii < r[i]['actoricon'].length; ii++) {
                    const a2 = r[i]['actoricon'][ii].split('/');
                    r[i]['actoricon'][ii] = a2[a2.length - 1].slice('0', a2[a2.length - 1].length - 1);
                };

                for (let ii = 0; ii < r[i]['previewpic'].length; ii++) {
                    const a3 = r[i]['previewpic'][ii].split('/');
                    r[i]['previewpic'][ii] = a3[a3.length - 1];
                };
            };
        };
    </script>
</body>

</html>