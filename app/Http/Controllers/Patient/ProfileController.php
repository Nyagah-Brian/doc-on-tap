<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function index()
    {
        $page_title = 'My Profile';

        return view('patient.profile', [
            'page_title' => $page_title,
        ]);
    }
}
