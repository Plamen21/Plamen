<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentDetailsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'studentName' => 'required|string|min:3|max:15',
            'studentFamilyName' => 'required|string|min:3|max:15',
            'studentEmail' => 'required|email',
            'studentPhone' => 'required|digits:min:5',
            'studentCountry' => 'required|string|min:3',
            'studentCity' => 'required|string|min:3',
            'languageLevel' => 'nullable|integer|min:0|max:100',
            'short_info' => 'required|string|min:10|max:100'
        ];
    }
}
