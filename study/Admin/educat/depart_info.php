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
		<script type="text/javascript" src="../../Scripts/jquery-1.10.2.min.js">
			
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
			button a span{
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
	<caption><a href="Add/addDepart.php"><span class="layui-icon layui-icon-add-1"></span>&nbsp;新增单位</a></caption>
    
    <tr>
    	<th>单位编号</th>
    	<th>单位名称</th>
    	<th>单位简称</th>
    	<th>操作</th>
    </tr>
    <?php 
    	$dat = select_db("off_department","*",null);
	while($depart = mysqli_fetch_array($dat)){
    	?>
    <tr>
    	
    	<td><?php echo $depart['dep_code'];?></td>
    	<td><?php echo $depart['dep_name'];?></td>
    	<td><?php echo $depart['dep_briefName'];?></td>
    	<td>
 <button type="button" class="layui-btn layui-btn-danger btn1  layui-btn-sm">
  <a href="Delete/delete.php?id=0&code=<?php echo $depart['dep_code'];?>" onclick="return confirm('确认删除')">
    			<span class="layui-icon layui-icon-delete"></span>
    			</a>
</button>
<button type="button" class="layui-btn layui-btn-normal btn1  layui-btn-sm">
    		<a href="Modify/modify.php?id=<?php echo $depart['dep_code'];?>" title="修改">
    			<span class="layui-icon layui-icon-edit"></span>
    			</a>
</button>
    		
    	</td>
    </tr>	
 </center>   
    <?php }?>
</table>
		
		<script type="text/javascript">
			$(document).ready(function(){
				if($(window).width() < 600){
				$(".btn1").addClass("layui-btn-xs");	
				}
			
			});
		</script>
		
	</body>
</html>
