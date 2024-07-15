<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorDashboard extends Controller
{
    //

    public function index()
    {
        $page_title = 'Doctor Dashboard';

        return view('doctor.dashboard', [
            'page_title' => $page_title,
        ]);
    }
}
