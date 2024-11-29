<div class="row">
    <div class="mb-5 col-lg-12">
        {{ Form::label('title', 'Judul Dokumen:', ['class' => 'form-label mb-3']) }}
        {{ Form::text('title', isset($document) ? $document->title : null, ['class' => 'form-control', 'id' => 'documentTitleId', 'placeholder' => 'Judul Dokumen']) }}
    </div>

    {{-- <div class="mb-5 col-lg-12">
        {{ Form::label('author', 'Penulis Dokumen:', ['class' => 'form-label mb-3']) }}
        {{ Form::text('author', isset($document) ? $document->author : null, ['class' => 'form-control', 'id' => 'documentAuthorId', 'placeholder' => 'Penulis Dokumen']) }}
    </div> --}}

    <div class="mb-5 col-lg-12">
        {{ Form::label('type', 'Tipe Dokumen:', ['class' => 'form-label mb-3']) }}
        {{ Form::select(
            'type',
            [
                'regulation' => 'Regulasi',
                'publication' => 'Publikasi',
                'other' => 'Lainnya',
            ],
            isset($document) ? $document->type : null,
            ['class' => 'form-control', 'id' => 'documentTypeId'],
        ) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('published_at', 'Tanggal Terbit:', ['class' => 'form-label mb-3']) }}
        {{ Form::date('published_at', isset($document) ? $document->published_at : null, ['class' => 'form-control', 'id' => 'documentPublishedAtId']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('document', 'Dokumen (Link/File):', ['class' => 'form-label mb-3']) }}
        {{ Form::file('document', ['class' => 'form-control', 'id' => 'documentFileId']) }}
        <small class="text-muted">Unggah dokumen atau masukkan link jika tersedia.</small>
    </div>


    <div class="col-lg-12 d-flex">
        {{ Form::submit('Simpan', ['class' => 'btn btn-primary me-2', 'id' => 'submitForm']) }}
        <a href="{{ route('information-document.index') }}" type="reset" class="btn btn-secondary my-0 me-0">Batal</a>
    </div>
</div>
