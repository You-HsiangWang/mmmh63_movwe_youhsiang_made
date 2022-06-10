<?php

$db_host = 'localhost';
$db_name = 'movwe_database';
$db_user = 'root';
$db_pass = '';

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //取出資料是一個關聯式陣列 沒有設定預設給索引式和關聯式
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", //取出後要執行的第一個mysql
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options); //建立pdo個體 連線

//沒有啟用session的自動開始
if(! isset($_SESSION)){
    session_start();
};