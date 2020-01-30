<?php
/**
 * Created by PhpStorm.
 * User: XieYun
 * Date: 2020/1/29
 * Time: 18:42
 */


header("content-type:text/html;charset=UTF-8");
include "../includes/db.info.php";
include "../includes/db.inc.php";
include "../includes/fun.inc.php";
$dirs = __DIR__;
include $dirs."/assist/Deal/Classes/PHPExcel/IOFactory.php";


    $file = $_FILES['class'];
	$type = explode(".",$file['name']);

	if($type[1] == "xls" || $type[1] == "xlsx"){

        $tmpname = $file['tmp_name'];  //文件临时存储路径名
        $date = date("Ymdhis");

        $str = stristr($file['name'],'.' );
        $file['name'] = $date.$str;
        $path = "C:/wamp64/www/study/Admin/system/upload/".$file['name'];


        if(is_uploaded_file($tmpname)){  //临时文件存在
            $mvd = move_uploaded_file($tmpname,$path); //移动到自定义的位置
            if(!$mvd){
                skip("./system/depart_info.php","上传失败，文件转存过程出错");
                exit(500);
            }else{

                $con->query("set names utf8");//如果将本条语句放置在下一条之后乱码；
                $fileName = $path;
                if (!file_exists($fileName)) {
                    return "文件不存在！";
                }


// 载入当前文件

                $phpExcel = PHPExcel_IOFactory::load($fileName);

// 获取表格数量

                $sheetCount = $phpExcel->getSheetCount();

                for($i = 0;$i<$sheetCount;$i++){
                    $data = $phpExcel->getSheet($i)->toArray();//读取每个sheet中的数据全部加载到一个数组中
                }
                for($i = 0;$i < count($data);$i++){
                    $arr = array(
                        'cla_code'=>$data[$i][0],
                        'cla_name'=>$data[$i][1],
                        'cla_briefName'=>$data[$i][2],
                        'cla_term'=>$data[$i][3],
                        'cla_depart'=>$data[$i][4],
                        'cla_profess'=>$data[$i][5],
                        'cla_proCode'=>$data[$i][6]
                    );
                    $rows = insert_db("off_class",$arr);

                }

                if($rows > 0){
                    skip("system/class_info.php","班级信息导入成功");
                }else{
                    skip("system/class_info.php","班级信息导入失败");
                }


            }
        }
    }else{
        skip("./system/Add/addClass.php","请上传Excel文件");
        exit();
    }














?>