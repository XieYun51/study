<?php
/**
 * Created by PhpStorm.
 * User: XieYun
 * Date: 2020/1/28
 * Time: 14:13
 */




include "../../../includes/db.info.php";
include "../../../includes/db.inc.php";
include "../../../includes/fun.inc.php";


$arr = array(
    "ass_code"=>$_POST['code'],
    "ass_name"=>$_POST['name'],
    "ass_sex"=>$_POST['sex'],
    "ass_country"=>$_POST['country'],
    "ass_place"=>$_POST['place'],
    "ass_nation"=>$_POST['nation'],
    "ass_cardNum"=>$_POST['card'],
    "ass_highEdu"=>$_POST['highEdu'],
    "ass_eduDegre"=>$_POST['eduDegre']
);


$str = preg_replace('# #', '', $_POST['class']);
$ds = substr($str,-1);
if($ds == "-"){
    $strs = substr($str,0,strlen($str)-1);
    $class = array(
        "spa_claCode"=>$strs
    );
}else{
    $class = array(
        "spa_claCode"=>$str
    );
}


function update(){
    $dat = update_db("off_assist",$GLOBALS['arr'],"ass_code='{$_POST['modCode']}'");
    $cla = update_db("off_spareCla",$GLOBALS['class'],"spa_assCode='{$_POST['modCode']}'");
    if($dat == 1 || $cla == 1){
        skip("../assist_info","修改成功");
    }else{
        skip("../assist_info","修改失败，请不要恶意修改数据");
    }
}


if($_POST['code'] != $_POST['modCode']){
    $resg = select_db("off_assist","id","ass_code='{$_POST['code']}'");
    $dat = mysqli_fetch_array($resg);
    if(empty($dat)){
        update();
    }else{
        skip("../assist_info","抱歉和已有辅导员编号重复");
    }
}else{
    update();
}



