@extends('layouts.app')
@section('title')
    {{ __('messages.images') }}
@endsection

@section('content')
    <div class="container-fluid ">
        <div class="d-flex flex-column overflow-auto">
            @include('flash::message')
            <livewire:gallery-table />
        </div>
    </div>
@endsection
