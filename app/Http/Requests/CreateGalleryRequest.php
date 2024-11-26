<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryRequest extends FormRequest
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
            'description' => 'string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:2048' // Pastikan berupa file gambar
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
            // 'description.required' => 'Description is required.',
            // 'description.string' => 'Description must be a string.',
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, webp, svg.',
            'image.max' => 'The image size must not exceed 2 MB.',
        ];
    }
}
