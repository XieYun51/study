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
			button a,button a:hover{
				color: white;
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
		</style>
	
	</head>
	<body>
<center>		
<table class="layui-table">
	<caption><a href="Add/addMajor.php"><span class="layui-icon layui-icon-add-1"></span>&nbsp;新增专业</a></caption>
    
    <tr>
    	<th>专业编号</th>
    	<th>专业名称</th>
    	<th>所属单位</th>
    	<th>学制</th>
    	<th>培养层次</th>
    	<th>操作</th>
    </tr>
    <?php 
    	$dat = page("off_profession","*",8,null);
	while($pro = mysqli_fetch_array($dat['result'])){
    	?>
    <tr>
    	<td><?php echo $pro['pro_code'];?></td>
    	<td><?php echo $pro['pro_name'];?></td>
    	<td><?php echo $pro['pro_depart'];?></td>
    	<td><?php echo $pro['pro_time'];?></td>
    	<td><?php echo $pro['pro_level'];?></td>
    	<td>
    		
    		
<button type="button" class="layui-btn layui-btn-danger  layui-btn-sm">
  <a onclick="return confirm('确认删除')" href="Delete/delete.php?id=1&code=<?php echo $pro['pro_code'];?>" title="删除">
    			<span class="layui-icon layui-icon-delete"></span>
    			</a>
</button>
    	</td>
    </tr>	
    
    <?php }?>
</table>

	<button type="button" class="layui-btn layui-btn-normal  layui-btn-radius"><a href="<?php 
		$pre = page("off_profession","*",8,null);
		echo $_SERVER['PHP_SELF'].'?page='.$pre['prePage']; ?>">上一页</a></button>
	<button type="button" class="layui-btn layui-btn-normal layui-btn-radius"><a href="<?php
		$next = page("off_profession","*",8,null); 
		echo $_SERVER['PHP_SELF'].'?page='.$next['nextPage']; ?>">下一页</a></button>
</center>
		
	</body>
</html>
