<?php
require __DIR__.'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

function dd($dump_and_die)
{
    die(print_r($dump_and_die));
}

function methods($instance)
{
    $methods = get_class_methods($instance); asort($methods); $methods = array_values($methods);
    return $methods;
}

function isValidColumn(array $row_data, array $required_columns)
{
    $all_valid = [];
    foreach ($row_data as $k => $col)
    {
        if(in_array($k, array_values($required_columns)) && !empty($col))
            $all_valid[] = $k;
    }

    return (count($all_valid) === count($required_columns)) ? true : false;
}

// $inputFileName = 'files/1000.xlsx';
$inputFileName = 'files/produtos.xlsx';

/**  Identify the type of $inputFileName  **/
$inputFileType = IOFactory::identify($inputFileName); // $inputFileType = 'Xlsx';


/**  Create a new Reader of the type defined in $inputFileType  **/
$reader = IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell data  **/
$reader->setReadDataOnly(true);
/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet    = $reader->load($inputFileName);
$init_sheet     = $spreadsheet->getSheetByName('produtos');

if($init_sheet)
{
    $sheet = $init_sheet->rangeToArray(
        'A2:R20',
        NULL,
        true,
        true,
        true
    );
    
    # INICIO CORRETO
    
    $required_columns = [
        'A',
        'B',
    ];
    
    foreach($sheet as $_row)
    {
        $is_valid = isValidColumn($_row, $required_columns);
    
        if($is_valid)
            print_r($_row);
    }
    
    dd(gettype($sheet));
}
