<?php 
include'config.php';
include'utility.php';

$username = $_GET['username'];

$pdo = db_open();

$sqlstr = "SELECT * FROM user WHERE username=?";

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $username, PDO::PARAM_INT);

if($sth->execute()){
	if($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$uid = $row['uid'];
		$username = convert_to_html($row['username']);
		$user_PWD = convert_to_html($row['user_PWD']);
		$email_address = convert_to_html($row['email_address']);
		$birthday = convert_to_html($row['birthday']);
		$authority = convert_to_html($row['authority']);
		$remark = convert_to_html($row['remark']);

		$data = <<< HEREDOC
		<table class="table">
	        <tr><th>代碼</th><td>{$uid}</td></tr>
	        <tr><th>姓名</th><td>{$username}</td></tr>
	        <tr><th>密碼</th><td>{$user_PWD}</td></tr>
	        <tr><th>電子郵件</th><td>{$email_address}</td></tr>
	        <tr><th>生日</th><td>{$birthday}</td></tr>
	        <tr><th>權限</th><td>{$authority}</td></tr>
	        <tr><th>備註</th><td>{$remark}</td></tr>
      	</table>
HEREDOC;
	}
	else{
		$data = "找不到資料!";
	}
}
else{
	$data = error_message('display');
}

$html = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>輸出</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="login_div">
		{$data}
		<a href="login.php" class="btn btn-primary" role="button">回到登入頁面</a>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
HEREDOC;

echo $html;
?>