<?php
	
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	
	$arr = array(
	"dep_code"=>$_POST['code'],
	"dep_name"=>$_POST['name'],
	"dep_briefName"=>$_POST['brief']
	
	);
	
	$rows = update_db("off_department",$arr,"dep_code='{$_POST['codes']}'");
	if($rows == 1){
		echo "<script>alert('修改成功');</script>";
	}else{
		echo "<script>alert('修改失败');</script>";
	}
	

?>