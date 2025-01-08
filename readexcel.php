<?php
require 'vendor/autoload.php';
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("vendor/excel.XLSX");

$worksheet = $spreadsheet->getActiveSheet();
echo '<table>' . PHP_EOL;
foreach ($worksheet->getRowIterator() as $row) {
    echo '<tr>' . PHP_EOL;
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                                                       //    even if a cell value is not set.
                                                       // For 'TRUE', we loop through cells
                                                       //    only when their value is set.
                                                       // If this method is not called,
                                                       //    the default value is 'false'.
    foreach ($cellIterator as $cell) {
        echo '<td>' .
             $cell->getValue() .
             '</td>' . PHP_EOL;
    }
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;
?>