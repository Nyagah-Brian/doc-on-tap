<?php

namespace App\Http\Controllers\Patient;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientAppointmentsController extends Controller
{
    public function index()
    {
        $page_title = 'My Appointments';

        $patientId = Patient::where('user_id', auth()->user()->id)->first()->id;

        $appointments = Appointment::where('patient_id', $patientId)
            ->with('doctor')
            ->get();

        return view('patient.appointments', [
            'page_title' => $page_title,
            'appointments' => $appointments,
        ]);
    }
}
