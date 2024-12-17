@extends('front_new.layouts.app')

@section('title', 'Agenda')

@section('content')
    <div class="container mt-4">
        <!-- Start header section -->
        <section class="text-center py-5" style="background: linear-gradient(135deg, #ff7300, #f3d49b); color: #fff;">
            <div class="container">
                <h1 class="display-5 fw-bold">Agenda</h1>
                <p class="lead">Lihatlah Acara dan Agenda Mendatang</p>
            </div>
        </section>
        <!-- End header section -->

        <!-- Agenda Table Section -->
        <div class="mt-5">
            <h2 class="mb-4">Daftar Agenda</h2>
            <table class="table table-bordered text-black">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tema</th>
                        <th>Tempat</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendas as $key => $agenda)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $agenda->theme }}</td>
                            <td>{{ $agenda->place }}</td>
                            <td>{{ \Carbon\Carbon::parse($agenda->start_date)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($agenda->end_date)->format('Y-m-d') }}</td>
                            <td>
                                <a href="/agenda/detail/{{ $agenda->id }}" class="btn btn-primary btn-sm">
                                    Lihat
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
