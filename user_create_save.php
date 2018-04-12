<?php 
include'config.php';

$username = isset($_POST['username']) ? $_POST['username']:'';
$user_PWD = isset($_POST['user_PWD']) ? $_POST['user_PWD']:'';
$email_address = isset($_POST['email_address']) ? $_POST['email_address']:'';
$birthday = isset($_POST['birthday']) ? $_POST['birthday']:'';
$authority = 0;
//密碼加密
$hash = password_hash($user_PWD, PASSWORD_DEFAULT);

$pdo = db_open();

$sqlstr = "SELECT * FROM user WHERE username=?";

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $username, PDO::PARAM_STR);

$sth->execute();

if($sth->fetchColumn() >=1){
	print '此帳號已經存在!<br /><a href="user_create.php">返回</a>';
	exit;
}
else{
	$sqlstr = "INSERT INTO user(username, user_PWD, email_address, birthday, authority) VALUES (?, ?, ?, ?, ?)";
	$sth = $pdo->prepare($sqlstr);
	$sth->bindValue(1, $username, PDO::PARAM_STR);
	$sth->bindValue(2, $hash, PDO::PARAM_STR);
	$sth->bindValue(3, $email_address, PDO::PARAM_STR);
	$sth->bindValue(4, $birthday, PDO::PARAM_STR);
	$sth->bindValue(5, $authority, PDO::PARAM_INT);

	if($sth->execute()){
		$new_uid = $pdo->lastInsertId();
		$url_display = 'display.php?uid='. $new_uid;
		header('Location: '. $url_display);
	}

	//以下為開發時偵錯使用
	else{
		header('Location: error.php');
		echo print_r($pdo->errorInfo()).'<br />'. $sqlstr; exit;
	}
}
?>