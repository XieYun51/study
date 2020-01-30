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

<form class="layui-form" method="post" action="deaAdd.php">		

	
  <div class="layui-form-item">
    <label class="layui-form-label">账号</label>
    <div class="layui-input-inline">
      <input type="text" id="code" onblur="checkCode()" name="code" required  lay-verify="required" placeholder="请输入用户账号" autocomplete="on" class="layui-input">
    </div>
  </div>
  <input type="hidden" name="id"  value="4" />
  <div class="layui-form-item">
    <label class="layui-form-label">姓名</label>
    <div class="layui-input-inline">
      <input  type="text" name="name" required lay-verify="required" placeholder="请输入用户姓名" class="layui-input">
    </div>
  </div>
    <div class="layui-form-item">
    <label class="layui-form-label">性别</label>
    <div class="layui-input-block">
      <input type="radio" name="sex" value="男" title="男">
      <input type="radio" name="sex" value="女" title="女" checked>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn layui-btn-warm" lay-submit>立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
 
<script>
	
var code = document.getElementById("code"); 
function checkCode(){
	var reg = /^B(\d){4}$/;
	if(!(reg.test(code.value))){
		alert("请输入正确的教务处工作人员编码方式B+4位数字");
	}
}	
	
layui.use('form', function(){
  var form = layui.form;
});
</script>
		
	</body>
</html>
