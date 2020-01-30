<?php
include "../../../includes/db.info.php";
include "../../../includes/db.inc.php";
include "../../../includes/fun.inc.php";

function del($tab,$url,$condition){
	$dats = delete_db($tab,$condition);
	if($dats == 1){
		skip($url,"删除成功");
	}else{
		echo "<script>alert('删除失败');</script>";
	}
}


if(isset($_GET['id'])){
	switch($_GET['id']){
		case 0:
		del("off_department","../depart_info.php","where dep_code='{$_GET['code']}'");
		break;
		case 1:
		del("off_profession","../major_info.php","where pro_code='{$_GET['code']}'");
		break;
		case 2:
		del("off_teacher","../teacher_info.php","where tea_code='{$_GET['code']}'");
		break;
		case 3:
		del("off_assist","../assist_info.php","where ass_code='{$_GET['code']}'");
		break;
		case 4:
		del("off_education","../Auth/userShow.php","where edu_code='{$_GET['code']}'");
		break;
		default:	
	}
}




?>