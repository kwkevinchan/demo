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
		$username = convert_to_html($row['username']);
		$user_PWD = convert_to_html($row['user_PWD']);
		$email_address = convert_to_html($row['email_address']);
		$birthday = convert_to_html($row['birthday']);
		$authority = convert_to_html($row['authority']);
		$remark = convert_to_html($row['remark']);

		$data = <<< HEREDOC
		<form class="form-group" action="user_edit_save.php" method="post">
			<div class="form-group row">
				<label for="static_username" class="col-sm-3 col-form-label">帳號</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="username"  id="static_username" value="{$username}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="static_user_PWD" class="col-sm-3 col-form-label">密碼</label>
				<div class="col-sm-9">
					<input type="text" readonly class="form-control-plaintext"  id="static_user_PWD" value="*******">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticusername" class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-9">
					<input type="email" class="form-control" name="email_address" id="staticusername" value="{$email_address}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="static_birthday" class="col-sm-3 col-form-label">生日</label>
				<div class="col-sm-9">
					<input type="date"   id="static_birthday" name="birthday" value="{$birthday}" required>
				</div>
			</div>
			
			<button type="submit" class="btn btn-primary">修改</button>
			
		</form>
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
	<title>修改</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="login_div">
		{$data}<br />
		<a href="index.php">返回首頁</a>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
HEREDOC;

echo $html;
?>