<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	
	$arr = array(
	"spa_teaCode"=>$_POST['teaCode'],
	"spa_courseCode"=>$_POST['courseCode'],
	"spa_classCode"=>$_POST['class'],
	"spa_term"=>$_SESSION['term']
	);

$class = explode("-",$_POST['class']);


if(count($class) == 1){
$condition = select_db("off_spareCou","*","spa_classCode like '%{$class[0]}%' and spa_courseCode='{$_POST['courseCode']}'");
$rows = mysqli_fetch_array($condition);

if($rows){
	skip("../spareCou_serch.php","聘课重复请检查");
}else{
	$rowsj = insert_db("off_spareCou",$arr);
	if($rowsj == 1){
	skip("../spareCou_serch.php","聘课成功");
}
}	
}else{
	for($i = 0;$i < count($class);$i++){
		$conditiond = select_db("off_spareCou","*","spa_classCode='{$class[$i]}' and spa_courseCode='{$_POST['courseCode']}'");
		$rows = mysqli_fetch_array($conditiond);
		if($rows){
			skip("../spareCou_serch.php","聘课重复请检查");
			exit;
		}
	}	
	$conditionds = select_db("off_spareCou","*","spa_classCode='{$_POST['class']}' and spa_courseCode='{$_POST['courseCode']}'");
	$rowsd = mysqli_fetch_array($conditionds);
	if($rowsd){
		skip("../spareCou_serch.php","聘课重复请检查");
	}else{
		$rowsj = insert_db("off_spareCou",$arr);
		if($rowsj == 1){
		skip("../spareCou_serch.php","聘课成功");
		}
	}
}


?>