<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DoctorsController extends Controller
{
    //  Lists all regostered doctors

    public function index()
    {
        $page_title = 'Doctors';

        $doctors = Doctor::with('speciality')->get(); 

        return view('admin.doctors', [
            'page_title' => $page_title,
            'doctors' => $doctors,
        ]);
    }

    // Loads the creation of a new doctor page

    public function create_doctor()
    {
        $page_title = 'Add New Doctor';

        return view('admin.create_doctor', [
            'page_title' => $page_title,
        ]);
    }

    // Get JSON of a doctor 

    public function showDoctor(Doctor $doctor)
    {
        return response()->json($doctor);
    }


    // Function that stores a new doctor 

    public function addDoctor(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => $request->first_name,
        ]);

        $doctor = Doctor::create($validatedData);

        Log::info("Doctor added " . $doctor);


        return redirect()->with('success', "Doctor has been added successfully!");
    }

    // Loads the edid doctor page

    public function edit_doc_info(Doctor $doctor)
    {
        $page_title = 'Edit doctor info' . $doctor->first_name;
  
        return view('admin.doctors', [
            'page_title' => $page_title,
            'doctor' => $doctor,
        ]);
    }

    // Updates doctor edited details

    public function update_doc_info(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
        ]);

        $doctor->update($validatedData);

        Log::info("Doctor details updated successfully!");
  
        return redirect()->route('admin.doctors')->with('success', 'Doctor details updated successfully');
    }


    // Deleted the doctor details

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        Log::info('Doctor deleted successfully!');

        return redirect('admin.doctors')->with('success', 'Doctor deleted successfully!');
    }
}
