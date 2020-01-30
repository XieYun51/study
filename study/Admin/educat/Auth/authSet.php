<?php

include "../../../includes/db.info.php";
include "../../../includes/db.inc.php";
include "../../../includes/fun.inc.php";

function set($state,$info0,$info1){
	$dats = select_db("off_education","edu_auth","edu_code='{$_GET['code']}'");
	$result = mysqli_fetch_array($dats);
	if($result['edu_auth'] == $state){
		skip("userShow.php",$info0);
		exit;
	}else{
		$arr = array("edu_auth"=>$state);
		$rows = update_db("off_education",$arr,"edu_code='{$_GET['code']}'");
		if($rows == 1){
			skip("userShow.php",$info1);
		}
	}
}

if(isset($_GET['id'])){
	switch($_GET['id']){
		case 0:
		set(0,"已经是加锁状态","加锁成功");
		break;
		case 1:
		set(1,"已经是解锁状态","解锁成功");
		break;
		default:	
	}
}




?>