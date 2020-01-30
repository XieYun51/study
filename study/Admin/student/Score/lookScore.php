<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	if(@$_SESSION['auth'] != 99){
	skip("../../../index.php","非法访问，你的攻击行为已经被记录");
	
}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../../layui/css/layui.css"/>
		<style type="text/css">
			@media  (min-width:1000px ) {
				table{
					width: 80% !important;
				}
			}
			td,th{
			 	text-align: center !important;
			}
			button a,button a:hover{
				color: white;
			}
		</style>
	</head>
	<body>
		
		<center>		
<table class="layui-table">    
    <tr>
    	<th>学号</th>
    	<th>课程名称</th>
    	<th>成绩</th>
    </tr>
    <?php 
    	
    	
    	$res = select_db("off_score","*","sco_stuCode='{$_SESSION['num']}' and sco_term='{$_POST['term']}'");
	while($result = mysqli_fetch_array($res)){
    	?>
    <tr>
    	<td><?php echo $result['sco_stuCode'];?></td>
    	<td><?php 
    		$data = select_db("off_course","cou_name","cou_code='{$result['sco_course']}'");
    		$arr = mysqli_fetch_array($data);
    		echo $arr['cou_name'];?></td>
    	<td><?php echo $result['sco_stuScore'];?></td>
    </tr>	
    
    <?php }?>
</table>
</center>
		
	</body>
</html>
