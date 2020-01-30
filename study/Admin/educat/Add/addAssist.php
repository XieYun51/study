<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../../layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="../../../Styles/table.css"/>
		<script type="text/javascript" src="../../../layui/layui.js"></script>
		<script type="text/javascript" src="../../../Scripts/jquery-1.10.2.min.js"></script>
	</head>
	<body>
		
	
		
	
		<form class="layui-form" method="post" action="deaAdd.php">		

	<div class="layui-form-item">
    <label class="layui-form-label">导员编号</label>
    <div class="layui-input-inline">
      <input type="text"  id="code"  onblur="checkCode()" name="code" required  placeholder="请输入教师编号" autocomplete="on" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">导员姓名</label>
    <div class="layui-input-inline">
      <input  type="text" name="name" required  placeholder="请输入导员姓名" class="layui-input">
    </div>
    
  </div>
  
  
    <div class="layui-form-item">
    <label class="layui-form-label">性别</label>
    <div class="layui-input-block">
      <input type="radio" name="sex" value="男" title="男">
      <input type="radio" name="sex" value="女" title="女" checked>
    </div>
  </div>
  
     <div class="layui-form-item">
    <label class="layui-form-label">国籍</label>
    <div class="layui-input-block">
      <input type="radio" name="country" value="中国" title="中国"  checked>
      <input type="radio" name="country" value="美国" title="美国">
    </div>
  </div>
  
  
  <div class="layui-form-item sub">
        <label class="layui-form-label lef">籍贯</label>
        <div class="layui-inline">
			<select name="province" id="province"  lay-search lay-filter="province">
						<option value="">省份</option>
			</select>
		</div>
		<div class="layui-inline">
			<select name="city" id="city"  lay-search lay-filter="city">
					<option value="">地级市</option>
			</select>
		</div>	  		
  </div>
  
  <div class="layui-form-item sub">
        <label class="layui-form-label lef">民族</label>
        <div class="layui-inline">
			<select name="nation" id="nation" >			
			</select>
		</div>	
  </div>
  
  
  <div class="layui-form-item">
    <label class="layui-form-label">身份证号</label>
    <div class="layui-input-inline">
      <input  type="text" id="card" onblur="checkCard()" name="card" required  placeholder="请输入身份证号" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
        <label class="layui-form-label">最高学历</label>
    <div class="layui-input-inline">
      <select name="highEdu" >
      	<option value="博士">博士</option>
        <option value="硕士研究生">硕士研究生</option>
      	<option value="本科">本科</option>
      	<option value="大专">大专</option>
      </select>
    </div>	  		
  </div>
  
  <div class="layui-form-item">
        <label class="layui-form-label">学位</label>
    <div class="layui-input-inline">
      <select name="degre" >
      	<option value="博士">博士</option>
        <option value="硕士">硕士</option>
      	<option value="本科">学士</option>
      	<option value="无">无</option>
      </select>
    </div>	  		
  </div>
  <input type="hidden" name="id"  value="3" />
  <div class="layui-form-item">
        <label class="layui-form-label">所属单位</label>
    <div class="layui-input-inline">
      <select name="depart" >
      	<option value="教务处">教务处</option>
        <option value="学生处">学生处</option>
      </select>
    </div>	  		
  </div>
    
  
  <div class="layui-form-item">
    <label class="layui-form-label">来校日期</label>
    <div class="layui-input-inline">
<input type="data" name="comTime" id="date" lay-verify="date" placeholder="请输入日期" autocomplete="off" class="layui-input">      
    </div>
  </div>

  
  
  
  
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit  >立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
  

		</form>
	
		<script type="text/javascript" src="../../../Scripts/area.js"></script>
		<script type="text/javascript" src="../../../Scripts/select.js"></script>
<script type="text/javascript">



layui.use('laydate', function(){
var laydate = layui.laydate;
 

laydate.render({
elem: '#date' //指定元素
});
});
var code = document.getElementById("code");
var card = document.getElementById("card");
function checkCode(){
	var reg = /^A(\d){4}$/;
	if(!(reg.test(code.value))){
		alert("请输入正确的导员编码方式A+4位数字");
	}
}

function  checkCard(){
	var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;  
	if(!(reg.test(card.value))){
		alert("请输入合法的身份证号");
	}
}





	
</script>
		
	</body>
</html>
