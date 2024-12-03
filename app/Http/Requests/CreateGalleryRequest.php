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
            'image' => 'required|file|mimes:jpeg,png,jpg,webp,svg,mp4,avi,mov,wmv|max:10240', // Mendukung gambar dan video
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
            'image.required' => 'An image or video is required.',
            'image.file' => 'The file must be an image or video.',
            'image.mimes' => 'The file must be of type: jpeg, png, jpg, webp, svg, mp4, avi, mov, wmv.',
            'image.max' => 'The file size must not exceed 10 MB.',
        ];
    }
}
