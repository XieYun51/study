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
			caption a{
				position: relative;
				top: -5px;
			}
			#sub{
				position: relative;
				left: -70px;
			}
			form{
				position: relative;
				top: 10px;
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
<form class="layui-form" method="post" action="student_info.php">
  <div class="layui-form-item layui-inline">
    <div class="layui-input-inline">
      <input type="text" name="num" required  lay-verify="required" placeholder="请输入学号" autocomplete="on" class="layui-input">
    </div>
  </div>
  
   <div class="layui-form-item layui-inline" id="sub">
    <div class="layui-input-inline">
      <button class="layui-btn layui-btn-radius layui-btn-warm" lay-submit>查询</button>
    </div>
  </div>
</form>

		
<table class="layui-table">
    <tr>
    	<th>学号</th>
    	<th>姓名</th>
    	<th>专业</th>
    	<th>状态</th>
    	<th>所属系部</th>
    	<th>学籍处理</th>
    </tr>
    <?php 
		if(isset($_POST['num'])){
			$data = select_db("off_student","*","stu_num='{$_POST['num']}'");
			$result = mysqli_fetch_array($data);
		
    	?>
    <tr>
    	<td><?php echo $result['stu_num'];$_SESSION['NUMBER'] = $result['stu_num']; ?></td>
    	<td><?php echo $result['stu_name'];?></td>
    	<td><?php echo $result['stu_major'];?></td>
    	<td><?php echo $result['stu_state'];?></td>
    	<td><?php echo $result['stu_depart'];?></td>
    	<td>
<button type="button" class="layui-btn layui-btn-danger layui-btn-sm">
  <a  href="#" id="cli">
    			<span class="layui-icon layui-icon-link"></span>
    		</a>
</button>    	
    	</td>
    </tr>	
    
    <?php }?>
</table>
</center>
<script>

layui.use(['form','layer','jquery'], function(){
  var form = layui.form;
  var $ = layui.jquery;
  var layer = layui.layer;
  $(function(){
  $("#cli").click(function(){
  	layer.open({
  	type:2,
  	title:"学籍设置",
  	content:['Modify/stu_state.php','no'],
  	anim:6,
  	offset:"0px"
  });
  });
  
  
  
});
});
</script>


		
	</body>
</html>
