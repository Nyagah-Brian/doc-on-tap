<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientDashboard extends Controller
{
    // Loads Patient Dashboard

    public function index()
    {
        $page_title = 'Dashboard';

        return view('patient.dashboard', [
            'page_title' => $page_title,
        ]);
    }
}
