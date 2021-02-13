<?php
/*
 *  composer require spatie/simple-excel 
 * 
 *  phpoffice/phpspreadsheet ~> complicada
 *  spatie/simple-excel ~> Fácil e bom desempenho +/- 1000 linhas por segundo
 * 
 */

echo "<script>console.time('loading');</script>";

require 'vendor/autoload.php';

use Spatie\SimpleExcel\SimpleExcelReader;
 
$file = __DIR__ . '/files/1000.xlsx';

$rows = SimpleExcelReader::create($file,'xlsx')->getRows();
 
echo "<table border='1px'>"; 
    echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Usuario</th>";
        echo "<th>E-mail</th>";
        echo "<th>Senha</th>";
        echo "<th>Random</th>";
    echo "</tr>";

$rows->each(function(array $rowProperties) {

    //funções só pra gastar processamento
    $randon = $rowProperties['Random'] * 2 / 99 * 666 + 654 -9 *777 * 999 * 888 / 12548 * 9 * 9 * 9 * 8 / 8 / 8 / 8 * 9 * 8 / 856 / 1542 ;
    $randon_old = $randon;
    $randon = md5(sha1(md5(sha1(md5(sha1(md5(sha1(md5(sha1($randon))))))))));
    $randon = number_format($randon_old,0 ). '  <=|§|=>  ' . md5(base64_encode(md5(base64_encode($randon))));
    $randon = strlen($randon) . '_' . $randon;
    //fim funções só pra gastar processamento

    echo "<tr>";
        echo "<td>" . $rowProperties['Id'] . "</td>";
        echo "<td>" . $rowProperties['Usuario'] . "</td>";
        echo "<td>" . $rowProperties['E-mail'] . "</td>";
        echo "<td>" . $rowProperties['Senha'] . "</td>";
        echo "<td>" . $randon . "</td>";
    echo "</tr>";
   
});

echo "</table>";

echo "<script>console.timeEnd('loading');</script>";