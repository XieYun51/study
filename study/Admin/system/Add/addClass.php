    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>导入班级信息</title>
      <link rel="stylesheet" href="../../../layui/css/layui.css" />
      <script type="text/javascript" src="../../../layui/layui.js">
      </script>
      <style type="text/css">
      	#info{
      		margin: 20px;
      	}
      </style>
    </head>
    <body>
     
     <form action="../../upload.php" class="layui-form" method="post" enctype="multipart/form-data">
     	
    <div class="layui-form-item">
    <div class="layui-input-inline">
      <input type="file" name="class" required  lay-verify="required"  class="file-input">
    </div>
  </div>
     	<button type="submit" class="layui-btn layui-btn-danger">
      <i class="layui-icon">&#xe67c;</i>上传班级文件
    </button>
     </form>
    
    <script>
    layui.use('form', function(){
      var form = layui.form;
      
    });
    </script>
    </body>
    </html>