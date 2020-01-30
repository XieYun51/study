<?php

function skip($url,$info){
	if($info == null){
		echo "<script>location.href='{$url}';</script>";
	}
	echo "<script>alert('{$info}');location.href='{$url}';</script>";
	
}//跳转指定页面


function  vertify($table,$fields,$condition,$url1,$info1,$url0,$info0){
	$data = select_db($table,$fields,$condition);
	if($data->num_rows > 0){
		skip($url1,$info1);
		$_SESSION['num'] = $_POST['user'];
		$_SESSION['path'] = "Admin".substr($url1,1);
	}else{
		skip($url0,$info0);
	}
	
}//判断登陆信息

function chgPwd($tab,$field,$conditions){
		$pwd = sha1($_POST['pwd']);
		$rows = select_db($tab,$field,$conditions);
	    $arr = mysqli_fetch_array($rows);
	    if($arr[$field] == $pwd){
	    	$array = array(
		$field=>sha1($_POST['new1'])
		);
		$afect = update_db($tab,$array,$conditions);
		if($afect == 1){
			echo "<script>alert('密码修改成功');</script>";
		}else{
			echo "<script>alert('系统故障请联系管理员');</script>";
		}
	    }else{
	    	echo "<script>alert('输入旧密码有误');</script>";
	    }
	}
	
	function select_name($tab,$field,$condition){
		$data = select_db($tab,$field,$condition);
		$dat = mysqli_fetch_array($data);
		$name = $dat[$field];
		return $name; 		
	}
	
	
function page($tab,$field,$size,$condition){
			
$currentPage = 1;
if(isset($_GET['page'])){
	$currentPage = $_GET['page'];
}

$result = select_db($tab,"count(*) as count",null);
$arr = mysqli_fetch_array($result);
$count = $arr['count'];
$pageSize = $size;
$pages = ceil($count/$pageSize);//共多少页
$prePage = $currentPage -1;
if($prePage<=0){
	$prePage=1;	
}

$nextPage = $currentPage+1;
if($nextPage >= $pages){
$nextPage = $pages;
}

$start = ($currentPage-1) * $pageSize;//起始位置
$result = select_page($tab,$field,$condition."limit $start,$pageSize");
$array = array(
"prePage"=>$prePage,
"nextPage"=>$nextPage,
"result"=>$result);
return $array;	
}


	
	

?>