<?php
include "../../../includes/db.info.php";
include "../../../includes/db.inc.php";
include "../../../includes/fun.inc.php";

function add($tabs,$url,$arrs){
	$dats = insert_db($tabs,$arrs);
	if($dats == 1){
		skip($url,"添加成功");
	}else{
		echo "<script>alert('添加失败');</script>";
	}
}

function  repeat($tab,$condition,$url,$info){
		$data = select_db($tab,"id",$condition);
		$rowsd = mysqli_fetch_array($data);
		if($rowsd){
		skip($url,$info);
		exit;
		}
	
}


if(isset($_POST['id'])){
	switch($_POST['id']){
		case 0:
		$arr = array(
		"dep_code"=>$_POST['code'],
		"dep_name"=>$_POST['name'],
		"dep_briefName"=>$_POST['brief']
		);
		repeat("off_department","dep_code='{$_POST['code']}'","addDepart.php","抱歉和已有系部编号重复，重新填写");
		add("off_department","../depart_info.php",$arr);
		break;
		case 1:
		$arr = array(
		"pro_code"=>$_POST['code'],
		"pro_name"=>$_POST['name'],
		"pro_briefName"=>$_POST['brief'],
		"pro_depart"=>$_POST['depart'],
		"pro_time"=>$_POST['term'],
		"pro_depCode"=>$_POST['depCode'],
		"pro_depName"=>$_POST['depName'],
		"pro_level"=>$_POST['level']
		);
		repeat("off_profession","pro_code='{$_POST['code']}'","addMajor.php","抱歉和已有专业号重复，重新填写");
		add("off_profession","../major_info.php",$arr);
		break;
		case 2:
		$array = array(
		"tea_code"=>$_POST['code'],
		"tea_name"=>$_POST['name'],
		"tea_sex"=>$_POST['sex'],
		"tea_country"=>$_POST['country'],
		"tea_place"=>$_POST['province'].$_POST['city'],
		"tea_nation"=>$_POST['nation'],
		"tea_cardType"=>"身份证",
		"tea_cardNum"=>$_POST['card'],
		"tea_title"=>$_POST['title'],
		"tea_class"=>$_POST['class'],
		"tea_unit"=>$_POST['unit'],
		"tea_state"=>"在职",
		"tea_highEdu"=>$_POST['highEdu'],
		"tea_eduDegre"=>$_POST['degre'],
		"tea_comTime"=>$_POST['comTime'],
		"tea_depart"=>$_POST['depart'],
		"tea_pwd"=>sha1("123456")
	);
		repeat("off_teacher","tea_code='{$_POST['code']}'","addTeacher.php","抱歉和已有教师编号重复，重新填写");
		add("off_teacher","../teacher_info.php",$array);
		break;
		case 3:
		$array = array(
		"ass_code"=>$_POST['code'],
		"ass_name"=>$_POST['name'],
		"ass_sex"=>$_POST['sex'],
		"ass_country"=>$_POST['country'],
		"ass_place"=>$_POST['province'].$_POST['city'],
		"ass_nation"=>$_POST['nation'],
		"ass_cardType"=>"身份证",
		"ass_cardNum"=>$_POST['card'],
		"ass_title"=>"无",
		"ass_class"=>"教辅人员",
		"ass_unit"=>"辅导人员",
		"ass_state"=>"在职",
		"ass_highEdu"=>$_POST['highEdu'],
		"ass_eduDegre"=>$_POST['degre'],
		"ass_comTime"=>$_POST['comTime'],
		"ass_depart"=>$_POST['depart'],
		"ass_pwd"=>sha1("123456")
		);
		repeat("off_assist","ass_code='{$_POST['code']}'","addAssist.php","抱歉和已有导员编号重复，重新填写");
		add("off_assist","../assist_info.php",$array);
		break;
		case 4:
		$arr = array(
		"edu_code"=>$_POST['code'],
		"edu_sex"=>$_POST['sex'],
		"edu_name"=>$_POST['name'],
		"edu_depart"=>"教务处",
		"edu_pwd"=>sha1("123456")
		);
		repeat("off_education","edu_code='{$_POST['code']}'","createUser.php","抱歉和已有教务处工作人员账号重复，重新填写");
		add("off_education","../Auth/userShow.php",$arr);
		break;
		case 5:
		$array = array(
		"ass_name"=>$_POST['name'],
		"ass_sex"=>$_POST['sex'],
		"ass_country"=>$_POST['country'],
		"ass_place"=>$_POST['province'].$_POST['city'],
		"ass_nation"=>$_POST['nation'],
		"ass_cardType"=>"身份证",
		"ass_cardNum"=>$_POST['card'],
		"ass_title"=>"无",
		"ass_class"=>"教辅人员",
		"ass_unit"=>"辅导人员",
		"ass_state"=>"在职",
		"ass_highEdu"=>$_POST['highEdu'],
		"ass_eduDegre"=>$_POST['degre'],
		"ass_comTime"=>$_POST['comTime'],
		"ass_depart"=>$_POST['depart'],
		"ass_pwd"=>sha1("123456")
		);
		$data = update_db("off_assist",$array,"ass_code='{$_POST['assCode']}'");
		if($data == 1){
			skip("../assist_info.php","修改成功");
		}
		break;
		default:	
	}
}

?>