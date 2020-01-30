<?php
	include "../includes/db.info.php";
	include "../includes/db.inc.php";
	include  "../includes/fun.inc.php";

	switch($_SESSION['auth']){
		case 99:
			 chgPwd("off_student","stu_pwd","stu_num='{$_SESSION['num']}'");
		     break;
		case 1:
			 chgPwd("off_assist","ass_pwd","ass_code='{$_SESSION['num']}'");
		     break;     
		case 2:
			 chgPwd("off_teacher","tea_pwd","tea_code='{$_SESSION['num']}'");	
		     break;
		case 3:
		     chgPwd("off_education","edu_pwd","edu_code='{$_SESSION['num']}'");
		     break;
		case 4:
			 chgPwd("off_admin","admin_pwd","admin_code='{$_SESSION['num']}'");
		     break;
		default:   
			echo "系统故障";       
	}

?>