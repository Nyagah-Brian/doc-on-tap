<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientsController extends Controller
{
    public function index()
    {
        $page_title = 'Patients';

        // Retrieve all patients with their associated user data
        $patients = Patient::with('user')->get(); // Eager load the user relationship

        return view('admin.patients', [
            'page_title' => $page_title,
            'patients' => $patients,
        ]);
    }
}
