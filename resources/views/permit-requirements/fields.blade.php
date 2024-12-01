<div class="row">
    <div class="mb-5 col-lg-12">
        {{ Form::label('permit_type_name', 'Jenis Izin:', ['class' => 'form-label mb-3']) }}
        {{ Form::text('permit_type_name', isset($permitRequirement) ? $permitRequirement->permit_type_name : null, ['class' => 'form-control', 'id' => 'permitTypeNameId', 'placeholder' => 'Jenis Izin']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('duration_days', 'Durasi (Hari):', ['class' => 'form-label mb-3']) }}
        {{ Form::number('duration_days', isset($permitRequirement) ? $permitRequirement->duration_days : null, ['class' => 'form-control', 'id' => 'durationDaysId', 'placeholder' => 'Durasi Izin dalam Hari', 'min' => 1]) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('permit_field', 'Bidang Izin:', ['class' => 'form-label mb-3']) }}
        {{ Form::text('permit_field', isset($permitRequirement) ? $permitRequirement->permit_field : null, ['class' => 'form-control', 'id' => 'permitFieldId', 'placeholder' => 'Bidang Izin']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('requirements', 'Pilih Persyaratan (Opsional):', ['class' => 'form-label mb-3']) }}

        @foreach (['Baru', 'Balik Nama/Perubahan', 'Perpanjangan', 'Pemutihan'] as $category)
            <div class="mb-4">
                <h5>{{ $category }}</h5>

                @foreach ($categories[$category] as $requirement)
                    <div class="form-check">
                        {{ Form::checkbox($category . '[]', $requirement, isset($permitRequirement) && in_array($requirement, json_decode($permitRequirement->requirements)->$category) ? true : false, ['class' => 'form-check-input', 'id' => 'requirement_' . Str::slug($requirement)]) }}
                        {{ Form::label('requirement_' . Str::slug($requirement), $requirement, ['class' => 'form-check-label']) }}
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="col-lg-12 d-flex">
        {{ Form::submit('Simpan', ['class' => 'btn btn-primary me-2', 'id' => 'submitForm']) }}
        <a href="{{ route('permit-requirements.index') }}" type="reset" class="btn btn-secondary my-0 me-0">Batal</a>
    </div>
</div>
