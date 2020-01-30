<?php
	include "../../includes/db.info.php";
	include "../../includes/db.inc.php";
	include "../../includes/fun.inc.php";
	if(@$_SESSION['auth'] != 99){
	skip("../../index.php","非法访问，你的攻击行为已经被记录");
	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../layui/css/layui.css"/>
		<style type="text/css">
			@media  (min-width:1000px ) {
				table{
					width: 60% !important;
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
    	<th>考试名称</th>
    	<th>操作</th>
    </tr>
    <?php 
    	//select * from off_examPlan where subdate(now(),interval 3 day) < start_date;
    	
    	$res = select_db("off_examPlan","*","now() between start_date and end_date");
	while($result = mysqli_fetch_array($res)){
		//echo $result['path'];
		//exit;
    	?>
    <tr>
    	
    	<td><?php echo $result['exam_name'];?></td>
    	<td>
 <button type="button" class="layui-btn layui-btn-warm  layui-btn-sm">
  <a  href="<?php 
  	$path = str_replace("C:/wamp64/www","",$result['path']);
  	echo $path;?>" download="考试计划" title="下载" onclick="return confirm('确认下载')">
    			<span class="layui-icon layui-icon-download-circle"></span>
    			</a>
</button> 	
<button type="button" class="layui-btn layui-btn-normal  layui-btn-sm">
  <a  href="#" title="报名" onclick="return confirm('确认报名')">
    			<span class="layui-icon layui-icon-release"></span>
    			</a>
</button> 	
    	</td>
    	
    </tr>	
    
    <?php }?>
</table>
</center>
		
	</body>
</html>
