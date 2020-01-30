<?php
/**
 * Created by PhpStorm.
 * User: XieYun
 * Date: 2020/1/29
 * Time: 17:04
 */

include "../../../includes/db.info.php";
include "../../../includes/db.inc.php";
include "../../../includes/fun.inc.php";

$res = select_db("off_teachYear","id","teach_state='1'");
$data = mysqli_fetch_array($res);


$id = $data['id'] + 1;

$arr1 = array(
    "teach_state"=>"1"
);
$arr0 = array(
    "teach_state"=>"0"
);
$data1 = update_db("off_teachYear",$arr1,"id='{$id}'");
$data0 = update_db("off_teachYear",$arr0,"id='{$data['id']}'");
if($data0 == 1 && $data1 == 1 ){
    skip("../teachYear_info.php","切换成功");
}else{
    skip("../teachYear_info.php","切换失败");
}