<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        $page_title = 'Appointments';

        return view('admin.appointments', [
            'page_title' => $page_title,
        ]);
    }
}
