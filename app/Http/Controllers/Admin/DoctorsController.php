<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15|unique:users',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:male,female',
            'password' => 'required|string|min:8',
            'speciality_id' => 'nullable|exists:specialities,id',
            'license_number' => 'required|string|unique:doctors',
            'years_of_experience' => 'required|integer|min:0',
        ]);

        DB::beginTransaction();

        try {
            // Create User
            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
                'birth_date' => $validatedData['birth_date'],
                'gender' => $validatedData['gender'],
                'password' => Hash::make($validatedData['password']),
                'status' => 'active', // default status
            ]);

            // Assign the "Doctor" role to the user
            $doctorRole = Role::where('name', 'Doctor')->first();
            $user->assignRole($doctorRole);

            // Create Doctor details
            $doctor = Doctor::create([
                'user_id' => $user->id,
                'speciality_id' => $validatedData['speciality_id'],
                'license_number' => $validatedData['license_number'],
                'years_of_experience' => $validatedData['years_of_experience'],
            ]);

            DB::commit();

            Log::info("Doctor added: " . $doctor);

            return redirect()->back()->with('success', "Doctor has been added successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error adding doctor: " . $e->getMessage());
            return redirect()->back()->with('error', "An error occurred while adding the doctor.");
        }
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
