<?php

namespace App\Http\Controllers\Patient;

use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{
    //

    public function index()
    {
        $page_title = 'My Invoices';
        $patientId = Patient::where('user_id', auth()->user()->id)->first()->id;

        $invoices = Invoice::where('patient_id', $patientId)
            ->with('appointment')
            ->get();

        return view('patient.invoices', [
            'page_title' => $page_title,
            'invoices' => $invoices,
        ]);
    }

}
