<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	if(@$_SESSION['auth'] != 2){
	skip("../../../index.php","非法访问，你的攻击行为已经被记录");	
}
	

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../../layui/css/layui.css" />
		<link rel="stylesheet" href="../../../layui/css/modules/layui-extend/iconfont.css" />
		<script type="text/javascript" src="../../../layui/layui.js">
		</script>
		<style type="text/css">
			
			@media(min-width: 1000px) {
				table{
					width: 80% !important;
				}
			}
			td,th{
				text-align: center !important;
			}
			button a,button a:hover{
				color: white;
			}
		</style>
	</head>
	<body>
		
<center>		
<table class="layui-table">
	
    <tr>
    	<th>班级编号</th>
    	<th>课程名称</th>
    	<th>操作</th>  	
    </tr>
    <?php 
	$res = select_db("off_spareCou","*","spa_teaCode='{$_SESSION['num']}' and spa_term='{$_POST['time']}'");
	$arry = null;
	$arr = null;
	$class = null;
	$course = null;
	while($result = mysqli_fetch_array($res)){
		$arry[] = $result;
	}	
	   if($arry != ""){
	   	for($i = 0;$i < count($arry);$i++){
		$class[] = 	$arry[$i]['spa_classCode'];
		$course[] = $arry[$i]['spa_courseCode'];
	}
	
	for($i = 0;$i < count($class);$i++){
		$arr[] = explode("-",$class[$i]);
	}
	for($i = 0;$i < count($arr);$i++){	
			for($a = 0;$a < count($arr[$i]);$a++){
    ?>
    <tr>
    	<td><?php 
    		
    		
    		echo $arr[$i][$a];?></td>
    	<td><?php 
    		$dd = select_db("off_course","cou_name","cou_code='{$course[$i]}'");
    		$reg = mysqli_fetch_array($dd);
    		
    		echo $reg['cou_name'];?></td>
    	<td>
<button type="button" class="layui-btn  layui-btn-sm">
  <a onclick="return confirm('确认下载')" href="down.php?code=<?php echo $arr[$i][$a]?>"  title="下载学生名单">
    			<span class="iconfont layui-cloud-download"></span>
    		</a>
</button>    	
<button type="button" class="layui-btn layui-btn-danger layui-btn-sm">
  <a  href="score_info.php?codes=<?php echo $arr[$i][$a]."@".$course[$i]."@".$_POST['time'];?>"  title="录入成绩">
    			<span class="layui-icon layui-icon-edit"></span>
    		</a>
</button>    	
<button type="button" class="layui-btn layui-btn-normal layui-btn-sm">
  <a  href="modify.php?code=<?php echo $arr[$i][$a]."@".$_POST['time']."@".$course[$i];?>"  title="修改成绩">
    			<span class="layui-icon layui-icon-about"></span>
    		</a>
</button>    
<button type="button" class="layui-btn layui-btn-warm layui-btn-sm">
  <a  href="down_score.php?dat=<?php echo $arr[$i][$a]."@".$course[$i]."@".$_POST['time']."@".$reg['cou_name'];?>"  title="下载成绩报表">
    			<span class="iconfont layui-xiazai"></span>
    		</a>
</button>   		
    	</td>
    </tr>	
    
    <?php }
    	}
    	}?>
</table>
</center>
<script>

layui.use(['form','jquery'], function(){
  var form = layui.form;
  var $ = layui.jquery;
  $(function(){
if($(window).width() < 600){
	$("button").addClass("layui-btn-xs");
	
}  	
  
  });
});
</script>
		
	</body>
</html>
