@extends('layouts.app')
@section('title')
    Laporan
@endsection

@section('content')
    <div class="container-fluid ">
        <div class="d-flex flex-column overflow-auto">
            @include('flash::message')
            <livewire:complaint-table />
        </div>
    </div>
@endsection
