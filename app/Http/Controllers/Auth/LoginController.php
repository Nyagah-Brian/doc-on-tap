<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Displays Login page

    public function index()
    {
        $page_title = 'Login';

        return view('auth.login', [
            'page_title' => $page_title,
        ]);
    }
}
