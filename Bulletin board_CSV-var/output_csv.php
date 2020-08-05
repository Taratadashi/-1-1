<?php
date_default_timezone_set('Asia/Tokyo');
session_start();
$msg=$_POST["message"];
$id=$_SESSION['id'];
$date=date('Y-m-d H:i:s');
//csvに書き込む配列定義
$ary=array($id,$msg,$date);
//書き込むためにファイルを開く
$f=fopen("hitokoto.csv","a");
//正常に開ければ書き込み
if($f){
{
//fputcsv関数で書き込み
fputcsv($f,$ary);
}
}
//ファイルを閉じる
fclose($f);
header('Location: hitokoto.php')
?>