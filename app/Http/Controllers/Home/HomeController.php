<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Loads the homepage 

    public function index()
    {
        $page_title = 'Home';

        return view('home.index', [
            'page_title' => $page_title,
        ]);
    }
}
