<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Display registration page 

    public function index()
    {
        $page_title = 'Register';

        return view('auth.register', [
            'page_title' => $page_title,
        ]);
    }
}
