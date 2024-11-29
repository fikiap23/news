@extends('layouts.app')
@section('title')
    Jawab Laporan
@endsection
@section('header_toolbar')
    <div class="container-fluid ">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('information-document.index') }}"
                    class="btn  btn-outline-primary">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    {{ Form::hidden('galleryEditIsEdit', true, ['id' => 'galleryEditIsEdit']) }}
    <div class="container-fluid">
        @include('layouts.errors')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['information-document.update', $document->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) }}
                @include('information_document.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
