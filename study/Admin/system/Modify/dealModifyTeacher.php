<?php
/**
 * Created by PhpStorm.
 * User: XieYun
 * Date: 2020/1/28
 * Time: 12:44
 */

include "../../../includes/db.info.php";
include "../../../includes/db.inc.php";
include "../../../includes/fun.inc.php";


$arr = array(
    "tea_code"=>$_POST['code'],
    "tea_name"=>$_POST['name'],
    "tea_sex"=>$_POST['sex'],
    "tea_country"=>$_POST['country'],
    "tea_place"=>$_POST['place'],
    "tea_nation"=>$_POST['nation'],
    "tea_cardNum"=>$_POST['card'],
    "tea_highEdu"=>$_POST['highEdu'],
    "tea_eduDegre"=>$_POST['eduDegre']
);


function update(){
    $dat = update_db("off_teacher",$GLOBALS['arr'],"tea_code='{$_POST['modCode']}'");
    if($dat == 1){
        skip("../teacher_info","修改成功");
    }
}


if($_POST['code'] != $_POST['modCode']){
    $resg = select_db("off_teacher","id","tea_code='{$_POST['code']}'");
    $dat = mysqli_fetch_array($resg);
    if(empty($dat)){
    update();
    }else{
        skip("../teacher_info","抱歉和已有教师编号重复");
    }
}else{
    update();
}



