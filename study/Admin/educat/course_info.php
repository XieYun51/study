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
	<caption><a href="#"><span class="layui-icon layui-icon-upload"></span>&nbsp;上传学期课程信息</a></caption>
    
    <tr>
    	<th>课程编号</th>
    	<th>课程名称</th>
    	<th>课程性质</th>
    	<th>总学时</th>
    </tr>
    <?php
    	if(isset($_POST['term'])){
    		$_SESSION['termds'] = $_POST['term'];
    	} 
    	$res = page("off_course","*",8,"where cou_term='{$_SESSION['termds']}'");
    	
	while($cous = mysqli_fetch_array($res['result'])){
    	?>
    <tr>
    	
    	<td><?php echo $cous['cou_code'];?></td>
    	<td><?php echo $cous['cou_name'];?></td>
    	<td><?php echo $cous['cou_nature'];?></td>
    	<td><?php echo $cous['cou_sumTime'];?></td>
    	
    </tr>	
    
    <?php }?>
</table>
		
	<button type="button" class="layui-btn layui-btn-normal layui-btn-radius"><a href="<?php 
		$pre = page("off_course","*",8,"where cou_term='{$_SESSION['termds']}'");
		echo $_SERVER['PHP_SELF'].'?page='.$pre['prePage']; ?>">上一页</a></button>
	<button type="button" class="layui-btn layui-btn-normal  layui-btn-radius"><a href="<?php
		$next = page("off_course","*",8,"where cou_term='{$_SESSION['termds']}'"); 
		echo $_SERVER['PHP_SELF'].'?page='.$next['nextPage']; ?>">下一页</a></button>
</center>
	</body>
</html>
