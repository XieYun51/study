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
		<script type="text/javascript" src="../../../layui/layui.js">
		</script>
		<style type="text/css">
			button a,button a:hover{
				color: white;
			}
			#course,caption a{
				position: relative;
				top: -10px;
			}
			
			td,th{
					text-align: center !important;
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
				@media(max-width: 600px) {
				.cla{
					width: 60px !important;
					margin: 0 auto;
				}
				}
				span:hover{
					cursor: pointer;
					
				}
				#course{
					font-weight: bold;
					color: #6314a0;
					font-style: italic;
				}
		</style>
	
	</head>
	<body>
		
<center>
<form class="layui-form" method="post" action="dealScore.php">		
<table class="layui-table">
	<caption>
		<span id="course"><?php
			$dat = explode("@",$_GET['codes']);
			$close = select_db("off_score","sco_state,sco_stuCode,sco_class","sco_teacher='{$_SESSION['num']}' and sco_course='{$dat[1]}' and sco_class='{$dat[0]}' and sco_term='{$dat[2]}'");
			$vert = mysqli_fetch_array($close);
			if($vert){
				skip("../search.php","不能重复录入成绩");	
			}
			
			$res = select_db("off_course","cou_name","cou_code='{$dat[1]}'");
			$data = mysqli_fetch_array($res);
			echo "课程:".$data['cou_name'];
			
			?>&nbsp;
		</span>
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
    	<th>编号</th>
    	<th>学号</th>
    	<th>姓名</th>
    	<th>成绩</th>
    </tr>
    <?php 
	$i = 0;
	
	$res = select_db("off_student","stu_num,stu_name","stu_class='{$dat[0]}'");
	while($stu = mysqli_fetch_array($res)){
    	?>
    <tr>
    	<td><?php 
    		$i++;
    		echo $i;?></td>
    	<td><?php echo $stu['stu_num'];?></td>
    	<td><?php echo $stu['stu_name'];?></td>
    	<td>
      	<input type="text" name="SCO[]"   required   placeholder="成绩" class="layui-input-inline dis">
      		<input type="hidden" name="coded"  value="<?php echo $dat[0]?>" />
      		<input type="hidden" name="course"  value="<?php echo $dat[1]?>" />
      		<input type="hidden" name="term"  value="<?php echo $dat[2]?>" />
      <div class="cla">
      	<select name="CLA[]" class="cl">
      	<option value="及格">及格</option>
      	<option value="优秀">优秀</option>
        <option value="良好">良好</option>
      	<option value="中">中</option>
      	<option value="不及格">不及格</option>
      	<option value="无">无</option>
      </select>		
      </div>	
    	</td>
    </tr>	
    
    <?php 
    }?>
    <tr>
    	<td colspan="4">
    		<button  class="layui-btn layui-btn-sm" onclick="return confirm('确认提交成绩')" lay-submit>提交</button>
    	</td>
    </tr>
</table>
</form>
</center>
<script type="text/javascript">
	layui.use(['form','jquery'], function(){
  	var form = layui.form;
  	var $ = layui.jquery;
  	$(function(){
  		$("input").blur(function(){
  		if($(this).val() > 100 || $(this).val() < 0){
  			alert("所有的成绩必须大于0小于100");
  		}	
	});
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
  	});
  });
  
</script>
	</body>
</html>
