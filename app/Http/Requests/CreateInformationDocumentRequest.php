<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInformationDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Otorisasi
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'published_at' => 'nullable|date',
            'type' => 'required|in:regulation,publication,other',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul dokumen wajib diisi.',
            'document.required' => 'File dokumen wajib diunggah.',
            'document.file' => 'Dokumen harus berupa file.',
            'document.mimes' => 'Dokumen harus berupa file PDF, DOC, atau DOCX.',
            'document.max' => 'Ukuran dokumen tidak boleh lebih dari 2MB.',
            'type.required' => 'Jenis dokumen wajib diisi.',
            'type.in' => 'Jenis dokumen harus berupa salah satu dari: regulation, publication, other.',
        ];
    }
}
