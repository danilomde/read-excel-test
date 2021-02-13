<?php
//  echo "<script>console.time('loading');</script>";

function dd($dump_and_die)
{
    die(print_r($dump_and_die));
}

require 'vendor/autoload.php';

$inputFileType = 'Xlsx';
// $inputFileName = 'files/1000.xlsx';
$inputFileName = 'files/10.xlsx';

/*
    // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    // $worksheetData = $reader->listWorksheetInfo($inputFileName);

    // echo '<h3>Worksheet Information</h3>';
    // echo '<ol>';
    // foreach ($worksheetData as $worksheet) {
    //     echo '<li>', $worksheet['worksheetName'], '<br />';
    //     echo 'Rows: ', $worksheet['totalRows'],
    //     ' Columns: ', $worksheet['totalColumns'], '<br />';
    //     echo 'Cell Range: A1:',
    //     $worksheet['lastColumnLetter'], $worksheet['totalRows'];
    //     echo '</li>';
    // }
    // echo '</ol>';
*/ 

/**  Create a new Reader of the type defined in $inputFileType  **/
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell data  **/
$reader->setReadDataOnly(true);
/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);

// echo "<pre>";
dd($spreadsheet->getCells());
// echo "</pre>";

// echo "<script>console.timeEnd('loading');</script>";