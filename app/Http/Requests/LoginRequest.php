<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email harus ada.',
            'email.email' => 'Format email tidak valid.',

            'password.required' => 'Password harus ada.',
            'password.string' => 'Password harus dalam bentuk string.',
        ];
    }
}
