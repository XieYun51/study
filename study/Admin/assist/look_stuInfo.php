<?php
	include "../../includes/db.info.php";
	include "../../includes/db.inc.php";
	include "../../includes/fun.inc.php";
	if(@$_SESSION['auth'] != 1){
	skip("../../index.php","非法访问，你的攻击行为已经被记录");	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../layui/css/layui.css" />

		<script type="text/javascript" src="../../layui/layui.js">			
		</script>
        <link rel="stylesheet" href="../../layui/css/modules/layui-extend/iconfont.css" />
		<style type="text/css">
			@media (min-width: 1000px) {
			table{
				width: 60% !important;
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
    	<th>下载</th>
    </tr>
    <?php 

		$res = select_db("off_spareCla","spa_claCode","spa_assCode='{$_SESSION['num']}'");
		$result = mysqli_fetch_array($res);
		if($result['spa_claCode'] != ""){
		$arr = explode("-",$result['spa_claCode']);
		if(count($arr) == 1){
    	?>
    <tr>
    	<td><?php echo $arr[0];?></td>
    
		<td>    		
<button type="button" class="layui-btn  layui-btn-danger layui-btn-sm">
  <a onclick="return confirm('确认下载班级信息表')" href="Deal/down.php?code=<?php echo $arr[0];?>"  title="下载">
    			<span class="iconfont layui-xiazai"></span>
    		</a>
</button>    		
    	</td>
    </tr>	
    
    <?php 
    }else{
    	for($i = 0;$i<count($arr);$i++){
    	?>
    	<tr>
    	<td><?php echo $arr[$i];?></td>
    
		<td>    		
<button type="button" class="layui-btn layui-btn-danger layui-btn-sm">
  <a onclick="return confirm('确认下载班级信息表')" href="Deal/down.php?code=<?php echo $arr[$i];?>"  title="下载">
    			<span class="iconfont layui-xiazai"></span>
    		</a>
</button>    		
    	</td>
    </tr>
    <?php }
    	}
    	}?>
</table>

 
 
<script>

layui.use('form', function(){
  var form = layui.form;
  
});
</script>
		

  

		
		
	</body>
</html>
