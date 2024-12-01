<div class="row">
    <div class="mb-5 col-lg-12">
        {{ Form::label('description', 'Deskripsi Regulasi:', ['class' => 'form-label mb-3']) }}
        {{ Form::textarea('description', isset($regulation) ? $regulation->description : null, ['class' => 'form-control', 'id' => 'regulationDescriptionId', 'placeholder' => 'Deskripsi Regulasi', 'rows' => 2]) }}

    </div>

    <div class="col-lg-12 d-flex">
        {{ Form::submit('Simpan', ['class' => 'btn btn-primary me-2', 'id' => 'submitForm']) }}
        <a href="{{ route('regulation.index') }}" type="reset" class="btn btn-secondary my-0 me-0">Batal</a>
    </div>
</div>
