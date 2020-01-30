var formed = document.forms;
        function checkForm(){
    
    for(var i = 0;i < formed.length;i++){
      if (formed[i].value == "") {
        alert("抱歉表单不能有空值");
        return false;
      }
    }  
    return true;
   }
        
    function mesg(info){
    	layui.use(['layer','jquery'], function(){
  					var layer = layui.layer;
  					var $ = layui.jquery;
  					layer.alert(info,{icon: 2});
					});
    }
        function vertify(){
        	switch(formed[0].value){
        		case "教师端":
        		if (!(/^(W|Z)(\d){4}$/.test(formed[1].value))) {
        			mesg("请输入正确的教师账号");
                    }
        		break;
        		case "辅导员端":
     			if (!(/^A(\d){4}$/.test(formed[1].value))) {
     				mesg("请输入正确的辅导员账号");
                    }
        		break;
        		case "学生端":
     			if (!(/^\d{10}$/.test(formed[1].value))) {
     				mesg("请输入正确的学生账号");
                    }
        		break;
        		default:
        	}
        	
       }