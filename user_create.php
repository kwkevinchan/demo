<?php

include'config.php';

$html=<<< HEREDOC
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>建立帳號</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<form class="login_div" action="user_create_save.php" method="post">
		帳號:<input type="text" name="username" size="16" required><br />
		密碼:<input type="password" name="user_PWD" size="16" required><br />
		電子郵件:<input type="text" name="email_address" required><br />
		生日:<input type="date" name="birthday" size="16" required><br />
		<input type="submit" value="建立"><a href="login.php">返回登入畫面</a>
	</form>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
HEREDOC;

echo $html;
?>