<?php

namespace App\Http\Controllers\Home;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // Loads the homepage 

    public function index()
    {
        $page_title = 'Home';

        $doctors = Doctor::with('speciality')->get();

        return view('home.index', [
            'page_title' => $page_title,
            'doctors' => $doctors,
        ]);
    }
}
