<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	
	if(isset($_POST['state'])){
		if($_POST['state'] == "复学"){
		$arr = array("stu_state"=>"在校");	
		}else{
		$arr = array("stu_state"=>$_POST['state']);
		}
		
		$rows = update_db("off_student",$arr,"stu_num='{$_SESSION['NUMBER']}'");
		if($rows == 1){
			echo "<script>alert('学籍处理成功')</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../../layui/css/layui.css" />
		<script type="text/javascript" src="../../../layui/layui.js">
		</script>
		<style type="text/css">
			@media (max-width: 600px) {
			form{
				margin-left: -30px;
    			margin-right: 30px;
			}
			}
			
		</style>
	</head>
	<body>

<form class="layui-form" method="post" action="stu_state.php">	
	
	<div class="layui-form-item">
    <div class="layui-input-block">
      <input type="radio" name="state" value="退学" title="退学">
      	
      <input type="radio" name="state" value="休学" title="休学" checked>
    </div>
  </div>	

	
  
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit >立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
 
<script>
	
	
layui.use('form', function(){
  var form = layui.form;
});
</script>
		
	</body>
</html>
