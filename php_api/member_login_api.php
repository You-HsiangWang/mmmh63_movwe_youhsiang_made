<?php

require './parts/movwe_connect_db.php';

$output = [
    'emailsuccess' => false,
    'code' => 0,
    'mEmail' => '',
    'mAvatar' => '',
    'mNickname' => '',
];

//判斷是否有填好email
$email = isset($_POST['member_email']) ? trim($_POST['member_email']) : '';

if(empty($email)){
    $output['error'] = '請輸入email';
    $output['code'] = 'em401'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

//做判斷 抓出資料庫的data 跟 輸入的比對
$sql = "SELECT `member_sid`, `member_id`, `member_email`, `member_password`, `member_invitecode`, `member_avatar`, `member_nickname` FROM `member` WHERE `member_email`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$row = $stmt->fetch();

//empty可以直接判斷
if(empty($row)){
    $output['error'] = '查無此帳號或email輸入錯誤';
    $output['code'] = 'em402';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

if(!empty($row)){
    $output['emailsuccess'] = true;
    $output['code'] = 'em200';
    $_SESSION['admin'] = [
        'member_id' => $row['member_id'],
        'member_email' => $row['member_email'],
        'member_nickname' => $row['member_nickname'],
        'member_avatar' => $row['member_avatar'],
    ];
    $output['mAvatar'] = $row['member_avatar'];
    $output['mEmail'] = $row['member_email'];
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    // echo json_encode($_SESSION, JSON_UNESCAPED_UNICODE);
    exit;
}else{
    $output['error'] = '雖然不可能但還是錯了';
    $output['code'] = 'em403';
    $output['row'] = $row;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// echo json_encode($output, JSON_UNESCAPED_UNICODE);