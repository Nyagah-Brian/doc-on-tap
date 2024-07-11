<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PatientsController extends Controller
{
    public function index()
    {
        $page_title = 'Patients';

        $patients = Patient::with('user')->get();

        return view('admin.patients', [
            'page_title' => $page_title,
            'patients' => $patients,
        ]);
    }

    // Loads the creation of a new patient page

    public function create_patient()
    {
        $page_title = 'Add New patient';

        return view('admin.create_patient', [
            'page_title' => $page_title,
        ]);
    }

    // Get JSON of a doctor 

    public function showPatient(Patient $patient)
    {
        return response()->json($patient);
    }


    // Function that stores a new patient 

    public function addPatient(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => $request->first_name,
        ]);

        $patient = Patient::create($validatedData);

        Log::info("Patient added " . $patient);

        return redirect()->with('success', "Patient has been added successfully!");
    }

    // Loads the edid patient page

    public function edit_doc_info(Patient $patient)
    {
        $page_title = 'Edit patient info' . $patient->first_name;
  
        return view('admin.patients', [
            'page_title' => $page_title,
            'patient' => $patient,
        ]);
    }

    // Updates patient edited details

    public function update_doc_info(Request $request, Patient $patient)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
        ]);

        $patient->update($validatedData);

        Log::info("Patient details updated successfully!");
  
        return redirect()->route('admin.patients')->with('success', 'Patient details updated successfully');
    }


    // Deleted the patient details

    public function destroy(Patient $patient)
    {
        $patient->delete();

        Log::info('Patient deleted successfully!');

        return redirect('admin.patients')->with('success', 'Patient deleted successfully!');
    }
}
