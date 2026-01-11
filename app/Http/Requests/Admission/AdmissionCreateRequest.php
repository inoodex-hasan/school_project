<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionCreateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'fathers_name' => 'nullable|string|max:255',
            'mothers_name' => 'nullable|string|max:255',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required|date',
            'birth_certificate_no' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:10',
            'email' => 'nullable|email|max:255',
            'religion' => 'nullable|in:Islam,Hindu,Christian,Buddhist,other',
            'nationality' => 'nullable|string|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:1000',
            'father_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'mother_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'roll' => 'required|string|max:50',
        ];
    }
}
