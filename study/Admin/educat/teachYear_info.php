<?php
	include "../../includes/db.info.php";
	include "../../includes/db.inc.php";
	include "../../includes/fun.inc.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../layui/css/layui.css" />
		<script type="text/javascript" src="../../layui/layui.js">
		</script>
		<style type="text/css">
				tr,th,td{
		text-align: center !important;
			}
			@media (max-width: 600px) {
				
				td,th{
					height: 20px;
				}
			}
			
			
			.icon2{
				position: relative;
				left: 10px;
				
			}
			button a,button a:hover{
				color: white;
			}
			@media (min-width: 1000px) {
			table{
				width: 90% !important;
			}
			}
		</style>
	
	</head>
	<body>
<center>		
<table class="layui-table">
	
    
    <tr>
    	<th>开始年度</th>
    	<th>结束年度</th>
    	<th>学期</th>
    	<th>学期名称</th>
    	<th>学期简称</th>
    	<th>是否为当前学期</th>
    </tr>
    <?php 

	$res = select_db("off_teachYear","*",null);
	while($info = mysqli_fetch_array($res)){
    	?>
    <tr>
    	<td><?php echo $info['teach_start'];?></td>
    	<td><?php echo $info['teach_end'];?></td>
    	<td><?php echo $info['teach_term'];?></td>
    	<td><?php echo $info['teach_name'];?></td>
    	<td><?php echo $info['teach_brief'];?></td>
    	<td><?php echo $info['teach_state'];?></td>
    </tr>	
    
    <?php }?>
</table>
</center>
	</body>
</html>
