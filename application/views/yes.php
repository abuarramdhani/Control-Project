public function cetak(){
	// 	$this->load->helper('url');
	// 	$this->load->model('pagemodel');
 //        $ambildata = $this->pagemodel->getAll();

 //        if(count($ambildata)>0){
 //            $objPHPExcel = new PHPExcel();
 //            // Set properties
 //            $objPHPExcel->getProperties()
 //            			->setCreator("PT. TBS") //creator
 //            			->setTitle("CONTROL OF ACTIVITY");  //file title
 
 //            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
 //            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
 //            $objget->setTitle('Sample Sheet'); //sheet title
             
 //            $objget->getStyle("A1:V1")->applyFromArray(
 //                array(
 //                    'fill' => array(
 //                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
 //                        'color' => array('rgb' => '92d050')
 //                    ),
 //                    'font' => array(
 //                        'color' => array('rgb' => '000000')
 //                    )
 //                )
 //            );
 
 //            //table header
 //            $cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T");
             
 //            $val = array("Instruction Memorium Order (IMO)","No. Container","Stuffing Date", "Delivery From JKT", "Dest Town", "Vessel Name", "Arv At Dest", "Unload At Conc", " ", "Name Cust", "Invoice Cust", " ", "Invoice Agen", "Payment Agen", "Rental Genset", "Invoice Genset", "Payment Genset", "Invoice Ship", "Payment Ship", " "  );
             
 //            for ($a=0;$a<26; $a++) 
 //            {
 //                $objset->setCellValue($cols[$a].'1', $val[$a]);
    
 //                //Setting lebar cell
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
 //             	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // NAMA
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // ALAMAT
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // NAMA
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // ALAMAT
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Kontak
 //             	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25); // NAMA
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // ALAMAT
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25); // Kontak
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25); // NAMA
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25); // ALAMAT
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25); // Kontak
 //             	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25); // NAMA
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25); // ALAMAT
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25); // Kontak
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25); // NAMA
 //                $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25); // ALAMAT
 //              //   $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25); // Kontak
 //             	// $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25); // NAMA

 //                $style = array(
 //                    'alignment' => array(
 //                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
 //                    )
 //                );
 //                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
 //            }
             
 //            $baris  = 2;
 //            foreach ($ambildata as $frow){
                
 //                //pemanggilan sesuaikan dengan nama kolom tabel
 //                $objset->setCellValue("A".$baris, $frow->IMO ); //membaca data nama
 //                $objset->setCellValue("B".$baris, $frow->no_container); //membaca data alamat
 //                $objset->setCellValue("C".$baris, $frow->stuff_date); //membaca data kontak
 //                $objset->setCellValue("D".$baris, $frow->deliv_date); //membaca data nama
 //                $objset->setCellValue("E".$baris, $frow->dest_town); //membaca data alamat
 //                $objset->setCellValue("F".$baris, $frow->vessel_name); //membaca data kontak
 //                $objset->setCellValue("G".$baris, $frow->arv_at_dest); //membaca data nama
	// 			$objset->setCellValue("H".$baris, $frow->unload_at_conc); //membaca data alamat
	// 			$objset->setCellValue("I".$baris, null); //membaca data kontak

 //                $objset->setCellValue("J".$baris, $frow->name_cust); //membaca data kontak
 //                $objset->setCellValue("K".$baris, $frow->inv_cust); //membaca data nama
 //                $objset->setCellValue("L".$baris, null); //membaca data alamat

 //                $objset->setCellValue("M".$baris, $frow->inv_agen); //membaca data kontak
 //                $objset->setCellValue("N".$baris, $frow->pay_agen); //membaca data nama
                
 //                $objset->setCellValue("O".$baris, $frow->rent_genset); //membaca data nama
 //                $objset->setCellValue("P".$baris, $frow->inv_genset); //membaca data alamat
 //                $objset->setCellValue("Q".$baris, $frow->pay_genset); //membaca data kontak

 //                $objset->setCellValue("R".$baris, $frow->inv_ship); //membaca data alamat
 //                $objset->setCellValue("S".$baris, $frow->pay_ship); //membaca data kontak
 //                $objset->setCellValue("T".$baris, null); //membaca data alamat
		
 //                //Set number value
 //                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
 //                $baris++;
 //            }
             
 //            $objPHPExcel->getActiveSheet()->setTitle('Data Export');
 
 //            $objPHPExcel->setActiveSheetIndex(0);  
 //            $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");
               
 //              header('Content-Type: application/vnd.ms-excel'); //mime type
 //              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 //              header('Cache-Control: max-age=0'); //no cache
 
 //            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
 //            $objWriter->save('php://output');
 //        }else{
 //            redirect('Excel');
 //        }
 //    }
