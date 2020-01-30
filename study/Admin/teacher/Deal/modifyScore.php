<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
		if(@$_SESSION['auth'] != 2){
	skip("../../../index.php","非法访问，你的攻击行为已经被记录");	
}


if(isset($_POST['stu']) && isset($_POST['class'])){
if(substr($_POST['stu'],0,7) != $_POST['class']){
	skip("../search.php","输入的学号不是所选班级的学生");
	exit();	
}
}
if(isset($_POST['score'])){
	$arr = array(
	"sco_stuScore"=>$_POST['score'],
	"sco_state"=>1
	);
	$rows = update_db("off_score",$arr,"sco_stuCode='{$_POST['stuCode']}' and sco_course='{$_POST['course']}' and sco_term='{$_POST['term']}'");
	
	if($rows == 1){
		skip("../search.php","修改成功");
	}else{
		skip("../search.php","修改失败");
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../../layui/css/layui.css" />
		<script type="text/javascript" src="../../../layui/layui.js">			
		</script>
		<style type="text/css">
			
			
			@media(min-width: 1000px) {
				table{
					width: 60% !important;
				}
			}
			td,th{
				text-align: center !important;
			}
			
			caption a{
				position: relative;
				top: -10px;
			}
			select,input{
					outline: none !important;
					border: none !important;
        			height: 100%;
        			width: 100%;
        			text-align: center;
        			background: none !important;
				}
				
				@media(min-width:1000px ) {
					table{
						width: 80% !important;
					}
				}
				.layui-input-inline {
    			width: 40px;
				}
				.clas{
					display: none;
				}
				.cla{
					width: 100px !important;
					margin: 0 auto;
				}
		</style>
	</head>
	<body>

  
 <center>	
 		
<table class="layui-table">
	<caption>
		<a href="#" id="hundr">
			<span class="layui-icon layui-icon-diamond">				
			</span>&nbsp;设置百分制
		</a>
		&nbsp;
		<a href="#" id="class">
			<span class="layui-icon layui-icon-release">
			</span>设置等级制
		</a>
	</caption>
    <tr>
    	<th>学号</th>
    	<th>课程编号</th>
    	<th>操作</th>  	
    </tr>
    <?php 
 	
	$res = select_db("off_score","*","sco_stuCode='{$_POST['stu']}' and sco_term='{$_POST['term']}' and sco_course='{$_POST['course']}'");
	$result = mysqli_fetch_array($res);
	if($result){
		if($result['sco_state'] == 1){
			skip("../search.php","请向教务处打报告修改成绩");
		}else{
 	?>

    <tr>
    	<td><?php echo $result['sco_stuCode']?></td>
    	<td><?php echo $result['sco_course']?></td>
    	<td>
    	<form class="layui-form" method="post" action="modifyScore.php">
    	<input type="text" name="score"   required   placeholder="成绩" class="layui-input-inline dis">
    <div class="cla">
      	<select name="score" class="cl">
      	<option value="优秀">优秀</option>
        <option value="良好">良好</option>
      	<option value="中">中</option>
      	<option value="及格">及格</option>
      	<option value="不及格">不及格</option>
      </select>		
      </div>
      <input type="hidden" name="course" value="<?php echo $result['sco_course']?>"/>
      <input type="hidden" name="stuCode" value="<?php echo $result['sco_stuCode']?>"/>
           <input type="hidden" name="term" value="<?php echo $_POST['term']?>"/>
      <button  class="layui-btn layui-btn-sm" onclick="return confirm('确认修改成绩')" lay-submit>录入</button>
			</form>
    	</td>
    </tr>
    <?php
    	}
    }else{
    	skip("../search.php","该课程还没有录入成绩");
    }?>
</table>
</center>    


<script type="text/javascript">
	layui.use(['form','jquery'], function(){
  	var form = layui.form;
  	var $ = layui.jquery;
  	$(function(){
  		$(".cla").addClass("clas");
  		$(".cl").attr("disabled","disabled");
  		$(".dis").attr("lay-verify","required");
  		$("#class").click(function(){
  			$(".cla").removeClass("clas");
  			$(".dis").attr("disabled",true);
  			$(".dis").addClass("clas");
  			$(".dis").removeAttr("lay-verify");
  			$(".cl").removeAttr("disabled");
  			
  		});
  		$("#hundr").click(function(){
  			$(".dis").removeClass("clas");
  			$(".cla").addClass("clas");
  			$(".cl").attr("disabled","disabled");
  			$(".dis").removeAttr("disabled");
  			$(".dis").attr("lay-verify","required");
  			
  			
  		});
  		if($(window).width() < 600){
  			$("button").addClass("layui-btn-xs");
  		}
  	});
  });

</script>
		
		
	</body>
</html>
