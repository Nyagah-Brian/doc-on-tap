<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index()
    {
        $page_title = 'Reviews';

        // Retrieve all reviews with eager loading for associated models
        $reviews = Review::with('appointment', 'appointment.doctor')->get();

        return view('admin.reviews', [
            'page_title' => $page_title,
            'reviews' => $reviews,
        ]);
    }

    // Loads the creation of a new review page

    public function create_review()
    {
        $page_title = 'Add New review';

        return view('admin.create_review', [
            'page_title' => $page_title,
        ]);
    }

    // Get JSON of a doctor 

    public function showReview(Review $review)
    {
        return response()->json($review);
    }


    // Function that stores a new review 

    public function addReview(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => $request->first_name,
        ]);

        $review = Review::create($validatedData);

        Log::info("Review added " . $review);

        return redirect()->with('success', "Review has been added successfully!");
    }

    // Loads the edid review page

    public function edit_doc_info(Review $review)
    {
        $page_title = 'Edit review info' . $review->first_name;
  
        return view('admin.reviews', [
            'page_title' => $page_title,
            'review' => $review,
        ]);
    }

    // Updates review edited details

    public function update_doc_info(Request $request, Review $review)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
        ]);

        $review->update($validatedData);

        Log::info("Review details updated successfully!");
  
        return redirect()->route('admin.reviews')->with('success', 'Review details updated successfully');
    }


    // Deleted the review details

    public function destroy(Review $review)
    {
        $review->delete();

        Log::info('Review deleted successfully!');

        return redirect('admin.reviews')->with('success', 'Review deleted successfully!');
    }
}
