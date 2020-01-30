<?php 
if(@$_SESSION['path']){
	echo "<script>location.href='{$_SESSION['path']}';</script>";
}		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>西安高新技师学院教务系统</title>
	<link rel="icon" href="Images/icon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	
<style>	
.login{
margin-top:20px;
}
.bgs_col{
	/*background: url("./Images/bgs.png");*/
	background: #F5F5F5;
}
#submit{
  display: block;
  width: 120px;
  height: 35px;
  border: 2px solid #d9534f;
  border-radius: 100px;
  text-align: center;
  line-height: 35px;
  font-size: 12px;
  color: #d9534f;
  background: white;
  outline: none;
}
#submit:hover{
	color: white;
	background: #d9534f;
}
#logo{
	width: 100%;
	height: 120px;
}
.mobile{
	background: white url('Images/logo.png') 133px 10px / 450px 88px no-repeat;
}
</style>

</head>

<body class="bgs_col">
	<div id="logo">
	</div>
	<div class="container login">
<div class="col-md-3 col-xs-1"></div>
	<div class="col-md-6 col-xs-10">
	<div class="panel panel-default panel-primary">
  <div class="panel-heading">教务管理系统</div>
  <div class="panel-body">
  <form class="form-horizontal" method="post" name="forms" action="./Admin/check.php">
  	
  	<div class="form-group">
  		<div class="col-sm-3"></div>
    
        <div class="col-sm-6">
    	<select class="form-control" name="role">
    		<option value="教师端">教师端</option> 
  			<option value="学生端">学生端</option>
  			<option value="辅导员端">辅导员端</option>
  			<option value="教务处端">教务处端</option>
  			<option value="管理员端">管理员端</option>
		</select>
        </div>
        <div class="col-sm-3"></div>
    </div>
    
    
  	
  <div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
    	<div class="input-group">
        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
      <input type="text" class="form-control" autofocus="autofocus" name="user" placeholder="请输入账号"  onblur="vertify()">
       </div>
    </div>
    <div class="col-sm-3"></div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
    	 <div class="input-group">
         <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
      <input type="password" class="form-control" name="pwd" placeholder="请输入密码">
      </div>
    </div>
    
    <div class="col-sm-3"></div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8 col-xs-offset-2 col-xs-10">
      <input type="submit"  value="登录" id="submit"  onclick="return checkForm()"></input>
    </div>
  </div>
</form>

    
  </div>
  <div class="panel-footer text-right text-muted">V1.0</div>
</div>
		
	</div>
	<div class="col-md-3 col-xs-1"></div>
</div>
	<script type="text/javascript" src="layui/layui.js">
	</script>
	<script type="text/javascript" src="Scripts/vertify.js"></script>
	<script type="text/javascript" src="Scripts/jquery-1.10.2.min.js">
		
	</script>
	<script type="text/javascript">
		$(function(){
			if($(window).width()>1000){
			//alert("这是小于600PX的屏幕");
			$("#logo").addClass("mobile");
		}else{
			$("#logo").append("<img src='Images/logo.png' class='img-responsive' >");
		}	
		});
		
	</script>
</body>
</html>
