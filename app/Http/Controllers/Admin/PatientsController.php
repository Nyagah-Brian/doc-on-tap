<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index()
    {
        $page_title = 'Patients';

        return view('admin.patients', [
            'page_title' => $page_title,
        ]);
    }
}
