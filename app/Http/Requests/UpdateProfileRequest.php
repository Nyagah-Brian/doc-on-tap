<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->id()], // Unique email, excluding current user's email
            'phone_number' => ['required', 'string','unique:users,phone_number,'.auth()->id()],
            'current_password' => ['required_with:password'], // Required only if the new password is provided
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        
        ];
    }
}
