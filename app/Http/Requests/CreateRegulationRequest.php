<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegulationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Tambahkan logika otorisasi jika diperlukan
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descriptions' => 'required|array', // Pastikan 'descriptions' adalah array
            'descriptions.*' => 'required|string|max:1000', // Validasi setiap elemen dalam array
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
            'descriptions.required' => 'Deskripsi regulasi wajib diisi.',
            'descriptions.array' => 'Deskripsi harus berupa array.',
            'descriptions.*.required' => 'Setiap deskripsi wajib diisi.',
            'descriptions.*.string' => 'Setiap deskripsi harus berupa teks yang valid.',
            'descriptions.*.max' => 'Deskripsi tidak boleh melebihi 1000 karakter.',
        ];
    }
}
