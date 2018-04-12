<?php 
include'config.php';
include'utility.php';

$uid = $_GET['uid'];

$pdo = db_open();

$sqlstr = "SELECT * FROM user WHERE uid=?";

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $uid, PDO::PARAM_INT);

if($sth->execute()){
	if($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$uid = $row['uid'];
		$username = convert_to_html($row['username']);
		$user_PWD = convert_to_html($row['user_PWD']);
		$email_address = convert_to_html($row['email_address']);
		$birthday = convert_to_html($row['birthday']);
		$remark = convert_to_html($row['remark']);

		$data = <<< HEREDOC
		<table>
	        <tr><th>代碼</th><td>{$uid}</td></tr>
	        <tr><th>姓名</th><td>{$username}</td></tr>
	        <tr><th>密碼</th><td>{$user_PWD}</td></tr>
	        <tr><th>電子郵件</th><td>{$email_address}</td></tr>
	        <tr><th>生日</th><td>{$birthday}</td></tr>
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
	{$data}<br />
	<a href="login.php">回到登入頁面</a>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
HEREDOC;

echo $html;
?>