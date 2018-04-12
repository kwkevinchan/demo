<?php 
include'config.php';
include'utility.php';

$username = isset($_POST['username']) ? $_POST['username']:'';
$user_PWD_hash = isset($_POST['user_PWD_hash']) ? $_POST['user_PWD_hash']:'';

session_start();

$pdo = db_open();

$sqlstr = "SELECT * FROM user WHERE username=?";

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $username, PDO::PARAM_STR);

$valid = false;

if($sth->execute()){
	if($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$uid = $row['uid'];
		$username = convert_to_html($row['username']);
		$user_PWD = convert_to_html($row['user_PWD']);
		$authority = convert_to_html($row['authority']);



		if(password_verify($user_PWD_hash, $user_PWD)){
			$valid = true;
			$_SESSION['username'] = $username;
			$_SESSION['authority'] = $authority;		
			header('Location: index.php');
		}
		
		else{
			$msg = '密碼錯誤，無法登入';
		}
	}

	else{
	$msg = '帳號輸入錯誤:查無此人';
	}
}
else{
	$msg = error_message('display');
}

print $msg;

?>