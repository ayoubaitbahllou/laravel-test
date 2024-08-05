<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    
    /**
                 * SAVE PDF
     */
    public function index(Request $request)
    {
        $val = $request->input('editorVal');
        $pdf = Pdf::loadView('pdf.index', ["value" => $val]);

        $filePath = '/public/my_file.pdf';
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        // 
        $pdf->setWarnings(false)->save("my_file.pdf");
    }
}
