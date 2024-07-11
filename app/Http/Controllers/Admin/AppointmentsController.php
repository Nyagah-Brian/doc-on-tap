<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class AppointmentsController extends Controller
{
    public function index()
    {
        $page_title = 'Appointments';

        // Retrieve all appointments with appointment and doctor information using eager loading
        $appointments = Appointment::with('doctor')->get();

        return view('admin.appointments', [
            'page_title' => $page_title,
            'appointments' => $appointments,
        ]);
    }

    // Loads the creation of a new appointment page

    public function create_appointment()
    {
        $page_title = 'Add New appointment';

        return view('admin.create_appointment', [
            'page_title' => $page_title,
        ]);
    }

    // Get JSON of a doctor 

    public function showAppointment(Appointment $appointment)
    {
        return response()->json($appointment);
    }


    // Function that stores a new appointment 

    public function addAppointment(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => $request->first_name,
        ]);

        $appointment = Appointment::create($validatedData);

        Log::info("Appointment added " . $appointment);

        return redirect()->with('success', "Appointment has been added successfully!");
    }

    // Loads the edid appointment page

    public function edit_appointment_info(Appointment $appointment)
    {
        $page_title = 'Edit appointment info' . $appointment->first_name;
  
        return view('admin.appointments', [
            'page_title' => $page_title,
            'appointment' => $appointment,
        ]);
    }

    // Updates appointment edited details

    public function update_appointment_info(Request $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
        ]);

        $appointment->update($validatedData);

        Log::info("Appointment details updated successfully!");
  
        return redirect()->route('admin.appointments')->with('success', 'Appointment details updated successfully');
    }


    // Deleted the appointment details

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        Log::info('Appointment deleted successfully!');

        return redirect('admin.appointments')->with('success', 'Appointment deleted successfully!');
    }
}
