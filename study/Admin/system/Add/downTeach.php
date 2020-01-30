<?php
	header("Content-Type:text/html;charset=utf-8");
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	
	
	
	
include '../../assist/Deal/Classes/PHPExcel.php';
$result = select_db("off_teacher","tea_code,tea_name,tea_sex,tea_cardNum,tea_class,tea_highEdu",null);
$objExcel = new PHPExcel();
$objSheet = $objExcel->getActiveSheet();
$objSheet->setTitle('教师信息表');
$objSheet->setCellValue('A1', '账号')->setCellValue('B1', '姓名')->setCellValue('C1', '性别')->setCellValue('D1', '身份证号')->setCellValue('E1', '教职工类别')->setCellValue('F1', '最高学历');
$index = 1;
while ($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}



for($i=ord("A");$i <= ord("F");$i++){
    $objSheet->getStyle(chr($i))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objSheet->getStyle(chr($i))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objSheet->getStyle(chr($i)."1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objSheet->getStyle(chr($i)."1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objSheet->getColumnDimension(chr($i))->setAutoSize(true);
}



foreach ($arr as $value) {
        $index++;
        $objSheet->setCellValue('A'.$index,$value['tea_code'])->setCellValue('B'.$index,$value['tea_name'])->setCellValue('C'.$index,$value['tea_sex'])->setCellValue('D'.$index,$value['tea_cardNum'])->setCellValue('E'.$index,$value['tea_class'])->setCellValue('F'.$index,$value['tea_highEdu']);

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
browser_export('Excel2007', '教师信息表.xlsx');
ob_end_clean();
$objWriter->save("php://output");

	
?>