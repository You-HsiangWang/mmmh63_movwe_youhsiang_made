<?php

$json_string = file_get_contents("videodb_am_mov.json");
$json_array = json_decode($json_string, JSON_UNESCAPED_UNICODE);

foreach ($json_array as $url) {
    // //
    $vimg =  'https:' . $url['videosrc'];
    // http
    $himg = $url['previewbigpic'];
    // //
    if (is_array($url['previewpic'])) {
        $pimgarray = $url['previewpic'];
        foreach ($pimgarray as $pimgs) {
            $pimg = 'https:' . $pimgs;
            $p_filename = './imgs/' . basename($pimg);
            if (!file_put_contents($p_filename, file_get_contents($pimg))) {
                echo basename($pimg) . '<br>';
            };
        };
    } else {
        $pimg = 'https:' . $url['previewpic'];
        $p_filename = './imgs/' . basename($pimg);
        if (!file_put_contents($p_filename, file_get_contents($pimg))) {
            echo basename($pimg) . '<br>';
        };
    };


    $aimgarray = $url['actoricon'];
    foreach ($aimgarray as $aimgs) {
        preg_match('#\((.*?)\)#', $aimgs, $aimgmatch);
        $aimg = 'https:' . $aimgmatch[1];
        $a_filename = './actor/' . basename($aimg);
        if (!file_put_contents($a_filename, file_get_contents($aimg))) {
            echo basename($aimg) . '<br>';
        };
    };

    $v_filename = './imgs/' . basename($vimg);
    if (!file_put_contents($v_filename, file_get_contents($vimg))) {
        echo basename($vimg) . '<br>';
    };

    $h_filename = './imgs/' . basename($himg);
    if (!file_put_contents($h_filename, file_get_contents($himg))) {
        echo basename($himg) . '<br>';
    };
};
echo 'success';
