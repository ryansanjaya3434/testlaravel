<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comp;
use PDF;

class PdfController extends Controller
{
    

    public function generatePDF()
    {
        $company = Comp::all();
        $pdf = PDF::loadView('company.data',compact('company'));    
        return $pdf->download('demo.pdf');
    }
    
}
