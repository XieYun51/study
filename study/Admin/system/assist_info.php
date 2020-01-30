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
	<caption><a href="Add/addAssist.php"><span class="layui-icon layui-icon-add-1"></span>&nbsp;新增导员</a></caption>
    
    <tr>
    	<th>导员编号</th>
    	<th>导员姓名</th>
    	<th>性别</th>
    	<th>管理班级</th>
    	<th>操作</th>
    </tr>
    <?php 

	$res = page("off_assist","*",8,null);
	while($assist = mysqli_fetch_array($res["result"])){
    	?>
    <tr>
    	<td><?php echo $assist['ass_code'];?></td>
    	<td><?php echo $assist['ass_name'];?></td>
    	<td><?php echo $assist['ass_sex'];?></td>
    	<td><?php 
    		
    		$data = select_db("off_spareCla","spa_claCode","spa_assCode='{$assist['ass_code']}'");
    		$ass = mysqli_fetch_array($data);
    		echo $ass['spa_claCode'];?></td>
    	
    	<td>
<button type="button" class="layui-btn layui-btn-danger layui-btn-sm">
<a href="Modify/modify_assist.php?code=<?php echo $assist['ass_code'];?>"  title="修改">
    			<span class="layui-icon layui-icon-edit"></span>
   </a>
</button>   
<button type="button" class="layui-btn layui-btn-warm  layui-btn-sm">
  <a  href="Devide/spare_class.php?code=<?php echo $assist['ass_code'];?>" title="聘班">
    			<span class="layui-icon layui-icon-add-circle"></span>
    			</a>
</button>
    	</td>
    </tr>	
    
    <?php }?>
</table>

	<button type="button" class="layui-btn layui-btn-normal  layui-btn-radius"><a href="<?php 
		$pre = page("off_assist","*",8,null);
		echo $_SERVER['PHP_SELF'].'?page='.$pre['prePage']; ?>">上一页</a></button>
	<button type="button" class="layui-btn layui-btn-normal layui-btn-radius"><a href="<?php
		$next = page("off_assist","*",8,null); 
		echo $_SERVER['PHP_SELF'].'?page='.$next['nextPage']; ?>">下一页</a></button>
</center>
		
	</body>
</html>
