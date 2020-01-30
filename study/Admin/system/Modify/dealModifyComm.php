<?php
/**
 * Created by PhpStorm.
 * User: XieYun
 * Date: 2020/1/29
 * Time: 15:09
 */




include "../../../includes/db.info.php";
include "../../../includes/db.inc.php";
include "../../../includes/fun.inc.php";


$arr = array(
    "com_A"=>$_POST['A'],
    "com_B"=>$_POST['B'],
    "com_C"=>$_POST['C'],
    "com_D"=>$_POST['D'],
    "com_E"=>$_POST['E'],
    "com_group"=>$_POST['group'],
    "com_explain"=>$_POST['explain']

);



function update(){
    $dat = update_db("off_comment",$GLOBALS['arr'],"id='{$_POST['id']}'");
    if($dat == 1){
        skip("../comment_info","修改成功");
    }else{
        skip("../comment_info","请编辑之后再点击提交");
    }
}


update();



