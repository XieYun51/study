<?php
	
	header("Content-Type:text/html;charset=utf-8");
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	include '../../assist/Deal/Classes/PHPExcel.php';
	if(@$_SESSION['auth'] != 2){
	skip("../../../index.php","非法访问，你的攻击行为已经被记录");	
}
	$data = explode("@",$_GET['dat']);
	

$result = select_db("off_score","sco_stuCode,sco_stuScore","sco_class='{$data[0]}' and sco_term='{$data[2]}' and sco_course='{$data[1]}'");
$objExcel = new PHPExcel();
$objSheet = $objExcel->getActiveSheet();
$objSheet->setTitle('班级学生成绩表');

$objSheet->setCellValue('A1', '姓名')->setCellValue('B1', '学号')->setCellValue('C1', '课程')->setCellValue('D1', '成绩');
$index = 1;
while ($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}
// 先获取字符串的长度
for($i=ord("A");$i <= ord("D");$i++){
 $objSheet->getStyle(chr($i))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objSheet->getStyle(chr($i))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objSheet->getStyle(chr($i)."1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objSheet->getStyle(chr($i)."1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objSheet->getColumnDimension(chr($i))->setAutoSize(true);
}

foreach ($arr as $value) {
		$index++;
		$name = select_db("off_student","stu_name","stu_num='{$value['sco_stuCode']}'");
		$res_name = mysqli_fetch_array($name);

        $objSheet->setCellValue('A'.$index,$res_name['stu_name'])->setCellValue('B'.$index,$value['sco_stuCode'])->setCellValue('C'.$index,$data[3])->setCellValue('D'.$index,$value['sco_stuScore']);
        
}
function browser_export($type, $filename){    
    if ($type == 'Excel3') {
        header('Content-Type:application/vnd.ms-excel');    
    } else{
     header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    
     }
    header('Content-Disposition:attachment;filename="'.$filename.'"');
    header('Cache-Control:max-age=0');    
    }
//按照指定格式生产Excel文件

$objWriter = PHPExcel_IOFactory::createWriter($objExcel,'Excel2007');
browser_export('Excel2007', '班级学生成绩表.xlsx');
ob_end_clean();
$objWriter->save("php://output");

	
	
	
?>