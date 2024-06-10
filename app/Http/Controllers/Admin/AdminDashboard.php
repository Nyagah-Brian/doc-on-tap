<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboard extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';

        $doctorCount = Doctor::count();
        $patientCount = Patient::count();
        $appointmentCount = Appointment::count();
        $revenue = Invoice::where('status', 'paid')->sum('total_amount');

        return view('admin.dashboard', [
            'page_title' => $page_title,
            'doctorCount' => $doctorCount,
            'patientCount' => $patientCount,
            'appointmentCount' => $appointmentCount,
            'revenue' => $revenue,
        ]);
    }
}
