<?php
error_reporting(0);
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/*$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header('Content-Disposition: attachment; filename="file.xls"');

// Write file to the browser
$objWriter->save('php://output');
exit;
*/

try {
        $filename = 'sample.xlsx';

        ob_clean();
        header( 'Pragma: public' );
        header( 'Expires: 0' );
        header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
        header( 'Cache-Control: private', false );
        header( 'Content-Type: application/vnd.ms-excel' );
        header( 'Content-Disposition: attachment;filename=' . $filename );

        $spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
	//	$sheet->setCellValue->SetCellValue('A1', "WESTPORTS MALAYSIA");
		/*$sheet->setCellValue->SetCellValue('A2', "Export Booking List Report	08/01/2021 13:10:40");		 
		$sheet->setCellValue->SetCellValue('B2', "08/01/2021 13:10:40");
		$sheet->setCellValue->SetCellValue('A3', "Line Code:");
		$sheet->setCellValue->SetCellValue('B3', "CMA");
		$sheet->setCellValue->SetCellValue('C3', "TS/Local");
		$sheet->setCellValue->SetCellValue('D3', "LOCAL");
		$sheet->setCellValue->SetCellValue('A4', "Vessel Name:");
		$sheet->setCellValue->SetCellValue('B4', "EDI TEST");
		$sheet->setCellValue->SetCellValue('C4', "Voyage/SCN/Opr:");
		$sheet->setCellValue->SetCellValue('D4', "T3/INND/EMC	");
		$sheet->setCellValue->SetCellValue('A5', "ETA:");
		$sheet->setCellValue->SetCellValue('B5', "31/12/2021 12:00:00	");
		$sheet->setCellValue->SetCellValue('C5', "Enquire By:");
		$sheet->setCellValue->SetCellValue('D5', "BOX	");
*/
		$sheet->setCellValue('A1', 'WESTPORTS MALAYSIA');
		$sheet->setCellValue('A2', 'Export Booking List Report	08/01/2021 13:10:40');		
		$sheet->setCellValue('B2', "08/01/2021 13:10:40");
		$sheet->setCellValue('A3', "Line Code:");
		$sheet->setCellValue('B3', "CMA");
		$sheet->setCellValue('C3', "TS/Local");
		$sheet->setCellValue('D3', "LOCAL");
		$sheet->setCellValue('A4', "Vessel Name:");
		$sheet->setCellValue('B4', "EDI TEST");
		$sheet->setCellValue('C4', "Voyage/SCN/Opr:");
		$sheet->setCellValue('D4', "T3/INND/EMC	");
		$sheet->setCellValue('A5', "ETA:");
		$sheet->setCellValue('B5', "31/12/2021 12:00:00	");
		$sheet->setCellValue('C5', "Enquire By:");
		$sheet->setCellValue('D5', "BOX	");		
		
		$Header2=array("A", "B", "C", "D", "E","F","G", "H", "I", "J", "K", "L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB");	
		$row = array (
			array("Order Reference","Container No","Box Opr","F/E","FCL/LCL",	"SPOD",	"POD:",	"ISO",	"LG",	"HG",	"Type",	"TS","Commodity",	"Gross Weight"	,"DG",	"Temp",	"OperationReefer",	"OOG",	"StorageIndicator",	"POL",	"In Date","Out Date",	"Yard Location",	"Custom Block",	"Remarks",	"SEAL No.",	"BL Number",	"Slot Owner"),
			array("BKG-BKG28",	"TDST99999","CMA","F",	"FCL","AUMEL","AUMEL",	"45G1",	"40",	"9.6",	"DV",	"N",	"WADDING",	"4000",	"/","","N","","TT",	"MYPKG",	"",	"",	"",	"",	"",	"",	"",	""),
			array("BKG-BKG28",	"TEST11111110","CMA","F","FCL","AUADL","AUBNE",	"2010",	"20",	"8",	"DV",	"N",	"TEST",	"20000",	"/","","N","","AL",	"MYPKG",	"",	"",	"",	"",	"",	"",	"",	""),
			array("BKG-BKG28","","CMA","F","FCL","AUBNE","AUBNE","2010","20","8","DV",	"N","DSS","20000","/","","N","","UB","MYPKG","","","","","","","",""),					
			array("BKG-BTLBOOKING","TEST1234567",	"CMA","F","FCL","AUSYD","AUFRE","2010",	"20","8","DV","N",	"4124213","20000","/","","","","","MYPKG","","","","","","","","CMA"),
			array("BKG-BTLBOOKING","","CMA","F","FCL","AUSYD","AUFRE","2010","20","8","DV","N","4124213","20000","/","","","","","MYPKG","","","","","","","","CMA"),		
			array("BKG-BTLBOOKING","","CMA","F","FCL","AUSYD","AUFRE","2010","20","8","DV","N","4124213","20000","/","","","","","MYPKG","","","","","","","","CMA"),
			array("BKG-BTLBOOKING","","CMA","F","FCL","AUSYD","AUFRE","2010","20","8","DV","N","4124213","20000","/","","","","","MYPKG","","","","","","","","CMA"),
			array("BKG-BTLBOOKING","","CMA","F","FCL","AUSYD","AUFRE","2010","20","8","DV","N","4124213","20000","/","","","","","MYPKG","","","","","","","","CMA"),						
			array("BKG-DILIPTEST","DILI9993333","CMA","F","FCL","AUMEL","AUMEL","22P3","20","8.6","FR","N	","123456789","20000","/","","","OH/20","","MYPKG","","","","","TBTAS","","",""		),
			array("BKG-DILIPTEST","DILI1234560","CMA","F","FCL","AUADL","AUBNE","2210","20","8.6","DV","N","789","20000","/","","N","","TT","MYPKG","","","","","","","",""),
			array("BKG-DILIPTEST","DILI1234561","CMA","F","FCL","AUADL","AUBNE","2210","20","8.6","DV","N","1234","20000","/","","N","","UB","MYPKG","","","","","","","",""),
			array("BKG-DILIPTEST","DILI1234562","CMA","F","FCL","AUFRE","AUSYD","2210","20","8.6","DV","N","123","20000","/","","N","","TT","MYPKG","","","","","","","",""),
			array("BKG-DILIPTEST","DILI1234563","CMA","F","FCL","AUADL","AUFRE","2210","20","8.6","DV","N","1234","20000","/","","N","","AL","MYPKG","","","","","","","",""),
			array("BKG-DILIPTEST","DILI1234564","CMA","F","FCL","AUADL","AUFRE","2210","20","8.6","DV","N","GENERAL","20000","/","","N","","VB","MYPKG","","","","","","","",""),
			array("BKG-DILIPTEST","DILI1234567","CMA","F","FCL","AUADL","AUFRE","2210","20","8.6","DV","N","GENERAL","20000","/","","N","","TT","MYPKG","","","","","","","",""),
			array("BKG-DILIPTEST","DILI1234567","CMA","F","FCL","AUADL","AUFRE","2210","20","8.6","DV","N","GENERAL","20000","/","","N","","TT","MYPKG","","","","","","","",""),
			array("BKG-GAJ01","","CMA","F","FCL","AUFRE","CNSJQ","2201","20","8.6","SD","N","JKLLLKJHJKL","20000","/","","","","","MYPKG","","","","","","","",""),
			array("BKG-GAJ01","","CMA","F","FCL","AUFRE","CNSJQ","2201","20","8.6","SD","N","JKLLLKJHJKL","20000","/","","","","","MYPKG","","","","","","","",""),
			array("BKG-GAJ01","","CMA","F","FCL","AUFRE","CNSJQ","2201","20","8.6","SD","N","JKLLLKJHJKL","20000","/","","","","","MYPKG","","","","","","","",""),
			array("BKG-GAJ01","","CMA","F","FCL","AUFRE","CNSJQ","2201","20","8.6","SD","N","JKLLLKJHJKL","20000","/","","","","","MYPKG","","","","","","","",""),
			array("BKG-INTERFACE","INTF1000001","CMA","F","FCL","AUBNE","AUFRE","2010","20","8","DV","N","SD","20000","/","","","","","MYPKG","","","","","","","",""	),
			array("BKG-INTERFACE","INTF1000002","CMA","F","FCL","AUBNE","AUFRE","2010","20","8","DV","N","SD","20000","/","","","","","MYPKG","","","","","","","",""	),
			array("BKG-INTERFACE","INTF1000003","CMA","F","FCL","AUBNE","AUFRE","2010","20","8","DV","N","SD","20000","/","","","","","MYPKG","","","","","","","",""	),
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),								
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),								
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),								
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),								
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),								
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),								
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),								
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),								
			array("MTI-MTBTL","","CMA","E","","AUADL","AUADL","2010","20","8","DV","N","","1500","/","","","","","MYPKG","","","","","","","",""	),		
			array("BKG-SDASDASDA","","CMA","F","FCL","AUMEL","AUMEL","22R1","20","8.6","RE","N","23213213","24000","/","","N","","","MYPKG","","","","","","","",""	),					
			array("BKG-TES3001","WEST9003000","CMA","F","FCL","SGSIN","SGSIN","22U1","20","8.6","OT","N","","2490","/","","N","","","MYPKG","","","","","","","",""	),
			array("BKG-TESTBKGCMA90","MTIU9090901","CMA","F","FCL","AUMEL","AUMEL","22G1","20","8.6","DV","N","","13147","/","","N","","","MYPKG","","","","","","S,S33322","",""	),
			array("BKG-TESTSEQ","","CMA","F","FCL","AUADL","AUADL","22G1","20","8.6","DV","N","TEST","20000","/","","","","","MYPKG","","","","","","","",""	),					
			array("BKG-TESTSEQ","","CMA","F","FCL","AUADL","AUADL","22G1","20","8.6","DV","N","TEST","20000","/","","","","","MYPKG","","","","","","","",""	),					
			array("BKG-TESTSEQ","","CMA","F","FCL","AUADL","AUADL","22G1","20","8.6","DV","N","TEST","20000","/","","","","","MYPKG","","","","","","","",""	),					
			array("BKG-TESTSEQ","","CMA","F","FCL","AUADL","AUADL","22G1","20","8.6","DV","N","TEST","20000","/","","","","","MYPKG","","","","","","","",""	),					
			array("BKG-TESTTT","","CMA","F","FCL","AUMEL","AUMEL","22G1","20","8.6","DV","N","GN","20000","/","","","","","MYPKG","","","","","","","",""	),									


);
		//$row=array("UMAR", "B", "C", "D", "E","F","G", "H", "I", "J", "K", "L");	
	
$z= 0;
$i = 9;
		for($j=0; $j<sizeof($row); $j++) {		
			
			$size = sizeof($row[$z]);
			error_log("size".$size);
			for($k=0;$k<$size;$k++) {
				
					//$objPHPExcel->getActiveSheet()->getStyle($Header2[$k]."9")->applyFromArray($styleArray);
					//$objPHPExcel->getActiveSheet()->getStyle($Header2[$k]."9")->applyFromArray($styleArray2);	
				
					
				$sheet->setCellValue($Header2[$k]."$i",$row[$z][$k]);
				
			}
			$i++;
			
			//$objPHPExcel->getActiveSheet()->getStyle($Header2[$j]."$i")->applyFromArray($styleArray);
			//$objPHPExcel->getActiveSheet()->getStyle($Header2[$j]."$i")->applyFromArray($styleArray2);	
			
			$z++;
		}

			
			


		ob_clean();
	
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
        ob_flush();
exit;
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
    
			print_r( $e);
			error_log($e);
		}

?>