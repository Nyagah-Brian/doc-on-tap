<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index()
    {
        $page_title = 'Doctors';

        return view('admin.doctors', [
            'page_title' => $page_title,
        ]);
    }
}
