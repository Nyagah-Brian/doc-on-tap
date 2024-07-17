<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'phone_number' => 'required|unique:users',
            'password' => 'required|min:8',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($user) {
            return redirect()
                ->back()
                ->withInput()
                ->with(['error' => 'This account already exists.']); //error handling,redirected
        }

        // Create a new user
        $user = new User;
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->phone_number = $validatedData['phone_number'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->status = 'active';

        // Assign Role
        $userRole = Role::where('name', 'Patient')->first();
        $user->assignRole($userRole);

        // Generate an email password reset token
        $token = Str::random(64);

        // Insert email and token in password resets table
        $passwordResetToken = PasswordReset::where('email', $validatedData['email'])->first();
        if ($passwordResetToken) {

            PasswordReset::where('email', $validatedData['email'])->update([
                'email' => $validatedData['email'],
                'token' => $token,
            ]);
        } else {

            PasswordReset::create([
                'email' => $validatedData['email'],
                'token' => $token,
            ]);
        }

        // Save the new user and add to the sstudents table
        if ($user->save()) {

            $patient = new Patient();
            $patient->user_id = $user->id;
            $patient->save();
        }

        return redirect()
        ->back()
        ->with(['success' => 'Account has been registered successfully. An email with the account activation link was sent to ' . $user->email]);

        // Send password reset link email with the token
        // if (Mail::to($user->email)->queue(new AccountCreation($user, $token))) {

        //     return redirect()
        //         ->back()
        //         ->with(['success' => 'Account has been registered successfully. An email with the account activation link was sent to ' . $user->email]);
        // } else {

        //     return redirect()
        //         ->back()
        //         ->with(['error' => 'There was an error sending the email. Please try again. You can try using the password reset link to access your account.']);
        // }
    }
}
