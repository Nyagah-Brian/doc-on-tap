<?php

namespace App\Http\Controllers\Admin;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SpecialitiesController extends Controller
{
    public function index()
    {
        $page_title = 'Specialities';

        // Retrieve all specialties from the database
        $specialities = Speciality::all();

        return view('admin.specialities', [
            'page_title' => $page_title,
            'specialities' => $specialities,
        ]);
    }

    // Loads the creation of a new speciality page

    public function create_speciality()
    {
        $page_title = 'Add New speciality';

        return view('admin.create_speciality', [
            'page_title' => $page_title,
        ]);
    }

    // Get JSON of a doctor 

    public function showSpeciality(Speciality $speciality)
    {
        return response()->json($speciality);
    }


    // Function that stores a new speciality 

    public function addSpeciality(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => $request->first_name,
        ]);

        $speciality = Speciality::create($validatedData);

        Log::info("Speciality added " . $speciality);

        return redirect()->with('success', "Speciality has been added successfully!");
    }

    // Loads the edid speciality page

    public function edit_speciality_info(Speciality $speciality)
    {
        $page_title = 'Edit speciality info' . $speciality->first_name;
  
        return view('admin.specialitys', [
            'page_title' => $page_title,
            'speciality' => $speciality,
        ]);
    }

    // Updates speciality edited details

    public function update_speciality_info(Request $request, Speciality $speciality)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
        ]);

        $speciality->update($validatedData);

        Log::info("Speciality details updated successfully!");
  
        return redirect()->route('admin.specialitys')->with('success', 'Speciality details updated successfully');
    }


    // Deleted the speciality details

    public function destroy(Speciality $speciality)
    {
        $speciality->delete();

        Log::info('Speciality deleted successfully!');

        return redirect('admin.specialitys')->with('success', 'Speciality deleted successfully!');
    }
}
