<?php

namespace App\Http\Controllers\Admin;

use App\Models\Speciality;
use Illuminate\Http\Request;
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
}
