<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermitRequirementsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can add authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'permit_type_name' => 'required|string|max:255', // Required permit type name, must be a string
            'duration_days' => 'required|integer|min:1', // Required duration, must be an integer and at least 1
            'permit_field' => 'required|string|max:255', // Required field name, must be a string
            'requirement_link' => 'nullable|url|max:255', // Optional link, must be a valid URL if provided
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'permit_type_name.required' => 'The permit type name is required.',
            'permit_type_name.string' => 'The permit type name must be a valid string.',
            'permit_type_name.max' => 'The permit type name cannot exceed 255 characters.',

            'duration_days.required' => 'The duration in days is required.',
            'duration_days.integer' => 'The duration must be a valid integer.',
            'duration_days.min' => 'The duration must be at least 1 day.',

            'permit_field.required' => 'The permit field is required.',
            'permit_field.string' => 'The permit field must be a valid string.',
            'permit_field.max' => 'The permit field cannot exceed 255 characters.',

            'requirement_link.url' => 'The requirement link must be a valid URL.',
            'requirement_link.max' => 'The requirement link cannot exceed 255 characters.',
        ];
    }
}
