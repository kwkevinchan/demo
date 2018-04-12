
<?php 
include'utility.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'default';
$msg = error_massage($type);

$html = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>error</title>
</head>
<body>
	{$msg}
</body>
</html>
HEREDOC;
echo $html;
?>