<?php

require './parts/movwe_connect_db.php';

$output = [
    'inputsuccess_Video' => false,
    'inputsuccess_Actor' => false,
    'inputsuccess_actvid' => false,
    'code_v' => 0,
    'code_a' => 0,
    'code_av' => 0,
    'error_v' => '',
    'error_a' => '',
    'error_av' => '',
];
date_default_timezone_set('Asia/Taipei');

// ott隨機分配
$ottplats = [[1, 2], [1, 3], [1, 4], [2, 3], [2, 4], [3, 4], [1, 2, 3], [1, 2, 4], [1, 3, 4], [2, 3, 4], [1, 2, 3, 4]];
$ottrandomint = random_int(0, 10);
$ottvideo = json_encode($ottplats[$ottrandomint]);

$linkid = isset($_POST['linkkey']) ? trim($_POST['linkkey']) : '';
$videoname = isset($_POST['videoarray']['videoname']) ? trim($_POST['videoarray']['videoname']) : '';
$videobigpic = isset($_POST['videoarray']['previewbigpic']) ? trim($_POST['videoarray']['previewbigpic']) : '';
$videopic = isset($_POST['videoarray']['videosrc']) ? trim($_POST['videoarray']['videosrc']) : '';
$videoyear = isset($_POST['videoarray']['videoyear']) ? trim($_POST['videoarray']['videoyear']) : '';
$videoscore = isset($_POST['videoarray']['videoscore']) ? trim($_POST['videoarray']['videoscore']) : '';
$videoottlink = isset($_POST['videoarray']['videodetaillink']) ? trim($_POST['videoarray']['videodetaillink']) : '';
$videoinfo = isset($_POST['videoarray']['videodiscribtion']) ? trim($_POST['videoarray']['videodiscribtion']) : '';
$videoupdatetime = isset($_POST['videoarray']['videoupdatetime']) ? trim($_POST['videoarray']['videoupdatetime']) : '';
$videostyle = isset($_POST['videoarray']['videotype']) ? trim($_POST['videoarray']['videotype']) : '';
$videoid = isset($_POST['linkkey']) ? trim('vd' . $_POST['linkkey']) : '';
$videogenre = '影劇';
$videoplace = '韓國';
$videoclicks = random_int(1, 100);
$videostillsarray = is_array($_POST['videoarray']['previewpic']) ? json_encode($_POST['videoarray']['previewpic']) : $_POST['videoarray']['previewpic'];
$videostills = isset($videostillsarray) ? trim($videostillsarray) : '';
// ------------------------------------------
$addday = 20;
$videoupload = date("Y-m-d H:i:s");
$date = date("Y-m-d");
$date1 = str_replace('-', '/', $date);
$nextweek = date('Y-m-d', strtotime($date1 . "+$linkid days"));
$nnextweek = date('Y-m-d', strtotime($date1 . "+$linkid$addday days"));

// 將資料新增到資料庫
$putvid = 'INSERT INTO `video`(`link_key`, `video_id`, `video_name`, `video_genre`, `video_place`, `video_update_time`, `video_rating`, `video_year`, `video_stills`, `video_poster_ver`, `video_poster_hor`, `video_info`, `video_clicks`, `video_style`, `video_ottlink`, `video_online_time`, `video_offline_time`, `video_upload_time`, `video_ott`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
$putvidstmt = $pdo->prepare($putvid);

$putvidstmt->execute([$linkid, $videoid, $videoname, $videogenre, $videoplace, $videoupdatetime, $videoscore, $videoyear, $videostills, $videopic, $videobigpic, $videoinfo, $videoclicks, $videostyle, $videoottlink, $nextweek, $nnextweek, $videoupload, $ottvideo]);


$output['rowCountVideo'] = $putvidstmt->rowCount();
if ($putvidstmt->rowCount() == 1) {
    $output['inputsuccess_Video'] = true;
    $output['code_v'] = 'vid200';
    $output['error_v'] = '影片新增成功';
} else {
    $output['inputsuccess_Video'] = false;
    $output['error_v'] = '影片Ｆ新增失敗';
    $output['code_v'] = 'vid401';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

if (is_array($_POST['videoarray']['actorname'])) {
    for ($i = 0; $i < count($_POST['videoarray']['actorname']); $i++) {
        $actorname = isset($_POST['videoarray']['actorname'][$i]) ? trim($_POST['videoarray']['actorname'][$i]) : '';
        $actoricon = isset($_POST['videoarray']['actoricon'][$i]) ? trim($_POST['videoarray']['actoricon'][$i]) : '';

        $checkactor = 'SELECT `v_actor_sid`, `v_actor_name`, `v_actor_icon` FROM `video_actor_data` WHERE `v_actor_name` =?';
        $checkstmt = $pdo->prepare($checkactor);
        $checkstmt->execute([$actorname]);
        $checkrow = $checkstmt->fetch();

        if (!empty($checkrow)) {
            $checkrowsid = $checkrow['v_actor_sid'];
            $putactor = 'UPDATE `video_actor_data` SET `v_actor_name`=? WHERE `v_actor_sid` = ?';
            $putactstmt = $pdo->prepare($putactor);
            $putactstmt->execute([$actorname, $checkrowsid]);

            // $output['rowCountActor'] = $putactstmt->rowCount();
            // if ($putactstmt->rowCount() == 1) {
            //     $output['inputsuccess_Actor'] = true;
            //     $output['code_a'] = 'vid202';
            //     $output['error_a'] = '演員更新成功';
            // } else {
            //     $output['inputsuccess_Actor'] = false;
            //     $output['error_a'] = '演員更新失敗';
            //     $output['code_a'] = 'vid402';
            //     echo json_encode($output, JSON_UNESCAPED_UNICODE);
            //     exit;
            // };

        } else if (empty($checkrow)) {
            $putactor = 'INSERT INTO `video_actor_data`(`v_actor_name`, `v_actor_icon`) VALUES (?,?)';
            $putactstmt = $pdo->prepare($putactor);
            $putactstmt->execute([$actorname, $actoricon]);

            $output['rowCountActor'] = $putactstmt->rowCount();
            if ($putactstmt->rowCount() == 1) {
                $output['inputsuccess_Actor'] = true;
                $output['code_a'] = 'vid201';
                $output['error_a'] = '演員新增成功';
            } else {
                $output['inputsuccess_Actor'] = false;
                $output['error_a'] = '演員新增失敗';
                $output['code_a'] = 'vid402';
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            };
        };

        $conbineActVid = 'SELECT `v_actor_sid`, `v_actor_name`, `video_sid`, `video_name` FROM `video_actor_data` FULL JOIN `video` ON `v_actor_name` = ? AND `video_name` = ?';
        $getactvidstmt = $pdo->prepare($conbineActVid);
        $getactvidstmt->execute([$actorname, $videoname]);
        $actvidrow = $getactvidstmt->fetch();

        $putActVid = 'INSERT INTO `video_actor_combine`(`vac_actor_sid`, `vac_actorname`, `vac_video_sid`, `vac_video_name`) VALUES (?, ?, ?, ?)';
        $putactvidstmt = $pdo->prepare($putActVid);
        $putactvidstmt->execute([$actvidrow['v_actor_sid'], $actvidrow['v_actor_name'], $actvidrow['video_sid'], $actvidrow['video_name']]);
        $output['rowCountactvid'] = $putactvidstmt->rowCount();
        if ($putvidstmt->rowCount() == 1) {
            $output['inputsuccess_actvid'] = true;
            $output['code_av'] = 'av200';
            $output['error_av'] = 'av新增成功';
        } else {
            $output['inputsuccess_actvid'] = false;
            $output['error_av'] = 'av新增失敗';
            $output['code_av'] = 'av401';
            echo json_encode($output, JSON_UNESCAPED_UNICODE);
            exit;
        };
    };
} else {
    $output['inputsuccess_Actor'] = false;
    $output['code_a'] = 'a403';
    $output['error_a'] = '沒有演員資料';
    // echo json_encode($output, JSON_UNESCAPED_UNICODE);
    // exit;
};

if (is_array($_POST['videoarray']['previewpic'])) {
    $getvidsid = 'SELECT `video_sid` FROM `video` WHERE `video_name` = ?';
    $getvidsidstmt = $pdo->prepare($getvidsid);
    $getvidsidstmt->execute([$videoname]);
    $getvidsidrow = $getvidsidstmt->fetch();

    $videopreviewpicarray = $_POST['videoarray']['previewpic'];
    $videopreviewnamearray = $_POST['videoarray']['previewname'];
    $arraycount = count($videopreviewpicarray);

    for ($i = 0; $i < $arraycount; $i++) {
        $putpre = 'INSERT INTO `video_episode_data`(`v_episode_name`, `v_episode_pic`, `v_episode_video_sid`) VALUES (?,?,?)';
        $putprestmt = $pdo->prepare($putpre);
        $putprestmt->execute([$videopreviewnamearray[$i], $videopreviewpicarray[$i], $getvidsidrow['video_sid']]);

        $output['rowcountPre'] = $putprestmt->rowCount();
        if ($putprestmt->rowCount() == 1) {
            $output['inputsuccess_pre'] = true;
            $output['code_p'] = 'p200';
            $output['error_p'] = 'p新增級數成功';
        } else {
            $output['inputsuccess_pre'] = false;
            $output['code_p'] = 'p400';
            $output['error_p'] = 'p新增級數失敗';
        };
    };
} else {
    $getvidsid = 'SELECT `video_sid` FROM `video` WHERE `video_name` = ?';
    $getvidsidstmt = $pdo->prepare($getvidsid);
    $getvidsidstmt->execute([$videoname]);
    $getvidsidrow = $getvidsidstmt->fetch();

    $videopreviewname = $_POST['videoarray']['previewname'];
    $videopreviewpic = $_POST['videoarray']['previewpic'];
    $putpre = 'INSERT INTO `video_episode_data`(`v_episode_name`, `v_episode_pic`, `v_episode_video_sid`) VALUES (?,?,?)';
    $putprestmt = $pdo->prepare($putpre);
    $putprestmt->execute([$videopreviewname, $videopreviewpic, $getvidsidrow['video_sid']]);

    $output['rowcountPre'] = $putprestmt->rowCount();
    if ($putprestmt->rowCount() == 1) {
        $output['inputsuccess_pre'] = true;
        $output['code_p'] = 'p200';
        $output['error_p'] = 'p新增級數成功';
    } else {
        $output['inputsuccess_pre'] = false;
        $output['code_p'] = 'p400';
        $output['error_p'] = 'p新增級數失敗';
    };
};



echo json_encode($output, JSON_UNESCAPED_UNICODE);
