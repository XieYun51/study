<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../../layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../../../Styles/table.css"/>
		<script type="text/javascript" src="../../../layui/layui.js"></script>
		
	</head>
	<body>
		<form class="layui-form" method="post" action="deaAdd.php">		

	<div class="layui-form-item">
    <label class="layui-form-label">专业编号</label>
    <div class="layui-input-inline">
      <input type="text"  id="code"  onblur="checkCode()" name="code" required  placeholder="请输入专业编号" autocomplete="on" class="layui-input">
    </div>
  </div>
  <input type="hidden" name="id"  value="1" />
  <div class="layui-form-item">
    <label class="layui-form-label">专业名称</label>
    <div class="layui-input-inline">
      <input  type="text" name="name" required  placeholder="请输入专业名称" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">专业简称</label>
    <div class="layui-input-inline">
      <input  type="text" name="brief" required  placeholder="请输入专业简称" class="layui-input">
    </div>
  </div>
  
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
  
  <div class="layui-form-item sub">
        <label class="layui-form-label lef">学制</label>
        <div class="layui-inline">
			<select name="term">
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
  </div>		
  
  <div class="layui-form-item">
    <label class="layui-form-label">人社部专业编号</label>
    <div class="layui-input-inline">
      <input  type="text" name="depCode" id="dep" onblur="depCodes()" required  placeholder="请输入人社部专业编号" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">人社部专业名称</label>
    <div class="layui-input-inline">
      <input  type="text" name="depName" required  placeholder="请输入人社部专业名称" class="layui-input">
    </div>
  </div>
  
  
  <div class="layui-form-item sub">
        <label class="layui-form-label lef">培养层次</label>
        <div class="layui-inline">
			<select name="level">
				<option value="高级工">高级工</option>
				<option value="中级工">中级工</option>
				<option value="预备技师">预备技师</option>
			</select>
		</div>
  </div>		
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit  >立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
  

		</form>
		
<script type="text/javascript">

layui.use('form', function(){
var form = layui.form;
});
var code = document.getElementById("code");
var dep = document.getElementById("dep");
function checkCode(){
	var reg = /^\d{6}$/;
	if(!(reg.test(code.value))){
		alert("请输入正确的专业编码方式6位数字");
	}
}
function depCodes(){
	var reg = /^\d{5}$/;
	if(!(reg.test(dep.value))){
		alert("请输入正确的人社部专业编码方式5位数字");
	}
}
	
</script>
		
	</body>
</html>
