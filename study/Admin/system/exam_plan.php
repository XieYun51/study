<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../layui/css/layui.css" />
		<script type="text/javascript" src="../../layui/layui.js">
		</script>
		<style type="text/css">
			@media (max-width: 600px) {
			form{
				margin-left: -30px;
    			margin-right: 30px;
			}
			}
			.mob{
				position: relative;
				left: 40px;
			}
		</style>
	</head>
	<body>

<form class="layui-form" method="post" action="Add/dealExam.php" enctype="multipart/form-data">		

	
  <div class="layui-form-item">
    <label class="layui-form-label">考试名称</label>
    <div class="layui-input-inline">
      <input type="text" name="name" required  lay-verify="required" placeholder="请输入考试名称" autocomplete="on" class="layui-input">
    </div>
  </div>
  
 <div class="layui-form-item">
        <label class="layui-form-label">过期时间</label>
        <div class="layui-inline">
			<select name="expire">
				<option value="3">3天</option>
				<option value="6">6天</option>
				<option value="9">9天</option>
			</select>
		</div>
  </div>
  
  <div class="layui-form-item mob">
    <div class="layui-input-inline">
      <input type="file" name="plan" required  lay-verify="required"  class="file-input">
    </div>
  </div>
  
     <button type="submit" class="layui-btn layui-btn-normal mob">
      <i class="layui-icon">&#xe67c;</i>上传考试计划
    </button>
  
  
  
</form>
 
<script>

layui.use('form', function(){
  var form = layui.form;
});
</script>
		
	</body>
</html>
