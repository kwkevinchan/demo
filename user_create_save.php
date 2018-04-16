<?php 
include'config.php';

$username = isset($_POST['username']) ? $_POST['username']:'';
$user_PWD = isset($_POST['user_PWD']) ? $_POST['user_PWD']:'';
$email_address = isset($_POST['email_address']) ? $_POST['email_address']:'';
$birthday = isset($_POST['birthday']) ? $_POST['birthday']:'';
//權限預設一般會員
$authority = 1;
//密碼加密
$hash = password_hash($user_PWD, PASSWORD_DEFAULT);

$pdo = db_open();

$sqlstr = "SELECT * FROM user WHERE username=?";

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $username, PDO::PARAM_STR);

$sth->execute();
//帳號是否重複檢驗
if($sth->fetchColumn() >=1){
	print '此帳號已經存在!<br /><a href="user_create.php">返回</a>';
	exit;
}
else{
	//生成資料
	$sqlstr = "INSERT INTO user(username, user_PWD, email_address, birthday, authority) VALUES (?, ?, ?, ?, ?)";
	$sth = $pdo->prepare($sqlstr);
	$sth->bindValue(1, $username, PDO::PARAM_STR);
	$sth->bindValue(2, $hash, PDO::PARAM_STR);
	$sth->bindValue(3, $email_address, PDO::PARAM_STR);
	$sth->bindValue(4, $birthday, PDO::PARAM_STR);
	$sth->bindValue(5, $authority, PDO::PARAM_INT);

	if($sth->execute()){
		$new_uid = $pdo->lastInsertId();
		$url_display = 'user_display.php?username='. $username;
		header('Location: '. $url_display);
	}

	//以下為開發時偵錯使用
	else{
		header('Location: error.php');
		echo print_r($pdo->errorInfo()).'<br />'. $sqlstr; exit;
	}
}
?>