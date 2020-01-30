<?php
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	if(@$_SESSION['auth'] != 1){
	skip("../../../index.php","非法访问，你的攻击行为已经被记录");	
}


            $res = select_db("off_score","distinct sco_course","sco_class='{$_POST['class']}' and sco_term='{$_POST['term']}'");
    		$arr = null;
    		$course = null;
    		while($dat = mysqli_fetch_array($res)){
    			$arr[] = $dat['sco_course'];
    		}
    		for($i = 0;$i < count($arr);$i++){
    			$dats = select_db("off_course","cou_name","cou_code='{$arr[$i]}'");
    			$resu = mysqli_fetch_array($dats);
    			$course[] = $resu['cou_name'];	
    		}
    	

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../../../layui/css/layui.css" />
        <link rel="stylesheet" href="../../../layui/css/modules/layui-extend/iconfont.css" />
		<script type="text/javascript" src="../../../layui/layui.js">			
		</script>
		<script type="text/javascript" src="../../../Scripts/jquery-1.4.4.min.js">
			
		</script>
		<script type="text/javascript" src="../../../Scripts/jquery.jqprint-0.3.js">
		</script>
		<style type="text/css">
			@media (min-width: 1000px) {
			table{
				width: 90% !important;
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

     <button type="button" class="layui-btn  layui-btn-sm">
         <a  href="#"  onclick="window.print()" title="下载成绩报表">
             <span class="iconfont layui-xiazai"></span>
         </a>
     </button>
<table class="layui-table">

    <tr>
    	<th>学号</th>
        <th>姓名</th>
        <?php
    		for($a = 0;$a < count($course);$a++){
    	
    		?>
    	<th><?php 	echo $course[$a];?></th>
    	<?php }?>
    		
    </tr>
    <?php 
    	$resd = select_db("off_score","distinct sco_stuCode","sco_class='{$_POST['class']}' and sco_term='{$_POST['term']}'");
    	while($data = mysqli_fetch_array($resd)){
    		
    		?>
    <tr>
    	<td><?php echo $data['sco_stuCode'];?></td>
        <td><?php
            $resg = select_db("off_student","stu_name","stu_num='{$data['sco_stuCode']}'");
            $da = mysqli_fetch_array($resg);
            echo $da['stu_name'];?>
        </td>
    	<?php 
    		for($a = 0;$a < count($arr);$a++){
    	
    		?>
    	<td><?php 	
    		$result = select_db("off_score","sco_stuScore","sco_class='{$_POST['class']}' and sco_term='{$_POST['term']}' and sco_course='{$arr[$a]}' and sco_stuCode='{$data['sco_stuCode']}'");
    		$dj = mysqli_fetch_array($result);
    		echo $dj["sco_stuScore"];?></td>
    	<?php }?>
    </tr>
    <?php }?>
    </table>
 </center>
<script>

layui.use('form', function(){
  var form = layui.form;
  
});

</script>
		

  

		
		
	</body>
</html>