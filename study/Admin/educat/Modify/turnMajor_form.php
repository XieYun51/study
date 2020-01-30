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

<form class="layui-form" method="post" action="deal_turnMajor.php">		

	
  <div class="layui-form-item">
    <label class="layui-form-label">专业号</label>
    <div class="layui-input-inline">
      <input type="text" name="major" required  lay-verify="required" placeholder="请输入专业号" autocomplete="on" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">班级号</label>
    <div class="layui-input-inline">
      <input  type="text" name="class" required lay-verify="required" placeholder="请输入班级号" class="layui-input" >
    </div>
    
  </div>
  <input type="hidden" name="nums" value="<?php echo $_GET['num']?>" />
  
  <div class="layui-form-item sub">
        <label class="layui-form-label lef">所属院系</label>
        <div class="layui-inline">
			<select name="depart">
				<option value="互联网工程系">互联网工程系</option>
				<option value="健康管理工程系">健康管理工程系</option>
				<option value="轨道交通工程系">轨道交通工程系</option>
				<option value="人工智能工程系">人工智能工程系</option>
				<option value="学前教育系">学前教育系</option>
				<option value="基础教育教学部">基础教育教学部</option>
				<option value="学生处">学生处</option>
				<option value="教务处">教务处</option>
			</select>
		</div>
  </div>
  
  
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit  onclick="return chkRepeat()">立即提交</button>
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
