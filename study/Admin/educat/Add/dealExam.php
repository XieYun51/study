<?php
header("content-type:text/html;charset=UTF-8");
include "../../../includes/db.info.php";
include "../../../includes/db.inc.php";
include "../../../includes/fun.inc.php";


	$end_date = date("Y-m-d H:i:s",strtotime("{$_POST['expire']} day"));

	$type = explode(".",$_FILES['plan']['name']);
	$file = $_FILES['plan'];
	if($type[1] == "xls" || $type[1] == "xlsx"){
	
	
	
	
	if($file['size']>2048000){ //文件大小超过2MB
    skip("../exam_plan.php","文件大小不能超过2MB");
    exit();
	}
	
	if($file['error']){  //存在错误
 	skip("../exam_plan.php","没有获取到上传文件");
    exit();
	}
	
	$tmpname = $file['tmp_name'];  //文件临时存储路径名 
	$date = date("i:s");
	$str = stristr($file['name'],'.' );
	$file['name'] = $date.$str;
	$path = "C:/wamp64/www/study/Admin/system/upload/".$file['name'];
	
	$source = iconv("UTF-8","gb2312",$path);
	if(is_uploaded_file($tmpname)){  //临时文件存在
    $mvd = move_uploaded_file($tmpname,$source); //移动到自定义的位置
    if(!$mvd){
        skip("../exam_plan.php","上传失败，文件转存过程出错");
        exit(500);
    }else{
    	$arr = array(
		"path"=>$path,
		"end_date"=>$end_date,
		"exam_name"=>$_POST["name"]
		);
		$rows = insert_db("off_examPlan",$arr);
		
		if($rows == 1){
			skip("../exam_plan.php","考试计划发布成功");
		}
	  }
	}
}else{
		skip("../exam_plan.php","请上传Excel文件");
		exit();
}
	
	
	
	
	
	
	
	
	
	




?>