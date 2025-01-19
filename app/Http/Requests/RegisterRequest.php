<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phoneNumber' => 'nullable|string|max:15',
            'city' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'gender' => 'required|in:male,female',
        ];
    }

    public function messages(): array
    {
        return [
            'firstName.required' => 'The first name is required.',
            'lastName.required' => 'The last name is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email is already in use.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'city.required' => 'The city is required.',
            'region.required' => 'The region is required.',
            'gender.in' => 'The gender must be male, female, or other.',
        ];
    }
}
