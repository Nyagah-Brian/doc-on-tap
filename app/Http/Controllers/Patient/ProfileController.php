<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    //

    public function index()
    {
        $page_title = 'My Profile';

        return view('patient.profile', [
            'page_title' => $page_title,
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $validatedData = $request->validated();

        // Update profile details
        $user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        // Update password if it's being changed
        if ($request->filled('current_password') && $request->filled('password')) {
            if (Hash::check($request->current_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            } else {
                return back()->with(['error' => 'Incorrect current password.']);
            }
        }

        return redirect()->route('patientChangePassword')->with('success', 'Profile updated successfully!');
    }
}
