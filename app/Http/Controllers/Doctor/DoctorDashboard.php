<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
