<?php
	header("Content-Type:text/html;charset=utf-8");
	
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	
	
$dirs = __DIR__;
include $dirs.'/Classes/PHPExcel.php';
$result = select_db("off_student","*","stu_class='{$_GET['code']}'");
$objExcel = new PHPExcel();
$objSheet = $objExcel->getActiveSheet();
$objSheet->setTitle('班级学生表');
$objSheet->setCellValue('A1', '学号')->setCellValue('B1', '姓名')->setCellValue('C1', '性别')->setCellValue('D1', '民族')->setCellValue('E1', '身份证号')->setCellValue('F1', '状态')->setCellValue('G1', '学籍')->setCellValue('H1', '班级')->setCellValue('I1', '系部')->setCellValue('J1', '专业')->setCellValue('K1', '地址');
$index = 1;
while ($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

 
 
for($i=ord("A");$i <= ord("K");$i++){
 $objSheet->getStyle(chr($i))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objSheet->getStyle(chr($i))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objSheet->getStyle(chr($i)."1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objSheet->getStyle(chr($i)."1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
 $objSheet->getColumnDimension(chr($i))->setAutoSize(true);
}

 
 
foreach ($arr as $value) {
		$index++;
		
        $objSheet->setCellValue('A'.$index,$value['stu_num'])->setCellValue('B'.$index,$value['stu_name'])->setCellValue('C'.$index,$value['stu_sex'])->setCellValue('D'.$index,$value['stu_nation'])->setCellValue('E'.$index,$value['stu_cardNum'])->setCellValue('F'.$index,$value['stu_state'])->setCellValue('G'.$index,$value['stu_depState'])->setCellValue('H'.$index,$value['stu_class'])->setCellValue('I'.$index,$value['stu_depart'])->setCellValue('J'.$index,$value['stu_major'])->setCellValue('K'.$index,$value['stu_home']);
                
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
browser_export('Excel2007', '班级学生表.xlsx');
ob_end_clean();
$objWriter->save("php://output");
