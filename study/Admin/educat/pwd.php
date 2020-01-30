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
			
		</style>
	</head>
	<body>

<form class="layui-form" method="post" action="../chgPwd.php">		

	
  <div class="layui-form-item">
    <label class="layui-form-label">旧密码</label>
    <div class="layui-input-inline">
      <input type="password" name="pwd" required  lay-verify="required" placeholder="请输入旧密码" autocomplete="on" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">新密码</label>
    <div class="layui-input-inline">
      <input id="ck0" type="password" name="new1" required lay-verify="required" placeholder="请输入新密码" class="layui-input" onblur="checks()">
    </div>
    
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">确认密码</label>
    <div class="layui-input-inline">
      <input type="password" name="new2" id="ck1" required lay-verify="required" placeholder="请再次输入新密码" class="layui-input">
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
	
	
	var ck0 = document.getElementById("ck0");
	var ck1 = document.getElementById("ck1");
	function checks(){
		
		var reg= /^(?!\d+$)(?![a-zA-Z]+$)\w{8,20}$/;
		if (!(reg.test(ck0.value))) {
            alert("密码必须是字母数字组合长度不低于8位");
               }
	}

	function chkRepeat(){
		if(ck0.value != ck1.value){
			alert("两次输入的密码不一致");
			return false;
		}else{
			return true;
		}
	}

layui.use('form', function(){
  var form = layui.form;
});
</script>
		
	</body>
</html>
