 <?php
 require 'vendor/autoload.php';
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
 error_reporting(0);
 
$excel_readers = array(
    'Excel5' , 
    'Excel2003XML' , 
    'Excel2007'
);
 move_uploaded_file($_FILES['file']['tmp_name'],  $_FILES['file']['name']);

$pathname= $_FILES['file']['name'];
error_log("pathnamennnnnnnnn".$pathname);
//$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($pathname);
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

$reader->setReadDataOnly(false);

if(file_exists($pathname)) {
	error_log("true");
	rename($pathname, $pathname.rand(0,1000000).'xlsx');
}


        $spreadsheet = new Spreadsheet();
$spreadsheet = $reader->load($pathname);
$loadedSheetNames = $spreadsheet->getSheetNames();

if(file_exists('data.csv')) {
	rename('data.csv', 'data'.rand(0,1000000).'csv');
}

$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
$writer->save("data.csv");

//$spreadsheet->setUseBOM(true);

foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
   // $objWriter ->setSheetIndex($sheetIndex);
    //$objWriter ->save($loadedSheetName.'.csv');
}

$open = fopen("data.csv", "r");
$data = fgetcsv($open, 1000, ",");
$readed_file = "";
$row = 1;
 $allRows = array();
 $csv = array();
$lines = file('data.csv', FILE_IGNORE_NEW_LINES);

foreach ($lines as $key => $value)
{
    $csv[$key] = str_getcsv($value,"\n");
	array_push($allRows, $csv[$key]);
	//print_r($allRows);
	//echo ($allRows);
}


$line = 0;
$contcount = 0;
$recv_code = $_POST['recv_code'];
error_log($_POST['call_sign_code']);
error_log($_POST['recv_code']);
$refno = date("YmdHms");
//echo($refno);

//get_date_str(dt, "daterawonly")+":"+get_date_str(dt, "timetominrawonly")
$edi = "UNB+UNOA:2+KMT+".$recv_code."+".date('Ymd').":".date('hm')."+".$refno."<br/>";
 $edi .= "UNH+".$refno."+COPRAR:D:00B:UN:SMDG21+LOADINGCOPRAR'<br/>"; $line++;
                                

$line++;
//echo($edi);               
   //process header
 $report_dt = ""; $voyage = ""; $vslname = ""; $callsign = ""; $opr = "";
			//	print_r($allRows[10][0] );
			
                for ($singleRow = 0; $singleRow < sizeof($allRows); $singleRow++) {
                 
                    $rowCells = explode(",",$allRows[$singleRow]) ;
					
                    if($singleRow==1) {
						
					//	echo "comeins";
                        $dat_split = explode(",",$allRows[1][0]);
					//	 print_r( $dat_split[1]);
						$tmpdt = explode("/",$dat_split[1]);
                      
						$day = $tmpdt[0];
						//echo  $day ;
                        $month = $tmpdt[1];
					//	echo  $month ;
                        $tmpyear = explode(" ",$tmpdt[2]);
						//echo $tmpyear[0];
                        $report_dt = $tmpyear[0]."-".$month."-".$day." ".$tmpyear[1];
						//$report_dt = date_format($report_date,"Y-");
                        //error_log("report datexxxx".	$report_dt);
                    }
                    if($singleRow==3) {
					
                        if(gettype($allRows[$singleRow][0])!="undefined") {
                            // print_r($allRows[$singleRow][0]);
							$thirdrow =explode(",",$allRows[$singleRow][0]);
							$thirdrow_split =explode("/",$thirdrow[0]);
							 $voyage = $$thirdrow_split[0];
                            $callsign = $$thirdrow_split[1];
                            $opr = $$thirdrow_split[2];
                            $vslname = $thirdrow[1];
							error_log( $vslname);
                        }
                    }
		  $edi .= "BGM+45+".$report_dt."+5'<br/>"; $line++;
          $edi .= "TDT+20+".$voyage."+1++172:".$opr."+++".$_POST['call_sign_code'].":103::".$vslname."'<br/>"; $line++;
          $edi .= "RFF+VON:".$voyage."'<br/>"; $line++;
          $edi .= "NAD+CA+".$opr."'<br/>"; $line++;
		  
                }             
				
		   $tmp = "";$dim = "";
                   for ($singleRow = 0; $singleRow < sizeof($allRows); $singleRow++) {
                  if(gettype($allRows[$singleRow])!="undefined") {
					if($singleRow>9) {
						  $rowCells = explode(",",$allRows[$singleRow][0]);
						  // print_r( $rowCells);
                        $contcount++;
                     //  echo  $rowCells [3];
                        $fe = "5";
                        if(gettype($rowCells[3])!="undefined" && $rowCells[3]=="E") 
							$fe = "4";
                        //2 TS - N, 6 TS - Y
                        $type = "2";						         
                        if(gettype($rowCells[11])!="undefined" && $rowCells[11]=="Y") $type = "6";
					    if(gettype($rowCells[1])!="undefined" && gettype($rowCells[7])!="undefined") { 
						$edi .= "EQD+CN+"+$rowCells[1]."+".$rowCells[7].":102:5++".$type."+".$fe+"'\n"; $line++; }
                        if(gettype($rowCells[6])!="undefined") { $edi .= "LOC+11+"+$rowCells[5]+":139:6'\n"; $line++; }
                        if(gettype($rowCells[6])!="undefined") { $edi .= "LOC+7+"+$rowCells[6]+":139:6'\n"; $line++; }
                        if(gettype($rowCells[19])!="undefined") { $edi .= "LOC+9+"+$rowCells[19]+":139:6'\n"; $line++; }
                        if(gettype($rowCells[13])!="undefined") { $edi .= "MEA+AAE+VGM+KGM:"+$rowCells[13]+"'\n"; $line++; }
					if(gettype($rowCells[17])!="undefined" && trim($rowCells[17])!="" && trim($rowCells[17])!="/") {
						   $tmp =  explode(",",$rowCells[17]);
                      // echo "17".$rowCells[17];
						for($i=0; $i<strlen($tmp); $i++) {

                              $dim = explode("/",$rowCells[17]);
						//	    echo "dimo".  $dim[0];
                              if(trim($dim[0])=="OF") {
                                  $edi .= "DIM+5+CMT:".trim($dim[1])+"'<br/>"; $line++;
                              }
                              if(trim($dim[0])=="OB") {
                                  $edi .= "DIM+6+CMT:".trim($dim[1])+"'<br/>"; $line++;
                              }
                              if(trim($dim[0])=="OR") {
                                  $edi .= "DIM+7+CMT::".trim($dim[1])+"'<br/>"; $line++;
                              }
                              if(trim($dim[0])=="OL") {
                                  $edi .= "DIM+8+CMT::".trim($dim[1])+"'<br/>"; $line++;
                              }
                              if(trim($dim[0])=="OH") {
                                  $edi .= "DIM+9+CMT:::".trim($dim[1])+"'<br/>"; $line++;
                              }
                          }
					}
                        
					//	echo $rowCells[15];
						if(gettype($rowCells[15])!="undefined" && trim($rowCells[15])!="" && trim($rowCells[15])!="/") {
                          $temperature = $rowCells[15];
                          $temperature = str_replace(" ", "",$temperature);
                          $temperature =  str_replace("C", "",$temperature);
                          $temperature = str_replace("+", "",$temperature);
                          $edi .= "TMP+2+".$temperature.":CEL'<br/>"; $line++;
                        }
						
						//echo $rowCells[25];						  
					  if(gettype($rowCells[25])!="undefined" && trim($rowCells[25])!="" && trim($rowCells[25])!="/") {
							$tmp = explode(",",$rowCells[25]);
						  if($tmp[0]=="L") {
							  $edi .= "SEL+".$tmp[1]."+CA'<br/>"; $line++; //seal L - CA, S - SH, M - CU
						  }
						  if($tmp[0]=="S") {
							  $edi .= "SEL+".$tmp[1]."+SH'<br/>"; $line++; //seal L - CA, S - SH, M - CU
						  }
						  if($tmp[0]=="M") {
							  $edi .= "SEL+".$tmp[1]."+CU'<br/>"; $line++; //seal L - CA, S - SH, M - CU
						  }
                        }
						//echo $rowCells[8];
						 if(gettype($rowCells[8])!="undefined") { $edi .= "FTX+AAI+++".$rowCells[8]."'<br/>"; $line++; }                      
                        //echo $rowCells[12];
                        if(gettype($rowCells[12])!="undefined" && trim($rowCells[12])!="" && trim($rowCells[12])!="/") {
                          $edi .= "FTX+AAA+++".trim(cleanString($rowCells[12]))."'<br/>"; $line++;
                        }
						//echo $rowCells[18];
                        if(gettype($rowCells[18])!="undefined" && trim($rowCells[18])!="" && trim($rowCells[18])!="/") {
                          $edi .= "FTX+HAN++".$rowCells[18]."'<br/>"; $line++;
                        }
						
						if(gettype($rowCells[14])!="undefined" && $rowCells[14]!="" && trim($rowCells[14])!="/") {
                          $tmp = explode("/",$rowCells[14]); 
                          $edi .= "DGS+IMD+".$tmp[0]."+".$tmp[1]."'<br/>"; $line++;
                        }
                        if(gettype($rowCells[2])!="undefined" && trim($rowCells[2])!="") { $edi .= "NAD+CF+"+$rowCells[2]+":160:ZZZ'\n"; $line++; } //box 
                        
						}                    

						
					// }
                  }
				  }
				  
				$contcount--;
                $edi .= "CNT+16:".$contcount."'<br/>"; $line++; $line++;
                $edi .= "UNT+".$line."+".$refno."'<br/>";
                $edi .= "UNZ+1+".$refno."'";
				
				error_log($edi);
			echo $edi;	
//echo 'File saved to csv format';
 function cleanString($input) {
            $output = "";
			$characterAt = str_split($input);
			
            for ($i=0; $i<(strlen($input)); $i++) {
				
			   if (ord($characterAt[$i]) <= 127) {
                    $output .= $characterAt[$i];
                }
            }
            return $output;
        }
		
		?>