<?php

require_once __DIR__ . '/vendor/autoload.php';

$invoice_nos = ['0' => 'ISE-00000014Y18', '1' => 'ISE-00000005Y18'];
$mpdf = new \mPDF('utf-8', 'A4', '', '', 5, 5, 36, 10, 5, 4);

foreach ($invoice_nos as $key => $invoice_no) {
    $html = 'Invoice No - ' . $invoice_no;
    $mpdf->WriteHTML($html, 2);
    $mpdf->WriteHTML('<pagebreak>');
}

$pdf_file_name = $invoice_no . 'invoices.pdf';
$mpdf->Output($pdf_file_name, 'f');

?>