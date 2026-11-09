<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5',
            'email' => 'required|string|unique:user,email',
            'password' => 'required|string',
            'role' => 'required|in:guru,siswa',
            'class_id' => 'required|exists:classes,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib ada.',
            'name.string' => 'Nama harus berupa teks.',
            'name.min' => 'Nama minimal terdiri dari 5 karakter.',
            
            'email.required' => 'Email wajib ada.',
            'email.string' => 'Email harus berupa teks.',
            'email.min' => 'Email minimal terdiri dari 5 karakter.',
            
            'password.required' => 'password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',

            'role.required' => 'Role wajib dipilih.',
            'role.exists' => 'Role yang dipilih tidak valid.',

            'class_id.required' => 'Kelas wajib dipilih.',
            'class_id.exists' => 'Kelas yang dipilih tidak valid.',
            ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
