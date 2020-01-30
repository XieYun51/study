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
			
			
			.icon2{
				position: relative;
				left: 10px;
				
			}
			button a,button a:hover{
				color: white;
			}
			caption a{
				position: relative;
				top: -5px;
			}
			@media (min-width: 1000px) {
			table{
				width: 90% !important;
			}
			}
		</style>
	
	</head>
	<body>
<center>		
<table class="layui-table">
	<caption>
		<a href="Add/addTeacher.php">
			<span class="layui-icon layui-icon-add-1">				
			</span>&nbsp;新增教师
		</a>
		&nbsp;
		<a href="Add/downTeach.php" onclick="return confirm('确认下载')">
			<span class="layui-icon layui-icon-download-circle">
			</span>下载教师信息
		</a>
	</caption>
    <tr>
    	<th>教师编号</th>
    	<th>教师姓名</th>
    	<th>性别</th>
    	<th>所属单位</th>
    	<th>最高学历</th>
    	<th>操作</th>
    </tr>
    <?php 

	$res = page("off_teacher","*",8,null);
	while($teacher = mysqli_fetch_array($res["result"])){
    	?>
    <tr>
    	<td><?php echo $teacher['tea_code'];?></td>
    	<td><?php echo $teacher['tea_name'];?></td>
    	<td><?php echo $teacher['tea_sex'];?></td>
    	<td><?php echo $teacher['tea_depart'];?></td>
    	<td><?php echo $teacher['tea_highEdu'];?></td>
    	<td>
    		
            <button type="button" class="layui-btn layui-btn-danger layui-btn-sm">
                <a onclick="return confirm('确认删除')" href="Delete/delete.php?id=2&code=<?php echo $teacher['tea_code'];?>"  title="删除">
    			<span class="layui-icon layui-icon-delete"></span>
    		    </a>
            </button>
            <button type="button" class="layui-btn layui-btn-normal layui-btn-sm">
                <a  href="Modify/modify_teacher.php?code=<?php echo $teacher['tea_code'];?>"  title="修改">
                    <span class="layui-icon layui-icon-edit"></span>
                </a>
            </button>

        </td>
    </tr>	
    
    <?php }?>
</table>

	<button type="button" class="layui-btn layui-btn-normal layui-btn-radius"><a href="<?php 
		$pre = page("off_teacher","*",8,null);
		echo $_SERVER['PHP_SELF'].'?page='.$pre['prePage']; ?>">上一页</a></button>
	<button type="button" class="layui-btn layui-btn-normal layui-btn-radius"><a href="<?php
		$next = page("off_teacher","*",8,null); 
		echo $_SERVER['PHP_SELF'].'?page='.$next['nextPage']; ?>">下一页</a></button>
</center>
		
	</body>
</html>
