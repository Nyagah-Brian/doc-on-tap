<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientAppointmentsController extends Controller
{
    public function index()
    {
        $page_title = 'My Appointments';

        return view('patient.appointments', [
            'page_title' => $page_title,
        ]);
    }
}
