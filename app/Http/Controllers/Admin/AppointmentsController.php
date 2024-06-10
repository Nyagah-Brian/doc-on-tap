<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentsController extends Controller
{
    public function index()
    {
        $page_title = 'Appointments';

        // Retrieve all appointments with patient and doctor information using eager loading
        $appointments = Appointment::with('patient', 'doctor')->get();

        return view('admin.appointments', [
            'page_title' => $page_title,
            'appointments' => $appointments,
        ]);
    }
}
