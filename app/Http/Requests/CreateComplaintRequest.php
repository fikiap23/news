<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateComplaintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => 'required|string|max:1000', // Complaint message, required and a string with a maximum length
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048', // Optional image for the complaint
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
            'message.required' => 'The complaint message is required.',
            'message.string' => 'The complaint message must be a valid string.',
            'message.max' => 'The complaint message cannot exceed 1000 characters.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be of type: jpeg, png, jpg, webp, svg.',
            'image.max' => 'The image size must not exceed 2 MB.',
        ];
    }
}
