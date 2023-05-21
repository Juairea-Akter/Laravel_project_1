<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generate_invoice($id,$value)
    {
        $payment = payment::find($id);
        $pdf = Pdf::loadView('billing_invoice', compact('payment', 'value'));
        return $pdf->stream('billing-invoice');
    }

    // public function download_invoice()
    // {
    //     $data = 'makeup';
    //     $pdf = Pdf::loadView('billing_invoice', compact('data'));
    //     return $pdf->download('billing-invoice.pdf');
    // }
}
