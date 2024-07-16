<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use App\Models\Review;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorDashboard extends Controller
{
    //

    

    public function index()
    {
        $page_title = 'Doctor Dashboard';

        $doctorId = Doctor::where('user_id', Auth::user()->id)->first()->id;

        $appointmentCount = Appointment::where('doctor_id', $doctorId)->count();

        return view('doctor.dashboard', [
            'page_title' => $page_title,
            'appointmentCount' => $appointmentCount,
        ]);
    }

    public function appointments()
    {
        $page_title = 'Appointments';

        $doctorId = Doctor::where('user_id', Auth::user()->id)->first()->id;

        // Retrieve all appointments with appointment and doctor information using eager loading
        $appointments = Appointment::where('doctor_id', $doctorId)->with('doctor')->get();

        return view('admin.appointments', [
            'page_title' => $page_title,
            'appointments' => $appointments,
        ]);
    }

    public function reviews()
    {
        $page_title = 'Reviews';

        $doctorId = Doctor::where('user_id', Auth::user()->id)->first()->id;

        // Retrieve all appointments with appointment and doctor information using eager loading
        $appointments = Appointment::where('doctor_id', $doctorId)->with('doctor')->get();

        // Retrieve all reviews with eager loading for associated models
        $reviews = Review::with('appointment', 'appointment.doctor')->get();

        return view('admin.reviews', [
            'page_title' => $page_title,
            'reviews' => $reviews,
        ]);
    }

    public function patients()
    {
        $page_title = 'Patients';

        $doctorId = Doctor::where('user_id', Auth::user()->id)->first()->id;

        $patients = Patient::where('doctor_id', $doctorId)->with('user')->get();

        return view('admin.patients', [
            'page_title' => $page_title,
            'patients' => $patients,
        ]);
    }

}
