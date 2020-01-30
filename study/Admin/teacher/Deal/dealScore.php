<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	if(@$_SESSION['auth'] != 2){
	skip("../../../index.php","非法访问，你的攻击行为已经被记录");	
}
	
	
	$res = select_db("off_student","stu_num","stu_class='{$_POST['coded']}'");
	$arr = null;
	$sumNum = null;
	while($stu = mysqli_fetch_array($res)){
		$arr[] = $stu;
	}
	for($i = 0;$i < count($arr);$i++){
		$sumNum[] = $arr[$i]['stu_num'];
	}
	$a = 2;
	if(isset($_POST['SCO'])){
	$SCO = $_POST['SCO'];
	for($i = 0;$i < count($SCO);$i++){
		
		$data = array(
		"sco_stuCode"=>$sumNum[$i],
		"sco_course"=>$_POST['course'],
		"sco_term"=>$_POST['term'],
		"sco_stuScore"=>$SCO[$i],
		"sco_teacher"=>$_SESSION['num'],
		"sco_class"=>$_POST['coded']
		);
		insert_db("off_score",$data);
		$a++;
	}	
	}
	
	if(isset($_POST['CLA'])){
	$CLA= $_POST['CLA'];
	for($i = 0;$i < count($CLA);$i++){
		$data = array(
		"sco_stuCode"=>$sumNum[$i],
		"sco_course"=>$_POST['course'],
		"sco_term"=>$_POST['term'],
		"sco_stuScore"=>$CLA[$i],
		"sco_teacher"=>$_SESSION['num'],
		"sco_class"=>$_POST['coded']
		);
		insert_db("off_score",$data);
		$a++;
	}	
	}
	
	if($a > 2){
		skip("../search.php","成功录入成绩");
	}else{
		skip("../search.php","录入成绩失败");
	}
	
	

?>