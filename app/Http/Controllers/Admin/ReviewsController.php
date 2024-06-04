<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        $page_title = 'Reviews';

        return view('admin.reviews', [
            'page_title' => $page_title,
        ]);
    }
}
