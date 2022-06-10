<?php

require './parts/movwe_connect_db.php';

$output = [
    'passwordsuccess' => false,
    'code' => 0,
    'mNickname' => '',
    'mAvatar' => '',
];

//判斷是否有填好password
$password = isset($_POST['member_password']) ? trim($_POST['member_password']) : '';
$email = isset($_SESSION['admin']['member_email']) ? trim($_SESSION['admin']['member_email']) : '';

if(empty($email)){
    $output['error'] = '請輸入帳號';
    $output['code'] = 'pwem401'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};
if(empty($email)){
    $output['error'] = '請輸入密碼';
    $output['code'] = 'pw401'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

//做判斷 抓出資料庫的data 跟 輸入的比對
$sql = "SELECT `member_sid`, `member_id`, `member_email`, `member_password`, `member_invitecode`,`member_avatar`, `member_nickname`, `member_points` FROM `member` WHERE `member_password`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$password]);

$row = $stmt->fetch();

//empty可以直接判斷
if(empty($row)){
    $output['error'] = '密碼錯誤';
    $output['code'] = 'pw402';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

if(!empty($row)){
    $output['passwordsuccess'] = true;
    $output['code'] = 'em200';
    $_SESSION['admin'] = [
        'member_sid' => $row['member_sid'],
        'member_id' => $row['member_id'],
        'member_email' => $row['member_email'],
        'member_password' => $row['member_password'],
        'member_nickname' => $row['member_nickname'],
        'member_avatar' => $row['member_avatar'],
        'member_loginstatus' => '1',
        'member_points' => $row['member_points'],
    ];
    $output['mNickname'] = $row['member_nickname'];
    $output['mAvatar'] = $row['member_avatar'];

    // 這邊判斷是否從某個需要回去的頁面來
    if(isset($_SESSION['backtourl']['url'])){
        $output['backtourl'] = $_SESSION['backtourl']['url'];
        unset($_SESSION['backtourl']);
    };
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    // echo json_encode($_SESSION, JSON_UNESCAPED_UNICODE);
    exit;
}else{
    $output['error'] = '雖然不可能但還是錯了';
    $output['code'] = 'pw403';
    $output['row'] = $row;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// echo json_encode($output, JSON_UNESCAPED_UNICODE);