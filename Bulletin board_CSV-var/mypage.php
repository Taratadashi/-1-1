<?php

	date_default_timezone_set('Asia/Tokyo');
	session_start();

	//ログインユーザ情報を取得
	$id = $_GET['id'];

	//ログインしていない場合はログインページに飛ばす
	if($id == ''){
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: login.php");
		exit(0);
	}
	else{
	$mysqli = new mysqli($dbserver, $dbuser, $passwd, $dbname);
	$mysqli->set_charset('utf-8');
	$sql = "select * from user where id='$id'";
	$stmt=mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_assoc($stmt);
	}
?>
<?php
header('Content-Type: text/html; charset=UTF-8');
?>

<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" href="css/default.css" type="text/css">
	<script src="script/jquery-3.1.0.min.js"></script>
</head>
<body>
<div id="mypage">
<h2>マイページ</h2>
<p class="comment"><a href="hitokoto.php">←戻る</a>
　　　　　   　　　　　　　　　　　　　　　　　　　<a href="logout.php">ログアウト</a></p>
<div id="mypage2">
<p><img src=.\image\<?php echo $row['img'];?> width="100" height="100"><br>
<strong><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8');?>さん</strong>
こんにちは


</p>
</div>
</div>
<br />
<div id="input">
<h1>今までの投稿</h1>
<div id="detail">
<p><img src=.\image\<?php echo $row['img'];?> width="100" height="100"><br>
<strong><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8');?>さん</strong>
こんにちは


</p>
</div>
</div>


</body>
</html>