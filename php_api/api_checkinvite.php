<?php

require './parts/movwe_connect_db.php';

// 判斷是否拿到einvite
$regInvite = strval(trim($_POST['regInvite']));

// sql搜尋資料庫
$reginvitesql = 'SELECT `member_sid` FROM `member` WHERE `member_invitecode` = ?';
$reginvitestmt = $pdo->prepare($reginvitesql);
$reginvitestmt->execute([$regInvite]);
$reginviterow = $reginvitestmt->fetch();

if (!empty($reginviterow)){
    echo 'true';
    exit;
}else{
    echo 'false';
    exit;
}
