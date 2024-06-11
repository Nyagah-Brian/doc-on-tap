<?php

namespace App\Http\Controllers\Patient;

use App\Models\Invoice;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;

class PatientDashboard extends Controller
{
    // Loads Patient Dashboard

    public function index()
    {
        $page_title = 'Dashboard';
        $patientId = Patient::where('user_id', auth()->user()->id)->first()->id; // Get logged-in user's patient ID

        // Retrieve the patient's appointments, invoices, and records
        $appointments = Appointment::where('patient_id', $patientId)
            ->with('doctor')
            ->get();

        $invoices = Invoice::where('patient_id', $patientId)
            ->with('appointment')
            ->get();

        return view('patient.dashboard', [
            'page_title' => $page_title,
            'appointments' => $appointments,
            'invoices' => $invoices,
        ]);
    }
}
