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
		<style type="text/css">
			@media (max-width: 600px) {
			form{
				margin-left: -50px;
    			margin-right: 50px;
			}
			.sub{
				position: relative !important;
				left: 80px !important;
			}
			
			}
			.sub{
				position: relative;
				left: -120px;
			}
		</style>

		
	</head>
	<body>
  
   <form class="layui-form" method="post" action="Deal/deal_score.php">
	
   <div class="layui-form-item layui-inline">
    <div class="layui-input-inline">
      <select name="class" lay-verify="required">
      <?php	
		$res = select_db("off_spareCla","spa_claCode","spa_assCode='{$_SESSION['num']}'");
		$result = mysqli_fetch_array($res);
		if($result['spa_claCode'] != ""){
		$arr = explode("-",$result['spa_claCode']);
		if(count($arr) == 1){
    	?>
    	<option value="<?php echo $arr[0];?>"><?php echo $arr[0];?></option>
    <?php 
    }else{
    	for($i = 0;$i<count($arr);$i++){
    	?>
    	<option value="<?php echo $arr[$i];?>"><?php echo $arr[$i];?></option>
    
    <?php }
    	}
    	}?>
      	
      </select>
    </div>	  	
  </div>
  
    <div class="layui-form-item layui-inline">
    <div class="layui-input-inline">
      <select name="term" lay-verify="required">
      	<option value="2019-2020-1">2019-2020-1</option>
      	<option value="2019-2020-2">2019-2020-2</option>
      	<option value="2020-2021-1">2020-2021-1</option>
      	<option value="2020-2021-2">2020-2021-2</option>
      	<option value="2020-2021-1">2021-2022-1</option>
      	<option value="2020-2021-2">2021-2022-2</option>
      	<option value="2020-2021-1">2022-2023-1</option>
      	<option value="2020-2021-2">2022-2023-2</option>
      	<option value="2020-2021-1">2023-2024-1</option>
      	<option value="2020-2021-2">2023-2024-2</option>
      </select>
    </div>	  		
  </div>
   
  
  <div class="layui-form-item layui-inline sub">
    <div class="layui-input-block">
      <button class="layui-btn  layui-btn-normal" lay-submit>查询</button>
    </div>
  </div>
</form>
 
<script>

layui.use('form', function(){
  var form = layui.form;
  
});
</script>
		

  

		
		
	</body>
</html>
