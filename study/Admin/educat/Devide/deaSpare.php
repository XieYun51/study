<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	
	$arr = array(
	"spa_assCode"=>$_POST['codes'],
	"spa_claCode"=>$_POST['class']
	);
	$ass = select_db("off_spareCla","*","spa_assCode='{$_POST['codes']}'");
	$conditi = mysqli_fetch_array($ass);
	if($conditi != null){
		skip("../assist_info.php","该辅导员已经聘班了");
		exit;
	}
	$select = explode("-",$_POST['class']);
	$rows = insert_db("off_spareCla",$arr);
	if($rows == 1){
		$state = array("cla_select"=>1);
		if(count($select) == 1){
			$rows = update_db("off_class",$state,"cla_code='{$select[0]}'");
			if($rows == 1){
			skip("../assist_info.php","聘班成功");		
			}
		}else{
			for($i = 0;$i<count($select);$i++){
				update_db("off_class",$state,"cla_code='{$select[$i]}'");
			}
			skip("../assist_info.php","聘班成功");
		}
		
	}

?>
