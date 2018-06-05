<?php


namespace App\Http\Controllers;

require_once  '../vendor/autoload.php';
use Illuminate\Http\Request;

use PDF;
//

class HomeController extends Controller

{

    public function downloadPDF()

    {

    	$pdf = PDF::loadView('pdfView');

		return $pdf->download('invoice.pdf');

    }
    
    public function ViewPDF()
    {
        $mpdf = new \Mpdf\Mpdf();

        $mpdf->Bookmark('Start of the document');
        $mpdf->WriteHTML(view('pdfView'));
        
        $mpdf->Output();

    }

    public function MergePDF()
    {
        $pdf = new LynX39\LaraPdfMerger\PdfManage;

        $pdf->addPDF('samplepdfs/one.pdf', '1, 3, 4');
        $pdf->addPDF('samplepdfs/two.pdf', '1-2');
        $pdf->addPDF('samplepdfs/three.pdf', 'all');

        //You can optionally specify a different orientation for each PDF
        $pdf->addPDF('samplepdfs/one.pdf', '1, 3, 4', 'L');
        $pdf->addPDF('samplepdfs/two.pdf', '1-2', 'P');

        $pdf->merge('file', 'samplepdfs/TEST2.pdf', 'P');
    }
}

?>