<?php
	include  "../../includes/db.info.php";
	include  "../../includes/db.inc.php";
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
		<style>
			tr,th,td{
				text-align: center !important;
			}
			
			td{
				word-wrap: break-word !important; 
				word-break: break-all !important;
				
			}
			
			@media (max-width: 600px) {
				
				td{
					height: 90px;
				}
			}
			@media (min-width: 1000px) {
				
				table{
					width: 70% !important;
				}
			}
			
		</style>
	</head>
	<body>
		
		
		<center>
<table class="layui-table" lay-even lay-skin="row" >
  
  
    <tr>
      <th class="layui-col-xs3 layui-col-md3">姓名</th>
      <th class="layui-col-xs3 layui-col-md3">学号</th>
      <th class="layui-col-xs3 layui-col-md3">班级</th>
      <th class="layui-col-xs3 layui-col-md3">专业</th>
      <!--<th class="layui-col-xs3 layui-col-md3">系别</th>-->
     
    </tr> 
  
  <?php $res = select_db("off_student","*","stu_num='{$_SESSION['num']}'");
  	$data = mysqli_fetch_array($res);
  	?>
    <tr>
      <td class="layui-col-xs3 layui-col-md3"><?php echo  $data['stu_name'];?></td>
      <td class="layui-col-xs3 layui-col-md3"><?php echo  $data['stu_num'];?></td>
      <td class="layui-col-xs3 layui-col-md3"><?php echo  $data['stu_class'];?></td>
      <td class="layui-col-xs3 layui-col-md3"><?php echo  $data['stu_major'];?></td>
<!--      <td class="layui-col-xs3 layui-col-md3"><?php echo  $data['stu_depart'];?></td>-->
   
    </tr>

    
  
</table>
		</center>
		
	</body>
</html>
