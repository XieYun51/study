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
		<style type="text/css">
				tr,th,td{
		text-align: center !important;
			}
			@media (max-width: 600px) {
				
				td,th{
					height: 20px;
				}
			}
			button a,button a:hover{
				color: white;
			}
			@media (min-width: 1000px) {
			table{
				width: 90% !important;
			}
			}

            caption{
                position: relative;
                top: -5px;

            }
            span:hover,a:hover{
                font-weight: bold;
                color: purple;
            }

		</style>
	
	</head>
	<body>
<center>		
<table class="layui-table">
    <caption>
        <a href="Modify/turn_year.php">
			<span class="layui-icon layui-icon-release">
			</span>&nbsp;切换
        </a>
    </caption>
	
    
    <tr>
    	<th>开始年度</th>
    	<th>结束年度</th>
    	<th>学期</th>
    	<th>学期名称</th>
    	<th>学期简称</th>
    	<th>是否为当前学期</th>
    </tr>
    <?php 

	$res = select_db("off_teachYear","*",null);
	while($info = mysqli_fetch_array($res)){
    	?>
    <tr class="sty">
    	<td><?php echo $info['teach_start'];?></td>
    	<td><?php echo $info['teach_end'];?></td>
    	<td><?php echo $info['teach_term'];?></td>
    	<td><?php echo $info['teach_name'];?></td>
    	<td><?php echo $info['teach_brief'];?></td>
    	<td class="sta"><?php echo $info['teach_state'];?></td>
    </tr>	
    
    <?php }?>
</table>
</center>

<script type="text/javascript">

    var styles = document.getElementsByClassName("sty");
    var state = document.getElementsByClassName("sta");
    for (var i = 0;i < state.length;i++){

        if(state[i].innerHTML == 1){
            styles[i].style.color = "red";
            styles[i].style.fontWeight = "bold";
            styles[i].style.fontStyle = "italic";
        }
    }

</script>


	</body>
</html>
