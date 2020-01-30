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
		<link rel="stylesheet" type="text/css" href="../../Styles/public.css"/>
		<style type="text/css">
				tr,th,td{
		text-align: center !important;
			}
			@media (max-width: 600px) {
				
				td,th{
					font-size: 12px !important;
				}
			}
			caption a{
				position: relative;
				top: -5px;
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
	<caption><a href="Add/addClass.php"><span class="layui-icon layui-icon-add-1"></span>&nbsp;新增班级</a></caption>
    
    <tr>
    	<th>班级编号</th>
    	<th>班级名称</th>
    	<th>所属专业</th>
    	<th>学期</th>
    </tr>
    <?php 
    	$res = page("off_class","*",8,null);
    	
	while($class = mysqli_fetch_array($res['result'])){
    	?>
    <tr>
    	
    	<td><?php echo $class['cla_code'];?></td>
    	<td><?php echo $class['cla_name'];?></td>
    	<td><?php echo $class['cla_profess'];?></td>
    	<td><?php echo $class['cla_term'];?></td>
    	
    </tr>	
    
    <?php }?>
</table>
		
	<button type="button" class="layui-btn layui-btn-normal layui-btn-radius"><a href="<?php 
		$pre = page("off_class","*",8,null);
		echo $_SERVER['PHP_SELF'].'?page='.$pre['prePage']; ?>">上一页</a></button>
	<button type="button" class="layui-btn layui-btn-normal  layui-btn-radius"><a href="<?php
		$next = page("off_class","*",8,null); 
		echo $_SERVER['PHP_SELF'].'?page='.$next['nextPage']; ?>">下一页</a></button>
</center>
	</body>
</html>
