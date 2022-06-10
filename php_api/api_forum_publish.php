<?php

require './parts/movwe_connect_db.php';
// $pageName = 'login';

$output = [
    'code' => '401',
    'error' => '',
    'success' => false,
];

// 拿到文章資料
$forumtitle = isset($_POST['title']) ? trim($_POST['title']) : '';
$forumtype = isset($_POST['type']) ? trim($_POST['type']) : '';
$forumpic = isset($_POST['pic']) ? trim($_POST['pic']) : '';
$forumcontent = isset($_POST['content']) ? trim($_POST['content']) : '';
$forumcontentstrut = isset($_POST['contentstrut']) ? trim($_POST['contentstrut']) : '';

// sql語法
if($forumtitle == '' || $forumtype == '' || $forumpic == '' || $forumcontent == '' || $forumcontentstrut == ''){
    $output['code'] = '401';
    $output['error'] = '內容不可為空字串';
    $output['success'] = false;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// 亂數產生clicks
$forumclicks = rand(1,100);
// getnow
date_default_timezone_set('Asia/Taipei');
$forumdate = strval(date("Y-m-d H:i:s"));
// arthur
$forumarthur = intval($_SESSION['admin']['member_sid']);

$forumsql = 'INSERT INTO `forum`(`forum_title`, `forum_content`, `forum_content_preview`, `forum_pic`, `forum_type`, `forum_clicks`, `forum_uploadtime`, `forum_arthur`) VALUES (?,?,?,?,?,?,?,?)';
$forumstmt = $pdo->prepare($forumsql);
$forumstmt->execute([$forumtitle, $forumcontent, $forumcontentstrut, $forumpic, $forumtype, $forumclicks, $forumdate, $forumarthur]);

if($forumstmt->rowCount() == 1){
    $output['code'] = '200';
    $output['error'] = '新增成功';
    $output['success'] = true;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
};