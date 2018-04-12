<?php 
function error_massage($type='', $ext=''){
	$a_msg = array(
		'user_create_save' 	=> '無法新增資料(user_create_save)',
		'display'			=> '無法列出資料(display)',
		'default'			=> '有錯誤發生'
	);

	$msg = isset($a_msg[$type]) ? $a_msg[$type] : $a_msg['default'];

	if($type=='page'){
		$msg = '檔案資料['. $ext. ']不存在';
	}

	$ret_str = '<h2>錯誤警告</h2>';
	$ret_str .= '<p>'. $msg. '</p>';

	return $ret_str;
}

function convert_to_html($sText){
	$_str = $sText;
	$_str = htmlspecialchars($_str, ENT_QUOTES, 'UTF-8');
	return $_str;
}
?>