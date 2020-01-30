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
			
			button a,button a:hover{
				color: white;
			}
			@media (min-width: 1000px) {
			table{
				width: 60% !important;
			}
			}
		</style>
	
	</head>
	<body>
<center>		
<table class="layui-table">
	
    
    <tr>
    	<th>考试名称</th>
    	<th>下载统计报表</th>
    </tr>
    <?php 
    	$res = page("off_examPlan","*",8,null);
    	
	while($class = mysqli_fetch_array($res['result'])){
    	?>
    <tr>
    	<td><?php echo $class['cla_code'];?></td>
    	<td>    		
<button type="button" class="layui-btn layui-btn-normal layui-btn-sm">
  <a onclick="return confirm('确认下载统计报表表')" href="#"  title="下载">
    			<span class="layui-icon layui-icon-download-circle"></span>
    		</a>
</button>    		
    	</td>    
    </tr>	
    
    <?php }?>
</table>
		
	<button type="button" class="layui-btn layui-btn-normal layui-btn-radius"><a href="<?php 
		$pre = page("off_examPlan","*",8,null);
		echo $_SERVER['PHP_SELF'].'?page='.$pre['prePage']; ?>">上一页</a></button>
	<button type="button" class="layui-btn layui-btn-normal  layui-btn-radius"><a href="<?php
		$next = page("off_examPlan","*",8,null); 
		echo $_SERVER['PHP_SELF'].'?page='.$next['nextPage']; ?>">下一页</a></button>
</center>
	</body>
</html>
