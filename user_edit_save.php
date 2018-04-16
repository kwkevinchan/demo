<?php 
include'config.php';
include 'utility.php';

$username = isset($_POST['username']) ? $_POST['username']:'';
$email_address = isset($_POST['email_address']) ? $_POST['email_address']:'';
$birthday = isset($_POST['birthday']) ? $_POST['birthday']:'';

$pdo = db_open();

$sqlstr = "UPDATE user SET username=?, email_address=?, birthday=? WHERE username=?";

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $username, PDO::PARAM_STR);
$sth->bindValue(2, $email_address, PDO::PARAM_STR);
$sth->bindValue(3, $birthday, PDO::PARAM_STR);
$sth->bindValue(4, $username, PDO::PARAM_STR);

echo $username;
echo $email_address;
echo $birthday;
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
?>