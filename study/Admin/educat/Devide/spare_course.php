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
				color: #60199d;
				font-style: italic;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		
		<table class="layui-table" id="courseInfo">
	
<?php 
	$arr = null;
	$majSum = select_db("off_teachPlan","pla_majorNum","pla_code='{$_GET['code']}'");	
	while($majRes = mysqli_fetch_array($majSum)){
		$arr[] = $majRes; 	
	}
	
	$sumClass = array();
	for($i = 0;$i < count($arr);$i++){	
		$maj = select_db("off_class","cla_code","cla_proCode='{$arr[$i]['pla_majorNum']}'");
		while($class = mysqli_fetch_array($maj)){
		$sumClass[] = $class['cla_code'];	
		}
		
	}

	
	for($i = 0;$i<=count($sumClass);$i+=4){
?>
    <tr>
    	<td><a href="#" onclick="addValue(<?php 
    		if(isset($sumClass[$i])){
    		echo $sumClass[$i];}?>)"><?php 
    			if(isset($sumClass[$i])){
    			echo $sumClass[$i];}?></a></td>
    	<td><a href="#" onclick="addValue(<?php 
    		if(isset($sumClass[$i+1])){
    		echo $sumClass[$i+1];}?>)"><?php 
    			if(isset($sumClass[$i+1])){
    			echo $sumClass[$i+1];}?></a></td>
    	<td><a href="#" onclick="addValue(<?php  
    		if(isset($sumClass[$i+2])){
    		echo $sumClass[$i+2];}?>)"><?php 
    		if(isset($sumClass[$i+2])){
    		echo $sumClass[$i+2];	
    		}
    		?></a></td>
    	<td>
    		<a href="#" onclick="addValue(<?php 
    			if(isset($sumClass[$i+3])){
    			echo $sumClass[$i+3];}?>)">
    			<?php if(isset($sumClass[$i+3])){
    		echo $sumClass[$i+3];
    	}?>
    		</a>
    		</td>
    </tr>	
<?php
    }?>
    
</table>
		
<form class="layui-form" method="post" action="dealCourse.php">
	
	<div class="layui-form-item">
        <label class="layui-form-label">教师编码</label>
    <div class="layui-input-inline">
      <select name="teaCode" >
      	<?php 
      		$ress = select_db("off_teacher","tea_code",null);
      		while($code = mysqli_fetch_array($ress)){
      		?>
      	<option value="<?php echo $code['tea_code']?>">
      		<?php echo $code['tea_code']?>
      	</option>
        <?php
        }
        ?>
      </select>
    </div>	  		
  </div>
	
	

<input type="hidden" name="courseCode"  value="<?php echo $_GET['code'];?>" />
			
  <div class="layui-form-item">
    <label class="layui-form-label"><a href="#" id="cla">添加班级</a></label>
    <div class="layui-input-block">
    	<textarea autocomplete="on" placeholder="点击文字添加班级" class="layui-textarea" name="class" id="course" rows="5" cols="20"></textarea>
      
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
	var cla = document.getElementById("course");
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
  	title:"聘课",
  	content:$("#courseInfo"),
  	anim:6,
  	area:['400px','240px'],
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
