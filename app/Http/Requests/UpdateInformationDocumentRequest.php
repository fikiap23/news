<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Anda dapat menambahkan logika otorisasi jika diperlukan
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|required|string|max:255', // Judul dokumen, opsional tetapi jika ada harus valid
            'author' => 'sometimes|required|string|max:255', // Penulis dokumen, opsional tetapi jika ada harus valid
            'document' => 'sometimes|required|string', // Konten dokumen, opsional tetapi jika ada harus valid
            'published_at' => 'nullable|date', // Tanggal publikasi, opsional dan berupa tanggal yang valid
            'type' => 'sometimes|required|in:regulation,publication,other', // Jenis dokumen, opsional tetapi jika ada harus valid
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
            'title.required' => 'Judul dokumen wajib diisi jika ada.',
            'title.string' => 'Judul dokumen harus berupa string.',
            'title.max' => 'Judul dokumen tidak boleh lebih dari 255 karakter.',

            'author.required' => 'Penulis dokumen wajib diisi jika ada.',
            'author.string' => 'Penulis dokumen harus berupa string.',
            'author.max' => 'Penulis dokumen tidak boleh lebih dari 255 karakter.',

            'document.required' => 'Konten dokumen wajib diisi jika ada.',
            'document.string' => 'Konten dokumen harus berupa teks yang valid.',

            'published_at.date' => 'Tanggal publikasi harus berupa tanggal yang valid.',

            'type.required' => 'Jenis dokumen wajib diisi jika ada.',
            'type.in' => 'Jenis dokumen harus berupa salah satu dari: regulation, publication, other.',
        ];
    }
}
