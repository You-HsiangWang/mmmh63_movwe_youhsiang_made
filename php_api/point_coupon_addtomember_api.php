<?php

require './parts/movwe_connect_db.php';

$output = [
    'couponaddtodb' => false,
    'restpointadtodb' => false,
    'code' => 0,
    'error' => '',
];


$mbgetcpcode = isset($_POST['generatedcpcode']) ? trim($_POST['generatedcpcode']) : '';
$mbgetrestpoints = isset($_POST['restpoints']) ? trim($_POST['restpoints']) : '';
$mbgetmbsid = isset($_POST['nowmbsid']) ? trim($_POST['nowmbsid']) : '';
$mbgetcpsid = isset($_POST['nowcpsid']) ? trim($_POST['nowcpsid']) : '';

// 防止沒拿到參數
if (empty($mbgetcpcode)) {
    $output['error'] = '沒有拿到couponcode';
    $output['code'] = 'mbcp401'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}else if(empty($mbgetcpsid)){
    $output['error'] = '沒有拿到cp sid';
    $output['code'] = 'mbcp402'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}else if(empty($mbgetmbsid)){
    $output['error'] = '沒有拿到mb sid';
    $output['code'] = 'mbcp403'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}else if(empty($mbgetrestpoints) && $mbgetrestpoints != 0){
    $output['error'] = '沒有拿到剩餘點數';
    $output['code'] = 'mbcp404'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// 將資料新增到資料庫 該會員拿到哪張優惠券 優惠碼是什麼
$putcp = 'INSERT INTO `member_has_coupon`(`mhc_member_sid`, `mhc_coupon_sid`, `mhc_coupon_code`) VALUES (?,?,?)';
$putcpstmt = $pdo->prepare($putcp);
$putcpstmt->execute([$mbgetmbsid, $mbgetcpsid, $mbgetcpcode]);

$output['rowCountCp'] = $putcpstmt->rowCount();
if($putcpstmt->rowCount() == 1){
    $output['couponaddtodb'] = true;
    $output['code'] = 'mbcp200';
}else{
    $output['error'] = '優惠券新增失敗';
    $output['code'] = 'mbcp405';
    exit;
};

// 將剩餘點數更新到該會員的資料庫裡 
$putmb = 'UPDATE `member` SET `member_points`=? WHERE `member_sid`=?';
$putmbstmt = $pdo->prepare($putmb);
$putmbstmt->execute([$mbgetrestpoints, $mbgetmbsid]);

$output['rowCountMb'] = $putmbstmt->rowCount();
if($putmbstmt->rowCount() == 1){
    $output['restpointadtodb'] = true;
    $output['code'] = 'mbcp200';
    $_SESSION['admin']['member_points'] = $mbgetrestpoints;
}else{
    $output['error'] = '點數更新失敗';
    $output['code'] = 'mbcp406';
    exit;
};

echo json_encode($output, JSON_UNESCAPED_UNICODE);