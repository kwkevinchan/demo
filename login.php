<?php
$html = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>login page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="login_div rounded">
	<h4>帳號登入</h4><br />
	<form name="account" action="login_check.php" method="post" >
		帳號:<input type="text" name="username" size="16" value=""><br />
		密碼:<input type="text" name="user_PWD_hash" size="16" value=""><br />
		<input type="submit" value="登入">
		<a href="user_create.php">創立新帳號</a>
	</form>
	</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
HEREDOC;

echo $html;
?>