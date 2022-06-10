<?php
require './parts/movwe_connect_db.php';

$output = [
    'code' => '0',
    'error' => '',
    'success' => 'false',
];

// 產生亂數function
function generateRandomString($length){
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
};

// 有打邀請碼給多少點
$givepoint = 1000;
$regmail = isset($_POST['newmail']) ? trim($_POST['newmail']) : '';
$regpsd = isset($_POST['newpsd']) ? trim($_POST['newpsd']) : '';
$reginvite = ($_POST['newmail'] == 0) ? '' : $givepoint;

// 如果沒拿到email or psd 返回
if ($regmail == '' || $regpsd == '') {
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};
// 亂數產生invitecode
$newinvite = generateRandomString(10);
// 亂數產生member nickname跟id
$newnickname = 'user' . generateRandomString(4);
// 預設頭貼
$newavatar = 'default_avatar.jpeg';
// insert to database
$regsql = 'INSERT INTO `member`(`member_id`, `member_email`, `member_password`, `member_invitecode`, `member_nickname`, `member_avatar`, `member_points`) VALUES (?,?,?,?,?,?,?)';
$regsqlstmt = $pdo->prepare($regsql);
$regsqlstmt->execute([$newnickname, $regmail, $regpsd, $newinvite, $newnickname, $newavatar, $reginvite]);

$output['rowcount'] = $regsqlstmt->rowCount();
if ($regsqlstmt->rowCount()) {
    $output['success'] = 'true'; 
    $output['avatar']= $newavatar;
    $output['name']= $newnickname;
}else{
    $output['success'] = 'false'; 
    $output['error'] = '沒新增成功'; 
    $output['code'] = '401'; 
};

echo json_encode($output);
