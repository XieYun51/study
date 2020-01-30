<?php
	
	include "../../includes/db.info.php";
	include "../../includes/db.inc.php";

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
				tr,th,td{
		text-align: center !important;
			}
			@media (max-width: 600px) {
				
				td,th{
					font-size: 12px !important;
				}
			}
			
				@media (min-width: 1000px) {
			table{
				width: 90% !important;
			}
			}
			button a ,button a:hover{
				color: white;
			}
		</style>
	
	</head>
	<body>
<center>
<table class="layui-table">    
    <tr>
    	<th>序号</th>
    	<th>编辑</th>
    	<th>分组</th>
    	<th>评价内容及说明</th>
    	<th>A优</th>
    	<th>B良</th>
    	<th>C中</th>
    	<th>D及</th>
    	<th>E差</th>
    </tr>
    <?php 
    	$i = 0;
    	$resj = select_db("off_comment","*",null);
 		while($data = mysqli_fetch_array($resj)){   	
    	?>
    <tr>
    	<td><?php $i++;echo $i;?></td>
    	<td>
    		<button type="button" class="layui-btn layui-btn-danger layui-btn-sm">
  <a  href="Modify/modify_comm.php?id=<?php echo $data['id'];?>"  title="修改">
    			<span class="layui-icon layui-icon-edit"></span>
    		</a>
</button> 
    		
    	</td>
    	<td><?php echo $data['com_group'];?></td>
    	<td><?php echo $data['com_explain'];?></td>
    	<td><?php echo $data['com_A'];?></td>
    	<td><?php echo $data['com_B'];?></td>
    	<td><?php echo $data['com_C'];?></td>
    	<td><?php echo $data['com_D'];?></td>
    	<td><?php echo $data['com_E'];?></td>
    	
    </tr>
    <?php 
    }?>
   
    <tr>
    	<td colspan="4" align="center">总计</td>
    	<td><?php 
    		$ds = select_db("off_comment","sum(com_A) as A,sum(com_B) as B,sum(com_C) as C,sum(com_D) as D,sum(com_E) as E",null);
    		$dat = mysqli_fetch_array($ds);
    		echo $dat['A'];
    		?></td>
    	<td><?php echo $dat['B'];?></td>
    	<td><?php echo $dat['C'];?></td>
    	<td><?php echo $dat['D'];?></td>
    	<td><?php echo $dat['E'];?></td>
    </tr>
    
    
</table>
		</center>
	</body>
</html>
