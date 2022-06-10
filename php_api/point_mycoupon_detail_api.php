<?php

require './parts/movwe_connect_db.php';

$output = [
    'getmycoupondetail' => false,
    'code' => 0,
    'error' => '',
];

$domid = isset($_POST['domid']) ? trim($_POST['domid']) : '';
$cpid = isset($_POST['cpid']) ? trim($_POST['cpid']) : '';
$cpmbid = isset($_POST['cpmbid']) ? trim($_POST['cpmbid']) : '';

// 防止沒有拿到參數
if (empty($domid)) {
    $output['error'] = '沒有拿到domid';
    $output['code'] = 'mycp401'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}else if(empty($cpid)){
    $output['error'] = '沒有拿到cpid';
    $output['code'] = 'mycp402'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}else if(empty($cpmbid)){
    $output['error'] = '沒有拿到cpmbid';
    $output['code'] = 'mycp403'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// 搜尋資料庫拿到 被點擊的那張券
$getonemycp = 'SELECT * FROM `member_has_coupon` FULL JOIN `coupon` ON `mhc_coupon_sid` = `coupon_sid` WHERE `mhc_member_sid` =? AND `mhc_sid` =?';
$getonemystmt = $pdo->prepare($getonemycp);
$getonemystmt->execute([$cpmbid, $cpid]);
$getonemyrow = $getonemystmt->fetch();


if(!empty($getonemyrow)){
    $output['getmycoupondetail'] = true;
    $output['code'] = 'mycp201';
    $output['mycpcode'] = $getonemyrow['mhc_coupon_code']; 
    $output['mycpcouponsid'] = $getonemyrow['mhc_coupon_sid']; 
    $output['mycpmembersid'] = $getonemyrow['mhc_member_sid']; 
    $output['mhcsid'] = $getonemyrow['mhc_sid']; 
    $output['mycpbrand'] = $getonemyrow['coupon_brand']; 
    $output['mycpname'] = $getonemyrow['coupon_name']; 
    $output['mycpbrandimg'] = $getonemyrow['coupon_brand_img']; 
    $output['mycppicture'] = $getonemyrow['coupon_picture']; 
    $output['mycpprice'] = $getonemyrow['coupon_price']; 
    $output['mycpnotice'] = $getonemyrow['coupon_notice']; 

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}else{
    $output['getmycoupondetail'] = false;
    $output['code'] = 'mycp404';
    $output['error'] = 'sql沒有查到資料';

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};