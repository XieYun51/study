<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	
	
	if(isset($_POST['A'])){
		$arr = array(
		"com_group"=>$_POST['group'],
		"com_explain"=>$_POST['group'],
		"com_A"=>$_POST['A'],
		"com_B"=>$_POST['B'],
		"com_C"=>$_POST['C'],
		"com_D"=>$_POST['D'],
		);
		$dat = update_db("off_comment",$arr,"id='{$_POST['ids']}'");
		if($dat == 1){
			skip("../comment_info.php","修改成功");
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
			@media (max-width: 600px) {
			form{
				margin-left: -30px;
    			margin-right: 30px;
			}
			}
			textarea{
				resize: none !important;
				
			}
			
		</style>
	</head>
	<body>

<form class="layui-form" method="post" action="modify_comm.php">		

	
  <div class="layui-form-item">
    <label class="layui-form-label">分组</label>
    <div class="layui-input-inline">
      <input type="text" name="group"  placeholder="请输入分组名称" autocomplete="on" class="layui-input">
    </div>
  </div>
  <input type="hidden" name="ids"  value="<?php echo $_GET['id'];?>" />
  <div class="layui-form-item">
    <label class="layui-form-label">评价内容</label>
    <div class="layui-input-inline">
      <textarea autocomplete="on" placeholder="评价内容以及说明" class="layui-textarea" name="explain" id="class" rows="5" cols="20"></textarea>
    </div>
    
  </div>
  
 
  <div class="layui-form-item">
    <label class="layui-form-label">A优</label>
    <div class="layui-input-inline">
      <input type="text" name="A"   placeholder="请输入分数" class="layui-input">
    </div>
    
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">B良</label>
    <div class="layui-input-inline">
      <input type="text" name="B"   placeholder="请输入分数" class="layui-input">
    </div>
    
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">C中</label>
    <div class="layui-input-inline">
      <input type="text" name="C"   placeholder="请输入分数" class="layui-input">
    </div>
    
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">D及</label>
    <div class="layui-input-inline">
      <input type="text" name="D"   placeholder="请输入分数" class="layui-input">
    </div>
    
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">E差</label>
    <div class="layui-input-inline">
      <input type="text" name="E"   placeholder="请输入分数" class="layui-input">
    </div>
    
  </div>
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit  >立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
 
<!--<script>
	
	


layui.use('form', function(){
  var form = layui.form;
});
</script>-->
		
	</body>
</html>
