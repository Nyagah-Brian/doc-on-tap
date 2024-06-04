<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // Displays forgot password page 

    public function index()
    {
        $page_title = 'Forgot Passworrd';

        return view('auth.forgot_password', [
            'page_title' => $page_title,
        ]);
    }
}
