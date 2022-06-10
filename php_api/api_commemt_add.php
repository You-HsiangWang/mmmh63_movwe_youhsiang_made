<?php
require './parts/movwe_connect_db.php';

$output = [
    'code' => '401',
    'error' => '',
    'success' => false,
];

// 拿到留言資料
$commentvalue = isset($_GET['val']) ? trim($_GET['val']) : '';
$commentavatar = isset($_GET['pic']) ? trim($_GET['pic']) : '';
$commentauther = isset($_GET['ava']) ? trim($_GET['ava']) : '';
$commenttime = isset($_GET['tim']) ? trim($_GET['tim']) : '';
$commentforum = isset($_GET['qrs']) ? trim($_GET['qrs']) : '';
$commentlikes = isset($_GET['like']) ? trim($_GET['like']) : '';
$commentauthersid = isset($_GET['atsid']) ? trim($_GET['atsid']) : '';

// sql語法
if ($commentvalue == '' || $commentavatar == '' || $commentauther == '' || $commenttime == '' || $commentforum == '' || $commentlikes == '' || $commentauthersid == '') {
    $output['code'] = '401';
    $output['error'] = '內容不可為空字串';
    $output['success'] = false;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

$commentsql = 'INSERT INTO `forum_comment`(`f_comment_content`, `f_comment_forum_sid`, `f_comment_authur`, `f_comment_pic`, `f_comment_uploadtime`, `f_comment_likes`, `f_comment_authur_sid`) VALUES (?,?,?,?,?,?,?)';
$commentstmt = $pdo->prepare($commentsql);
$commentstmt->execute([$commentvalue, $commentforum, $commentauther, $commentavatar, $commenttime, $commentlikes, $commentauthersid]);

if ($commentstmt->rowCount() == 1) {
    $output['code'] = '200';
    $output['error'] = '新增成功';
    $output['success'] = true;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
};
