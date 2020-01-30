<?php
	
	include "../includes/fun.inc.php";
	if(isset($_GET['id']) && $_GET['id'] == 0){
		session_destroy();
		skip("../index.php",null);
	}else{
		skip("../index.php","非法访问，攻击行为已记录");
	}
	

?>