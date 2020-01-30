<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../../layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="../../../layui/css/modules/layui-extend/iconfont.css"/>
		<script type="text/javascript" src="../../../layui/layui.js">
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
	
    
    <tr>
    	<th>教务处账号</th>
    	<th>工作人员姓名</th>
    	<th>性别</th>
    	<th>所属单位</th>
    	<th>编辑</th>
    </tr>
    <?php 

	$res = select_db("off_education","*",null);
	while($edu = mysqli_fetch_array($res)){
    	?>
    <tr>
    	<td><?php echo $edu['edu_code'];?></td>
    	<td><?php echo $edu['edu_name'];?></td>
    	<td><?php echo $edu['edu_sex'];?></td>
    	<td><?php echo $edu['edu_depart'];?></td>
    	<td>
    		
<button type="button" class="layui-btn layui-btn-danger layui-btn-sm">
  <a onclick="return confirm('确认删除')" href="../Delete/delete.php?id=4&code=<?php echo $edu['edu_code'];?>" title="删除">
    			<span class="layui-icon layui-icon-delete"></span>
    		</a>
</button>    	
<button type="button" class="layui-btn layui-btn-normal layui-btn-sm">
  <a onclick="return confirm('确认加锁')" href="authSet.php?id=0&code=<?php echo $edu['edu_code'];?>" title="加锁">
    			<span class="iconfont layui-jiasuo"></span>
    		</a>
</button>    	
<button type="button" class="layui-btn layui-btn-warm layui-btn-sm">
  <a onclick="return confirm('确认解锁')" href="authSet.php?id=1&code=<?php echo $edu['edu_code'];?>" title="解锁">
    			<span class="layui-icon layui-icon-password"></span>
    		</a>
</button>    		
    	</td>
    </tr>	
    
    <?php }?>
</table>
	</center>	
	</body>
</html>
