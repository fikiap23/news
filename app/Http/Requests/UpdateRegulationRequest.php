<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegulationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Sesuaikan jika perlu logika otorisasi
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required|string|max:1000', // Deskripsi regulasi wajib diisi, tipe string, maksimal 1000 karakter
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
            'description.required' => 'Deskripsi regulasi wajib diisi.',
            'description.string' => 'Deskripsi regulasi harus berupa teks yang valid.',
            'description.max' => 'Deskripsi regulasi tidak boleh melebihi 1000 karakter.',
        ];
    }
}
