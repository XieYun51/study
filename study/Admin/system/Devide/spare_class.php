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
		<link rel="stylesheet" type="text/css" href="../../../layui/css/layui.css"/>
		
		<script type="text/javascript" src="../../../layui/layui.js">
			
		</script>
		<style type="text/css">
			table{
				display: none;
			}
			textarea{
				resize: none !important;
				width: 30% !important;
			}
			.select{
				color: red;
				font-style: italic;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		
		
		<table class="layui-table" id="classInfo">
	
<?php 
    $res = select_db("off_class","cla_code","cla_select=0");
	while($class = mysqli_fetch_array($res)){
		$arr[] = $class; 
	}
	for($i = 0;$i<=count($arr);$i+=4){
?>
    <tr>
    	<td><a href="#" onclick="addValue(<?php 
    		if(isset($arr[$i]['cla_code'])){
    		echo $arr[$i]['cla_code'];}?>)"><?php 
    			if(isset($arr[$i]['cla_code'])){
    			echo $arr[$i]['cla_code'];}?></a></td>
    	<td><a href="#" onclick="addValue(<?php 
    		if(isset($arr[$i+1]['cla_code'])){
    		echo $arr[$i+1]['cla_code'];}?>)"><?php 
    			if(isset($arr[$i+1]['cla_code'])){
    			echo $arr[$i+1]['cla_code'];}?></a></td>
    	<td><a href="#" onclick="addValue(<?php  
    		if(isset($arr[$i+2]['cla_code'])){
    		echo $arr[$i+2]['cla_code'];}?>)"><?php 
    		if(isset($arr[$i+2]['cla_code'])){
    		echo $arr[$i+2]['cla_code'];	
    		}
    		?></a></td>
    	<td>
    		<a href="#" onclick="addValue(<?php 
    			if(isset($arr[$i+3]['cla_code'])){
    			echo $arr[$i+3]['cla_code'];}?>)">
    			<?php if(isset($arr[$i+3]['cla_code'])){
    		echo $arr[$i+3]['cla_code'];
    	}?>
    		</a>
    		</td>
    </tr>	
<?php
    }?>
    
</table>

		
		
		
		
		<form class="layui-form" method="post" action="deaSpare.php">		
  <div class="layui-form-item">
    <label class="layui-form-label"><a href="#" id="cla">添加班级</a></label>
    <div class="layui-input-block">
    	<textarea autocomplete="on" placeholder="点击文字添加班级" class="layui-textarea" name="class" id="class" rows="5" cols="20"></textarea>
      
    </div>
  </div>
  
  <input type="hidden" name="codes"  value="<?php 
  	if(isset($_GET['code'])){
  	echo $_GET['code'];	
  	}
  	?>" />
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn layui-btn-normal" lay-submit >立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
<script type="text/javascript">
	var cla = document.getElementById("class");
	function addValue(val){
	if(cla.value == ""){
		cla.value = val;
	}else{
		cla.value = cla.value+"-"+val; 
	}	
	}
	layui.use(['form','layer','jquery'], function(){
  var form = layui.form;
  var $ = layui.jquery;
  var layer = layui.layer;
  $(function(){
  $("#cla").click(function(){
  	layer.open({
  	type:1,
  	title:"聘班",
  	content:$("#classInfo"),
  	anim:3,
  	area:['400px','420px'],
  	offset:"0px"
  });
  
  });
  $("td a").click(function(){
  	$(this).addClass("select");
  });
  
  
  	
  
});
	});
	
</script>
		
	</body>
</html>
