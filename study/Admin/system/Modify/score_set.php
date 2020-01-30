<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	
	$data = explode("@",$_GET['code']);
	
	
	$arr = array(
		"sco_state"=>0
		);
		$rows = update_db("off_score",$arr,"sco_class='{$data[1]}' and sco_course='{$data[0]}' and sco_term='{$data[2]}'");
		if($rows > 0){
		skip("../score_info.php","成绩回退成功");
		}
	

?>