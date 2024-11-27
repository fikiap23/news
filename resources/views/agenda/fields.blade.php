<div class="row">
    <div class="mb-5 col-lg-12">
        {{ Form::label('theme', 'Tema Agenda:', ['class' => 'form-label mb-3']) }}
        {{ Form::text('theme', isset($agenda) ? $agenda->theme : null, ['class' => 'form-control', 'id' => 'agendaThemeId', 'placeholder' => 'Tema Agenda']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('place', 'Tempat Agenda:', ['class' => 'form-label mb-3']) }}
        {{ Form::text('place', isset($agenda) ? $agenda->place : null, ['class' => 'form-control', 'id' => 'agendaPlaceId', 'placeholder' => 'Tempat Agenda']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('start_date', 'Tanggal Mulai:', ['class' => 'form-label mb-3']) }}
        {{ Form::date('start_date', isset($agenda) ? $agenda->start_date : null, ['class' => 'form-control', 'id' => 'agendaStartDateId']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('end_date', 'Tanggal Selesai:', ['class' => 'form-label mb-3']) }}
        {{ Form::date('end_date', isset($agenda) ? $agenda->end_date : null, ['class' => 'form-control', 'id' => 'agendaEndDateId']) }}
    </div>

    <div class="mb-5 col-lg-12">
        {{ Form::label('activity', 'Aktivitas Agenda:', ['class' => 'form-label mb-3']) }}
        {{ Form::textarea('activity', isset($agenda) ? $agenda->activity : null, ['class' => 'form-control', 'id' => 'agendaActivityId', 'placeholder' => 'Aktivitas Agenda']) }}
    </div>

    <div class="col-lg-12 d-flex">
        {{ Form::submit('Simpan', ['class' => 'btn btn-primary me-2', 'id' => 'submitForm']) }}
        <a href="{{ route('agenda.index') }}" type="reset" class="btn btn-secondary my-0 me-0">Batal</a>
    </div>
</div>
