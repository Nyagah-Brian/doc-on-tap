<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    //

    public function index()
    {
        $page_title = 'My Account';

        return view('patient.change_password', [
            'page_title' => $page_title,
        ]);
    }
}
