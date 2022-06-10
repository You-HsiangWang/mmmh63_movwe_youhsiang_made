<?php

// require './parts/movwe_connect_db.php';
session_start();



// $output = [
//     'getmycoupondetail' => false,
//     'code' => 0,
//     'error' => '',
// ];
//  $_SESSION = null;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
// ???????
// if (isset($_SESSION['cart'])) {
//     $_SESSION['cart'] = [];
// }

// 這邊只能做一次 前面傳進來請包好
if(! empty($_GET['a'])){
    // $_SESSION['cart'] = $_GET; //取得問號(?)後面所有東西 
    // array_push($_SESSION['cart'], $_GET);
    $_SESSION['cart'] = $_GET['a'];
     // $output['sess'] = $_SESSION;
    // echo json_encode($_)
    echo json_encode($_SESSION, JSON_UNESCAPED_UNICODE); //單純做印出
}
// echo json_encode($_SESSION, JSON_UNESCAPED_UNICODE); 
//單純做印出


//$_SESSION = "apple";
//$_SESSION = "banana";

// echo $_SESSION;

//會被覆蓋