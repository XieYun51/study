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
			
			
		</style>
	
	</head>
	<body>
	

<center>
<form class="layui-form" method="post" action="score_info.php">
	
	<div class="layui-form-item layui-inline">
        
    <div class="layui-input-inline">
      <select name="term" lay-verify="required">
      	<option value="2019-2020-1">2019-2020-1</option>
      	<option value="2019-2020-2">2019-2020-2</option>
      	<option value="2020-2021-1">2020-2021-1</option>
      	<option value="2020-2021-2">2020-2021-2</option>
      	<option value="2020-2021-1">2021-2022-1</option>
      	<option value="2020-2021-2">2021-2022-2</option>
      	<option value="2020-2021-1">2022-2023-1</option>
      	<option value="2020-2021-2">2022-2023-2</option>
      	<option value="2020-2021-1">2023-2024-1</option>
      	<option value="2020-2021-2">2023-2024-2</option>
      </select>
    </div>	  	
  </div>
	
	<div class="layui-form-item layui-inline">
    <div class="layui-input-inline">
      <input type="text" name="course" required  lay-verify="required" placeholder="请输入课程号" autocomplete="on" class="layui-input">
    </div>
  </div>
	
	
  
  <div class="layui-form-item layui-inline">
    <div class="layui-input-inline">
      <input type="text" name="class" required  lay-verify="required" placeholder="请输入班级号" autocomplete="on" class="layui-input">
    </div>
  </div>
  
   <div class="layui-form-item layui-inline" id="sub">
    <div class="layui-input-inline">
      <button class="layui-btn layui-btn-radius layui-btn-danger" lay-submit>查询</button>
    </div>
  </div>
</form>
</center>
		
<table class="layui-table">
	
    <tr>
    	<th>班级号</th>
    	<th>课程号</th>
    	<th>学期</th>
    	<th>成绩回退</th>
    </tr>
    <?php 
		if(isset($_POST['class']) && isset($_POST['course']) && isset($_POST['term'])){
			$data = select_db("off_score","distinct sco_class,sco_course,sco_term","sco_class='{$_POST['class']}' and sco_course='{$_POST['course']}' and sco_term='{$_POST['term']}'");
			$result = mysqli_fetch_array($data);
		
			if(empty($result)){
				skip("./score_info.php","该成绩目前没有录入");
				exit();
			}
			
			
		
    	?>
    <tr>
    	<td><?php echo $result['sco_class'];?></td>
    	<td><?php echo $result['sco_course'];?></td>
    	<td><?php echo $result['sco_term'];?></td>
    	<td>
<button type="button" class="layui-btn layui-btn-normal layui-btn-sm">
  <a  onclick="return confirm('确认回退')" href="Modify/score_set.php?code=<?php echo $result['sco_course']."@".$result['sco_class']."@".$result['sco_term'];?>">
    			<span class="layui-icon layui-icon-release"></span>
    		</a>
</button>    	
    	</td>
    </tr>	
    
    <?php }?>
</table>

<script>

layui.use(['form','layer','jquery'], function(){
  var form = layui.form;
  var $ = layui.jquery;
  var layer = layui.layer;
});
</script>


		
	</body>
</html>
