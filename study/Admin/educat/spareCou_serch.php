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
		<link rel="stylesheet" type="text/css" href="../../Styles/public.css"/>
	<style type="text/css">
		#sub{
				margin-left: -70px !important;
			}
			form{
				position: relative;
				top: 10px;
			}
	</style>
	
	</head>
	<body>
				
<center>
<form class="layui-form" method="post" action="spareCou_info.php">
	
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
  
  
   <div class="layui-form-item layui-inline" id="sub">
    <div class="layui-input-inline">
      <button class="layui-btn layui-btn-normal layui-btn-radius" lay-submit>查询</button>
    </div>
  </div>
</form>
</center>


<script type="text/javascript">
	layui.use('form', function(){
var form = layui.form;
});
</script>

	</body>
</html>
