<?php
	include "../../includes/fun.inc.php";
	include "../../includes/db.info.php";
	include "../../includes/db.inc.php";
	if(!@$_SESSION['num']){
	skip("../../index.php","访问时间过期请重新登陆");
}

if(@$_SESSION['auth'] != 99){
	skip("../../index.php","非法访问，你的攻击行为已经被记录");
	
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>学生端</title>
		<link rel="stylesheet" type="text/css" href="../../layui/css/layui.css"/>
		<script type="text/javascript" src="../../layui/layui.js"></script>
		<script type="text/javascript" src="../../Scripts/jquery-1.10.2.min.js">			
		</script>
		<link rel="stylesheet" type="text/css" href="../../Styles/public.css"/>		
	</head>
	<body>
		
		<div class="main" id="main"><!--主体大容器开始-->
			<!--左侧边栏开始-->
			<div class="main-left-side">
				<div class="main-left-logo">
					<img src="../../Images/left-logo.png"/>
				</div>
				<ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
				  <li class="layui-nav-item layui-nav-itemed">
				    <a href="javascript:;"><i class="icons layui-icon layui-icon-set"></i>系统设置</a>
				    <dl class="layui-nav-child">
				      <dd>
				      	<a href="pwd.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-password">
				      		</span>修改密码
				      	</a>
				      </dd>
				    </dl>
				  </li>
				  <li class="layui-nav-item">
				    <a href="stu_info.php" class="sub0">
				    	<i class="icons layui-icon layui-icon-friends"></i>
				    	个人信息
				    </a>
				  </li>
				  <li class="layui-nav-item">
				    <a href="exam.php" class="sub0">
				    	<i class="icons layui-icon layui-icon-release"></i>
				    	报名考试
				    </a>
				  </li>
				  <li class="layui-nav-item">
				    <a href="search.php" class="sub0">
				    	<i class="icons layui-icon layui-icon-search"></i>
				    	查询成绩
				    </a>
				  </li>
				</ul>  				
			</div>
			<!--左侧边栏结束-->
			
				<!--右侧整体内容-->
			<div class="main-right-container">
				
				<div class="main-header"><!--头部开始-->
					<div class="menu-left-btn" id="hideBtn">
						<!--左上角头部-->
						<a href="javascript:;">
							<span class="icons layui-icon layui-icon-shrink-right"></span>
						</a>
					</div>
					
					<!--右上角头部-->
					<ul class="layui-nav" lay-filter="rightNav">
					  <li class="layui-nav-item cool">
					    <a href="javascript:;"><?php echo select_name("off_student","stu_name","stu_num='{$_SESSION['num']}'");?>同学</a>
					  </li>
					  <li class="layui-nav-item">
					  	<a href="../out.php?id=0"  onclick="return confirm('确认注销')">注销登录</a>
					  </li>
					</ul>
				</div><!--头部结束-->
				
				<!--中间内容区域-->
				<div class="main-middle-body">
					<!--tab 切换-->
					<div class="layui-tab layui-tab-brief" lay-filter="tab">
					  <ul class="layui-tab-title">
					    <li class="layui-this info">学生端主页</li>
					  </ul>
					  <div class="layui-tab-content">
					    <div class="layui-tab-item layui-show" >
					    	
					    	<iframe id="skip" src="stu_info.php" width="100%" height="600px" name="iframe" scrolling="auto" class="iframe"  frameborder="no"></iframe>
					    	
					    </div>
					  </div>
					</div>
				</div>	<!--中间区域结束-->
				<!--遮罩点击留白-->
			<div class="main-middle-mask">
				
			</div>
		</div><!--大容器结束-->
			

<script type="text/javascript" src="../../Scripts/api.js"></script>
<script type="text/javascript" src="../../Scripts/common.js"></script>



		
	</body>
</html>
