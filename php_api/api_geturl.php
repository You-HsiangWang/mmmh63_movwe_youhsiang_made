<?php
if(! isset($_SESSION)){
    session_start();
};

$nowurl = isset($_GET['nowurl']) ? trim($_GET['nowurl']) :'';

$_SESSION['backtourl'] = [
    'url' => $nowurl,
];

echo json_encode($_SESSION['backtourl']['url']);