<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../../layui/css/layui.css"/>
		
		<link rel="stylesheet" type="text/css" href="../../../layui/layui.js"/>
	</head>
	<body>
		
		
		<form class="layui-form" method="post" action="deaAdd.php">		

	
  <div class="layui-form-item">
    <label class="layui-form-label">系部编号</label>
    <div class="layui-input-inline">
      <input type="text" onblur="codes()" id="code" name="code" required  lay-verify="required" placeholder="请输入系部编号" autocomplete="on" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">系部名称</label>
    <div class="layui-input-inline">
      <input type="type" name="name" required lay-verify="required" placeholder="请输入系部名称" class="layui-input">
    </div>
  </div>
  
  <input type="hidden" name="id"  value="0" />
  
  
  <div class="layui-form-item">
    <label class="layui-form-label">系部简称</label>
    <div class="layui-input-inline">
      <input type="text" name="brief" id="ck1" required lay-verify="required" placeholder="请输入系部简称" class="layui-input">
    </div>
    
  </div>
  
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit >立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
<script type="text/javascript">
	layui.use('form', function(){
  	var form = layui.form;
	});
	function codes(){
		var code = document.getElementById("code");
		var reg = /^\d{2}$/;
		if (!(reg.test(code.value))){
            alert("系部编号只能是2位数字");
               }
	}
	
</script>
		
	</body>
</html>
