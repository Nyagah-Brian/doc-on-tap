<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $page_title = 'Transactions';

        return view('admin.transactions', [
            'page_title' => $page_title,
        ]);
    }
}
