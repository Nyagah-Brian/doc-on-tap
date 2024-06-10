<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorsController extends Controller
{
    public function index()
    {
        $page_title = 'Doctors';

        // Retrieve all doctors with their specialities using eager loading
        $doctors = Doctor::with('speciality')->get(); // Eager load the speciality relationship

        return view('admin.doctors', [
            'page_title' => $page_title,
            'doctors' => $doctors,
        ]);
    }
}
