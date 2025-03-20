<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Ensure password confirmation
            'role_id' => ['nullable', 'exists:roles,id'],
        ];
    }

    /**
     * Custom error messages for validation failures.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid text.',
            'name.max' => 'The name cannot be longer than 255 characters.',

            'email.required' => 'An email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email cannot be longer than 255 characters.',
            'email.unique' => 'This email is already taken. Please use another one.',

            'password.required' => 'A password is required.',
            'password.string' => 'The password must be a valid text.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',

            'role_id.exists' => 'The selected role is invalid.',
        ];
    }
}
