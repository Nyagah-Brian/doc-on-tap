<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Adjust authorization logic based on your application's requirements
        // This often involves checking if the current user is authenticated and has permission to create appointments
        return true; // For demonstration purposes
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'doctor_id' => ['required', 'uuid', 'exists:doctors,id'],
            'appointment_time' => ['required', 'after_or_equal:now'], // Ensure it's in the future
            'status' => ['sometimes', Rule::in(['scheduled', 'canceled', 'completed'])], // Optional with valid enum values
        ];
    }

    /**
     * Custom error messages for validation (optional).
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'appointment_time.after_or_equal' => 'The appointment time must be in the future.',
        ];
    }
}
