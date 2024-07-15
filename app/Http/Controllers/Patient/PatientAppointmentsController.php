<?php

namespace App\Http\Controllers\Patient;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAppointmentRequest;

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

    // Stores a new appointment

    public function storeAppointment(StoreAppointmentRequest $request)
    {
        try {
            $validatedInput = $request->validated();

            $user = Auth::user();

            $patientId =  Patient::where('user_id', $user->id)->first();
 
            $validatedInput['patient_id'] = $patientId->id;

            Log::info($validatedInput);

            $appointment = Appointment::create($validatedInput);

            Log::info('New appointment created with ID: ' . $appointment->id);

            $successMsg = 'New appointment added successfully!';

            $redirectUrl = route('patientAppointments');

            return response()->json(['message' => $successMsg, 'appointment' => $appointment, 'redirectUrl' => $redirectUrl]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            Log::error('Error adding appointment: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to add appointment.'], 500);
        }
    }


    public function getAvailableTimes($doctorId)
    {
        $today = Carbon::today();
        $schedules = Schedule::where('doctor_id', $doctorId)
            ->where('date', '>=', $today)
            ->where('status', 'available')
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        $availableTimes = [];

        foreach ($schedules as $schedule) {
            $startTime = Carbon::parse($schedule->start_time)->format('H:i');
            $endTime = Carbon::parse($schedule->end_time)->format('H:i');
            $availableTimes[] = [
                'date' => $schedule->date->format('Y-m-d'),
                'start_time' => $startTime,
                'end_time' => $endTime,
            ];
        }

        return response()->json($availableTimes);
    }
}
