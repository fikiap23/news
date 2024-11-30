@extends('layouts.app')
@section('title')
    Tambah Daftar Izin
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a href="{{ route('agenda') }}" class="btn btn-outline-primary float-end">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @include('layouts.errors')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'permit-requirements.store', 'enctype' => 'multipart/form-data']) }}
                @include('permit-requirements.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
