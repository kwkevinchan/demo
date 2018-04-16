<?php 
session_start();

unset($_SESSION['username']);
unset($_SESSION['authority']);

$ss_username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
$ss_authority = isset($_SESSION["authority"]) ? $_SESSION["authority"] : "";

$html = <<<HEREDOC
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title>登出</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<div class="login_div" style="width:20vw">
			已登出<br />
			使用者:{$ss_username}<br />
			權限:{$ss_authority}<br />
			<a href="index.php">回首頁</a>
		</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
	</html>
HEREDOC;

echo $html;

?>
