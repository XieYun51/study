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
					font-size: 12px !important;
					
				}
			}
		caption a{
				position: relative;
				top: -5px;
			}
			@media (min-width: 1000px) {
			table{
				width: 90% !important;
			}
			}
			button a,button a:hover{
				color: white;
			}
		</style>
	
	</head>
	<body>
<center>
		
<table class="layui-table">
	<caption><a href="#"><span class="layui-icon layui-icon-upload"></span>&nbsp;上传学期教学计划</a></caption>
    <tr>
    	<th>专业名称</th>
    	<th>课程名称</th>
    	<th>总学时</th>
    	<th>课程性质</th>
    	<th>课程属性</th>
    	
    	
    </tr>
    <?php 
  	if(isset($_POST['term'])){
		$_SESSION['term'] = $_POST['term'];
    	}
    $dat = page("off_teachPlan","*",8,"where pla_version='{$_SESSION['term']}' ");	
	while($pla = mysqli_fetch_array($dat['result'])){
    	?>
    <tr>
    	<td><?php echo $pla['pla_major'];?></td>
    	<td><?php echo $pla['pla_courName'];?></td>
    	<td><?php echo $pla['pla_nature'];?></td>
    	<td><?php echo $pla['pla_unit'];?></td>
    	<td><?php echo $pla['pla_sumTime'];?></td>
    	
    </tr>	
  <?php }
  ?>  
    
</table>

	<button type="button" class="layui-btn layui-btn-normal  layui-btn-radius"><a href="<?php 
		$pre = page("off_teachPlan","*",8,"where pla_version='{$_SESSION['term']} '");
		echo $_SERVER['PHP_SELF'].'?page='.$pre['prePage']; ?>">上一页</a></button>
	<button type="button" class="layui-btn layui-btn-normal layui-btn-radius"><a href="<?php
		$next = page("off_teachPlan","*",8,"where pla_version='{$_SESSION['term']} '"); 
		echo $_SERVER['PHP_SELF'].'?page='.$next['nextPage']; ?>">下一页</a></button>
	
	
</center>


		
	</body>
</html>
