<?php

	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	
	$dat = select_db("off_profession","pro_name","pro_code='{$_POST['major']}'");
	$res = mysqli_fetch_array($dat);
	$arr = array(
	"stu_class"=>$_POST['class'],
	"stu_depart"=>$_POST['depart'],
	"stu_major"=>$res['pro_name'],
	"stu_majorNum"=>$_POST['major']
	);
	$rows = update_db("off_student",$arr,"stu_num='{$_POST['nums']}'");
	if($rows == 1){
			skip('./turn_major.php','转专业成功');
	}
		
	

?>