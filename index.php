<?php
session_start();
include'config.php';

$ss_username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
$ss_authority = isset($_SESSION["authority"]) ? $_SESSION["authority"] : "";

$login_link = '';

if($ss_authority===""){
	$login_check = "尚未登陸";
	$login_li = '
		<li class="nav-item active">
					<a class="nav-link" href="login.php">login<span class="sr-only">(current)</span></a>
		</li>
	';
}
else{
	$login_check = "已登入，". $ss_username. "歡迎";
	$login_link = '
		<li class="nav-item active">
			<a class="nav-link" href="user_edit.php?username='.$ss_username.'">修改帳號</a>
		</li>
	';
	$login_li = '
		<li class="nav-item active">
			<a class="nav-link" href="logout.php">logout<span class="sr-only">(current)</span></a>
		</li>
	';
}

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>index</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">


</head>
<body>
	<header class="container-fluid header">
		<h1>測試網站</h1>
	</header>
	<nav class="navbar navbar-expand-md navbar-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse flex-row" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="#">首頁<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">資料庫串接測試</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Google API</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">laravel筆記</a>
				</li>
			</ul>
		</div>
		<div class="flex-row-reverse">
			<ul class="navbar-nav">
				<li class="nav-item" style="padding:10px">
					{$login_check}
				</li>
				{$login_link}
				{$login_li}
			</ul>
		</div>
	</nav>
	
	
	<section class="row">
		<ul class="sidelist col-md-2">
			<li><a href="#">首頁</a></li>
			<li><a href="#">資料庫串接測試</a></li>
			<li><a href="#">Google API</a></li>
			<li><a href="#">laravel筆記</a></li>
		</ul>
		<div class="main col-md-8">
			<a href="table_install.php">建立資料表</a>
			內容內容內容內容內容內容內容內容內容內容內容<br />
			{$login_check}<br />
			權限:{$ss_authority}<br />
			使用者:{$ss_username}<br />
		</div>
	</section>

	<footer class="footer">footer</footer>

<!--js-->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>
HEREDOC;

echo $html;



?>