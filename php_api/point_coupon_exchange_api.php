<?php

require './parts/movwe_connect_db.php';

$output = [
    'coupongeto' => false,
    'code' => 0,
    'cpSid' => '',
    'cpName' => '',
    'cpCode' => '',
    'cpBrand' => '',
    'cpBrandimg' => '',
    'cpPrice' => '',
    'cpNotice' => '',
    'cpRest' => '',
    'cpTotal' => '',
    'cpImg' => '',
];
// 是否有拿到domid
$domid = isset($_POST['domid']) ? trim($_POST['domid']) : '';

// 判斷是否有登入
if (isset($_SESSION['admin'])) {
    $membersid = $_SESSION['admin']['member_sid'];
} else {
    // 去登入吧
    $output['error'] = '你沒登入';
    $output['code'] = 'cp400'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// 拿到會員點數
$getmoney = 'SELECT * FROM `member` WHERE `member_sid` ='. $membersid;
$getmoneystmt = $pdo->query($getmoney);
$getmoneyrow = $getmoneystmt->fetch();
if(empty($getmoneyrow)){
    $output['error'] = '沒有拿到點數';
    $output['code'] = 'cp400'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};
if(!empty($getmoneyrow)){
    $output['money'] = $getmoneyrow['member_points'];
};

if (empty($domid)) {
    $output['error'] = '沒有拿到coupon id';
    $output['code'] = 'cp401'; //靠code判斷哪邊結束
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// 用id拿到優惠券
$getcp = 'SELECT * FROM `coupon` WHERE `coupon_sid`=?';
$stmt = $pdo->prepare($getcp);
$stmt->execute([$domid]);
$row = $stmt->fetch();

//empty可以直接判斷
if (empty($row)) {
    $output['error'] = '沒有此coupon';
    $output['code'] = 'cp402';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

if (!empty($row)) {
    $output['coupongeto'] = true;
    $output['code'] = 'em200';
    $output['cpSid'] = $row['coupon_sid'];
    $output['cpName'] = $row['coupon_name'];
    $output['cpCode'] = $row['coupon_code'];
    $output['cpBrand'] = $row['coupon_brand'];
    $output['cpBrandimg'] = $row['coupon_brand_img']? $row['coupon_brand_img'] : '';
    $output['cpPrice'] = $row['coupon_price'];
    $output['cpNotice'] = $row['coupon_notice'];
    $output['cpRest'] = $row['coupon_rest'];
    $output['cpTotal'] = $row['coupon_total'];
    $output['cpImg'] = $row['coupon_picture'];
    // $_SESSION['admin'] = [
    //     'member_points' => $_SESSION['admin']['member_points'] - $row['coupon_price'],
    // ];
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    // echo json_encode($_SESSION, JSON_UNESCAPED_UNICODE);
    exit;
} else {
    $output['error'] = '雖然不可能但還是錯了';
    $output['code'] = 'cp403';
    $output['row'] = $row;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

// echo json_encode($output, JSON_UNESCAPED_UNICODE);
