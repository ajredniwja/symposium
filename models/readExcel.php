<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    //include excel reader library
    include("reader/Classes/PHPExcel/IOFactory.php");

    //create excel object and load file
    try {
        $objPHPExcel = PHPExcel_IOFactory::load("reader/sample.xls");
    } catch (PHPExcel_Reader_Exception $e) {
    }

    //variable for holding output string
    $output = "";

    //loop over to get file as worksheet
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
    {
        $highestRow = $worksheet->getHighestRow();
        $hCol = $worksheet->getHighestColumn();
        $nCol = ord(strtolower($hCol)) - 96;

        //get every row and column
        for($row=2; $row<=$highestRow; $row++)
        {
            for($col=0; $col<=$nCol; $col++)
            {
                $data = $worksheet->getCellByColumnAndRow($col, $row)->getValue();

                if(!empty($data)) {
                    $output .= $data." | ";
                }
            }
            $output.= "<br>";
        }
    }

    echo $output;