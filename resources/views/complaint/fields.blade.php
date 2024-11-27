<div class="row">
    <div class="mb-5 col-lg-12">
        {{ Form::label('name', 'Nama Pengaduan :', ['class' => 'form-label mb-3']) }}
        {{ Form::text('name', isset($complaint) ? $complaint->name : null, ['class' => 'form-control', 'id' => 'complaintNameId', 'placeholder' => 'Nama Pengaduan', 'disabled' => 'disabled']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('email', 'Email Pengaduan :', ['class' => 'form-label mb-3']) }}
        {{ Form::email('email', isset($complaint) ? $complaint->email : null, ['class' => 'form-control', 'id' => 'complaintEmailId', 'placeholder' => 'Email Pengaduan', 'disabled' => 'disabled']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('phone', 'No. Telepon Pengaduan :', ['class' => 'form-label mb-3']) }}
        {{ Form::text('phone', isset($complaint) ? $complaint->phone : null, ['class' => 'form-control', 'id' => 'complaintPhoneId', 'placeholder' => 'No. Telepon Pengaduan', 'disabled' => 'disabled']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('address', 'Alamat Pengaduan :', ['class' => 'form-label mb-3']) }}
        {{ Form::text('address', isset($complaint) ? $complaint->address : null, ['class' => 'form-control', 'id' => 'complaintAddressId', 'placeholder' => 'Alamat Pengaduan', 'disabled' => 'disabled']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('district', 'Kecamatan Pengaduan :', ['class' => 'form-label mb-3']) }}
        {{ Form::text('district', isset($complaint) ? $complaint->district : null, ['class' => 'form-control', 'id' => 'complaintDistrictId', 'placeholder' => 'Kecamatan Pengaduan', 'disabled' => 'disabled']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('village', 'Desa Pengaduan :', ['class' => 'form-label mb-3']) }}
        {{ Form::text('village', isset($complaint) ? $complaint->village : null, ['class' => 'form-control', 'id' => 'complaintVillageId', 'placeholder' => 'Desa Pengaduan', 'disabled' => 'disabled']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('message', 'Pesan Pengaduan :', ['class' => 'form-label mb-3']) }}
        <textarea name="message" class="form-control" id="complaintMessageId" rows="5" placeholder="Pesan Pengaduan"
            disabled>{{ isset($complaint) ? $complaint->message : null }}</textarea>
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('image', 'Gambar Laporan :', ['class' => 'form-label required mb-3']) }}
        <input type="file" class="form-control" id="complaintNewImage" name="image"
            accept=".png, .jpg, .jpeg, .webp, .svg" disabled>
    </div>

    <div class="mb-5 col-lg-12">
        <div id="preview" class="additional-images">
            @if (isset($complaint->image))
                <img src="{{ asset($complaint->image) }}" width="100px" height="60px" class="border-color" />
            @endif
        </div>
    </div>

    <!-- Editable Jawaban column -->
    <div class="mb-5 col-lg-12">
        {{ Form::label('response_details', 'Jawaban Laporan :', ['class' => 'form-label mb-3']) }}
        {{ Form::textarea('response_details', isset($complaint) ? $complaint->response_details : null, ['class' => 'form-control', 'id' => 'complaintJawabanId', 'placeholder' => 'Jawaban Laporan']) }}
    </div>

    <div class="col-lg-12 d-flex">
        {{ Form::submit('Simpan', ['class' => 'btn btn-primary me-2', 'id' => 'submitForm']) }}
        <a href="{{ route('complaint.index') }}" type="reset" class="btn btn-secondary my-0 me-0">Batal</a>
    </div>
</div>

<!-- JavaScript to Enable Disabled Fields for Form Submission -->
<script>
    document.getElementById('submitForm').addEventListener('click', function() {
        // Enable the disabled fields before form submission
        document.querySelectorAll('input[disabled], textarea[disabled]').forEach(function(element) {
            element.removeAttribute('disabled');
        });
    });
</script>
