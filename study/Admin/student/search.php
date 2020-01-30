<?php
	include "../../includes/fun.inc.php";
	if(@$_SESSION['auth'] != 99){
	skip("../../index.php","非法访问，你的攻击行为已经被记录");	
}
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
			@media (max-width: 600px) {
			form{
				margin-left: -30px;
    			margin-right: 30px;
			}
			.sub{
				margin-left: 90px;
			}
			}
			.sub{
				margin-left: 50px;
			}
		</style>
	</head>
	<body>
		
<form class="layui-form" method="post" action="Score/lookScore.php">
	
  <div class="layui-form-item">
  	
        <label class="layui-form-label">学期</label>
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
  
    
  
  
  
  <div class="layui-form-item sub">
    <div class="layui-input-block">
      <button class="layui-btn  layui-btn-radius" lay-submit>查询</button>
    </div>
  </div>
</form>
 
<script>

layui.use('form', function(){
  var form = layui.form;
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});
</script>
		
		
	</body>
</html>
