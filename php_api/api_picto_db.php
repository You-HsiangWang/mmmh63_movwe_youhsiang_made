<?php 

require './parts/movwe_connect_db.php';

$picname = isset($_GET['picname']) ? trim($_GET['picname']) : '';
$membersid = isset($_SESSION['admin']['member_sid']) ? +$_SESSION['admin']['member_sid'] : '';

$picnamesql = 'UPDATE `member` SET `member_avatar`= ? WHERE `member_sid` = 1';
$picnamestmt = $pdo->prepare($picnamesql);
$picnamestmt->execute([$picname]);
// $picrow = $picnamestmt->fetch();
$_SESSION['admin']['member_avatar'] = $picname;
// $picrowcount = $picnamestmt->rowCount();

// if(!empty($picrowcount)){
//     echo 'success';
//     $_SESSION['admin']['member_avatar'] = $picname;
// }else{
//     echo 'failed';
// };

