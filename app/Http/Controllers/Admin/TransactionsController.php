<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionsController extends Controller
{
    public function index()
    {
        $page_title = 'Transactions';

        // Retrieve all invoices with eager loading for associated models
        $invoices = Invoice::with('patient', 'appointment')->get();

        return view('admin.transactions', [
            'page_title' => $page_title,
            'invoices' => $invoices,
        ]);
    }
}
