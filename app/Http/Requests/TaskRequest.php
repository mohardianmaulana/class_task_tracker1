<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'class_id' => 'required|exists:classes,id',
            'title' => 'required|string|min:5',
            'description' => 'nullable|string|min:5',
            'deadline' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'teacher_id.required' => 'Guru wajib dipilih.',
            'teacher_id.exists' => 'Guru yang dipilih tidak valid.',

            'class_id.required' => 'Kelas wajib dipilih.',
            'class_id.exists' => 'Kelas yang dipilih tidak valid.',
            
            'title.required' => 'Judul wajib ada.',
            'title.string' => 'Judul harus berupa teks.',
            'title.min' => 'Judul minimal terdiri dari 5 karakter.',

            'description.string' => 'Deskripsi harus berupa teks.',
            'description.min' => 'Deskripsi minimal terdiri dari 5 karakter.',

            'deadline.required' => 'Deadline wajib diisi.',
            'deadline.date' => 'Format deadline tidak valid.',
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
