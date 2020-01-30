<?php
	include "../../../includes/fun.inc.php";
		if(@$_SESSION['auth'] != 2){
	skip("../../../index.php","非法访问，你的攻击行为已经被记录");	
}
	$data = explode("@",$_GET['code']);
	
	
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
			.sub{
				margin-left: 90px;
			}
			}
			
			
		</style>
	</head>
	<body>
	<center>	
<form class="layui-form" method="post" action="modifyScore.php">
	
    <div class="layui-form-item">
    
    <div class="layui-input-inline">
      <input type="text" name="stu" required  lay-verify="required" placeholder="请输入学号" autocomplete="on" class="layui-input">
    </div>
  </div>
  <input type="hidden" name="class" value="<?php echo $data[0]?>" />
  <input type="hidden" name="term" value="<?php echo $data[1]?>" />
  <input type="hidden" name="course" value="<?php echo $data[2]?>" />
  
  <div class="layui-form-item">
    <div class="layui-input-inline">
      <button class="layui-btn  layui-btn-radius layui-btn-danger" lay-submit>查询</button>
    </div>
  </div>
</form>
 </center>
  
 <script>

layui.use('form', function(){
  var form = layui.form;
  
  
});
</script>
		
		
	</body>
</html>
