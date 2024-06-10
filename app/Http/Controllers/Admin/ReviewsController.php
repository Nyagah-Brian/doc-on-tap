<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index()
    {
        $page_title = 'Reviews';

        // Retrieve all reviews with eager loading for associated models
        $reviews = Review::with('appointment', 'appointment.patient', 'appointment.doctor')->get();

        return view('admin.reviews', [
            'page_title' => $page_title,
            'reviews' => $reviews,
        ]);
    }
}
