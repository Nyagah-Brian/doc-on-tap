<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialitiesController extends Controller
{
    public function index()
    {
        $page_title = 'Specialities';

        return view('admin.specialities', [
            'page_title' => $page_title,
        ]);
    }
}
