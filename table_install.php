<?php 

include'config.php';

$pdo = db_open();

$a_table['user'] = ' 
CREATE TABLE user(
	uid 		int(11) NOT NULL auto_increment,
	username 	varchar(255) NULL,
	user_PWD 	varchar(255) NULL,
	email_address varchar(255) NULL,
	birthday 	date default NULL,
	authority	int(11) NULL,
	remark 		varchar(255) NULL,
	PRIMARY KEY (uid)
	)
';

$msg = '';
foreach($a_table as $key=>$sqlstr){
	$msg .= '資料表['. $key . '].....';
	$sth = $pdo->exec($sqlstr);
	if($sth===FALSE){
		$msg .= '無法建立:<br />';
		$msg .= print_r($pdo->errorInfo(),TRUE). '<br />'. $sqlstr;
	}
	else{
		$msg .= '建立完成';
	}
}


$html = <<<HEREDOC
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title>建立資料表</title>
	</head>
	<body>
		<h2>建立結果</h2><br />
		{$msg}
	</body>
	</html>
HEREDOC;

echo $html;

?>