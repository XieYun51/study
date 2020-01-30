<?php
	header("Content-Type:text/html;charset=utf-8");
	include "../includes/db.info.php";
	include "../includes/db.inc.php";
	include "../includes/fun.inc.php";
	$user = trim($_POST['user']);
	$pwd = trim($_POST['pwd']);
	$info0 = "账号或者密码错误";
	switch($_POST['role']){
		case "学生端":
			 $url1 = "./student/index.php";
			 $url0 = "../index.php";
			 $condition = "stu_num='{$user}' and stu_pwd=sha1('{$pwd}')";
		     vertify("off_student","id",$condition,$url1,null,$url0,$info0);
		     $_SESSION['auth'] = 99;
		     break;
		case "辅导员端":
			 $url1 = "./assist/index.php";
			 $url0 = "../index.php";
			 $condition = "ass_code='{$user}' and ass_pwd=sha1('{$pwd}')";
		     vertify("off_assist","id",$condition,$url1,null,$url0,$info0);
		     $_SESSION['auth'] = 1;
		     break;     
		case "教师端":
		    $url1 = "./teacher/index.php";
			$url0 = "../index.php";
			$condition = "tea_code='{$user}' and tea_pwd=sha1('{$pwd}')";
		    vertify("off_teacher","id",$condition,$url1,null,$url0,$info0);
			$_SESSION['auth'] = 2;
		     break;
		case "教务处端":
		    $url1 = "./educat/index.php";
			$url0 = "../index.php";
			$condition = "edu_code='{$user}' and edu_pwd=sha1('{$pwd}')";
		    vertify("off_education","id",$condition,$url1,null,$url0,$info0);
			$_SESSION['auth'] = 3;
		     break;
		case "管理员端":
			$url1 = "./system/index.php";
			$url0 = "../index.php";
			$condition = "admin_code='{$user}' and admin_pwd=sha1('{$pwd}')";
		    vertify("off_admin","id",$condition,$url1,null,$url0,$info0);
			$_SESSION['auth'] = 4;
		     break;
		default:   
			echo "系统故障";       
	}
	
	

	
	
	
	
	
	
	

	
	

?>