<?php

require './parts/movwe_connect_db.php';

// 判斷是否拿到email
$regMail = strval(trim($_POST['regMail']));

// sql搜尋資料庫
$regmailsql = 'SELECT `member_email`FROM `member` WHERE `member_email` = ?';
$regmailstmt = $pdo->prepare($regmailsql);
$regmailstmt->execute([$regMail]);
$regmailrow = $regmailstmt->fetch();

if (empty($regmailrow)){
    echo 'true';
    exit;
}else{
    echo 'false';
    exit;
}
