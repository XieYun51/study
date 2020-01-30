<?php
	include "../../includes/db.info.php";
	include "../../includes/db.inc.php";
	include "../../includes/fun.inc.php";
	if(!@$_SESSION['num']){
	skip("../../index.php","请重新登陆");
}

if(@$_SESSION['auth'] != 3){
	skip("../../index.php","非法访问，你的攻击行为已经被记录");
	
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>管理员端</title>
		<link rel="stylesheet" type="text/css" href="../../layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../../Styles/public.css"/>
		<link rel="stylesheet" type="text/css" href="../../layui/css/modules/layui-extend/iconfont.css"/>
		<script type="text/javascript" src="../../layui/layui.js"></script>
		<script type="text/javascript" src="../../Scripts/jquery-1.10.2.min.js">			
		</script>
		
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
				    <a href="javascript:;"><i class="icons layui-icon layui-icon-set-fill"></i>系统设置</a>
				    <dl class="layui-nav-child">
				      <dd>
				      	<a href="pwd.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-password">
				      		</span>修改密码
				      	</a>
				      </dd>
				    </dl>
				  </li>
				  
				  <li class="layui-nav-item  layui-nav-itemed">
				  	<a href="javascript:;"><i class="icons layui-icon layui-icon-util"></i>基本信息</a>
				  	<dl class="layui-nav-child">
				      <dd>
				      	<a href="depart_info.php" class="sub0">
				      		<span class="icons iconfont layui-guanli1">
				      		</span>单位管理
				      	</a>
				      </dd>
				        <dd>
				      	<a href="major_info.php" class="sub0">
				      		<span class="icons iconfont layui-baobiaoguanli_active">
				      		</span>
				      		专业管理
				      	</a>
				      </dd>
				      <dd>
				      	<a href="teacher_info.php" class="sub0">
				      		<span class="icons iconfont layui-guanli-copy1">
				      		</span>
				      		教师管理
				      	</a>
				      </dd>
				      <dd>
				      	<a href="assist_info.php" class="sub0">
				      		<span class="icons iconfont layui-guanli">
				      		</span>
				      		导员管理
				      	</a>
				      </dd>
				   </dl>
				   </li>
				  
				  <li class="layui-nav-item  layui-nav-itemed">
				  	<a href="javascript:;"><i class="icons layui-icon layui-icon-app"></i>学籍管理</a>
				  	<dl class="layui-nav-child">
				      <dd>
				      	<a href="class_info.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-group">
				      		</span>班级管理
				      	</a>
				      </dd>
				      <dd>
				      	<a href="Modify/turn_major.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-username">
				      		</span>&nbsp;&nbsp;学生管理
				      	</a>
				      </dd>
				        <dd>
				      	<a href="student_info.php" class="sub0">
				      		<span class="icons iconfont layui-yichang1">
				      		</span>&nbsp;&nbsp;学籍异动
				      	</a>
				      </dd>
				   </dl>
				   </li>
				   
				   <li class="layui-nav-item  layui-nav-itemed">
				  	<a href="javascript:;"><i class="icons layui-icon layui-icon-diamond"></i>教务管理</a>
				  	<dl class="layui-nav-child">
				      <dd>
				      	<a href="teach_plan.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-read">
				      		</span>教学计划
				      	</a>
				      </dd>
				        <dd>
				      	<a href="teachYear_info.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-date">
				      		</span>
				      		教学年度
				      	</a>
				      </dd>
				      <dd>
				      	<a href="spareCou_serch.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-form">
				      		</span>
				      		教学任务
				      	</a>
				      </dd>
				      <dd>
				      	<a href="comment_info.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-survey">
				      		</span>
				      		教学评价体系
				      	</a>
				      </dd>
				   </dl>
				   </li>
				   
				   <li class="layui-nav-item  layui-nav-itemed">
				  	<a href="javascript:;"><i class="icons layui-icon layui-icon-tabs"></i>课务管理</a>
				  	<dl class="layui-nav-child">
				      <dd>
				      	<a href="course_search.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-component">
				      		</span>课程管理
				      	</a>
				      </dd>
				   </dl>
				   </li>
				   
				   <li class="layui-nav-item  layui-nav-itemed">
				  	<a href="javascript:;"><i class="icons layui-icon layui-icon-engine"></i>成绩管理</a>
				  	<dl class="layui-nav-child">
				      <dd>
				      	<a href="score_info.php" class="sub0">
				      		<span class="icons iconfont layui-yichang3">
				      		</span>成绩异动
				      	</a>
				      </dd>
				   </dl>
				   </li>
				   
				    <li class="layui-nav-item  layui-nav-itemed">
				  	<a href="javascript:;"><i class="icons layui-icon layui-icon-list"></i>考务管理</a>
				  	<dl class="layui-nav-child">
				      <dd>
				      	<a href="exam_plan.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-release">
				      		</span>考试计划
				      	</a>
				      </dd>
				      <dd>
				      	<a href="exam_sum.php" class="sub0">
				      		<span class="icons layui-icon layui-icon-chart">
				      		</span>报名汇总
				      	</a>
				      </dd>
				   </dl>
				   </li>
				  
				  
				  
				  	</ul>  				
			</div><!--左侧边栏结束-->
			
			
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
					    <a href="javascript:;"><?php echo select_name("off_education","edu_name","edu_code='{$_SESSION['num']}'");?>老师</a>
					  </li>
					  <li class="layui-nav-item">
					  	<a href="../out.php?id=0"  onclick="return confirm('确认注销')">注销登录</a>
					  </li>
					</ul>
				</div><!--头部结束-->
				
				<!--中间内容区域-->
				<div class="main-middle-body">
					<!--tab 切换-->
					<div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
					
					  <ul class="layui-tab-title">
					    <li class="layui-this welcome">管理员主页</li>
					  </ul>
					  <div class="layui-tab-content" >
					    <div class="layui-tab-item layui-show"  style="background: #f5f5f5;">
					    	
					    	<iframe id="skip" src="depart_info.php" width="100%" height="100%" name="iframe" scrolling="auto" class="iframe"  frameborder="no"></iframe>
					    	
					    </div>
					  </div>
					</div>
				</div>	<!--中间区域结束-->
			</div>	<!--右侧整体结束-->
				<!--遮罩点击留白-->
			<div class="main-middle-mask">
				
			</div>
		</div><!--大容器结束-->
			

<script type="text/javascript" src="../../Scripts/api.js"></script>
<script type="text/javascript" src="../../Scripts/common.js"></script>



		
	</body>
</html>
