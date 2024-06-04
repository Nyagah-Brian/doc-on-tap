<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    //

    public function index()
    {
        $page_title = 'My Invoices';

        return view('patient.invoices', [
            'page_title' => $page_title,
        ]);
    }
}
