@extends('front_new.layouts.app')

@section('title', 'Detail Agenda')

@section('content')
    <div class="container mt-4">
        <!-- Start header section -->
        <section class="bg-primary text-white text-center py-4">
            <div class="container">
                <h1 class="display-6 font-weight-bold">Detail Agenda</h1>
                <p class="lead">Informasi Lengkap Agenda</p>
            </div>
        </section>
        <!-- End header section -->

        <!-- Agenda Detail Section -->
        <div class="mt-5">
            <h2 class="mb-4">{{ $agenda->theme }}</h2>

            <!-- Details Table -->
            <div class="table-responsive">
                <table class="table table-bordered text-black">
                    <tbody>
                        <tr>
                            <td><strong>Tema</strong></td>
                            <td>{{ $agenda->theme }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tempat</strong></td>
                            <td>{{ $agenda->place }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Mulai</strong></td>
                            <td>{{ \Carbon\Carbon::parse($agenda->start_date)->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Selesai</strong></td>
                            <td>{{ \Carbon\Carbon::parse($agenda->end_date)->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jam</strong></td>
                            <td>{{ \Carbon\Carbon::parse($agenda->start_time)->format('H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Isi</strong></td>
                            <td>{{ $agenda->activity ?? 'Deskripsi tidak tersedia' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Back Button -->
            <div class="mt-4 mb-4">
                <a href="{{ route('agenda') }}" class="btn btn-primary">
                    Kembali ke Daftar Agenda
                </a>
            </div>
        </div>
    </div>
@endsection
