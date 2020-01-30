<?php
	header("Content-Type:text/html;charset=utf-8");
	
	include "../../../includes/db.info.php";
	include "../../../includes/db.inc.php";
	include "../../../includes/fun.inc.php";
	if(@$_SESSION['auth'] != 2){
	skip("../../../index.php","非法访问，你的攻击行为已经被记录");	
}
	
	

include '../../assist/Deal/Classes/PHPExcel.php';
$result = select_db("off_student","stu_num,stu_name","stu_class='{$_GET['code']}'");
$objExcel = new PHPExcel();
$objSheet = $objExcel->getActiveSheet();
$objSheet->setTitle('班级学生表');
$objSheet->setCellValue('A1', '学号')->setCellValue('B1', '姓名');
$index = 1;
while ($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

for($i=ord("A");$i <= ord("B");$i++){
 $objSheet->getStyle(chr($i))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objSheet->getStyle(chr($i))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objSheet->getStyle(chr($i)."1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 $objSheet->getStyle(chr($i)."1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objSheet->getColumnDimension(chr($i))->setAutoSize(true);
}

foreach ($arr as $value) {
		$index++;
		
        $objSheet->setCellValue('A'.$index,$value['stu_num'])->setCellValue('B'.$index,$value['stu_name']);
        
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
