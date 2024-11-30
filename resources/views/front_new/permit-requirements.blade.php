@extends('front_new.layouts.app')

@section('title', 'Daftar Jenis Izin')

@section('content')
    <div class="container mt-4">
        <!-- Start header section -->
        <section class="text-center py-5" style="background: linear-gradient(135deg, #ff7300, #f3d49b); color: #fff;">
            <div class="container">
                <h1 class="display-5 fw-bold">Daftar Jenis Izin</h1>
                <p class="lead">Daftar Jenis Perizinan dan Non Perizinan</p>
            </div>
        </section>
        <!-- End header section -->

        <!-- Daftar Jenis Perizinan Table Section -->
        <div class="mt-5">
            <h2 class="mb-4">Daftar Jenis Perizinan</h2>
            <div class="table-responsive">
                <table id="jenisIzinTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Jenis Izin</th>
                            <th>Durasi (Hari)</th>
                            <th>Bidang Izin</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permitRequirements as $index => $pr)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pr->permit_type_name }}</td>
                                <td>{{ $pr->duration_days }}</td>
                                <td>{{ $pr->permit_field }}</td>
                                <td><a class="btn btn-outline-primary btn-sm" href="{{ $pr->requirement_link }}"
                                        target="_blank">Lihat Persyaratan</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        /* Add these styles for a better design */
        .table th,
        .table td {
            vertical-align: middle;
        }

        .table thead {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .table th {
            border-top: 2px solid #dee2e6;
            border-bottom: 2px solid #dee2e6;
        }

        .table td {
            border-bottom: 1px solid #dee2e6;
        }

        /* Hover effect on table rows */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Optional: Shadow effect on the table container */
        .table-responsive {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
