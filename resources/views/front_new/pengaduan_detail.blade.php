@extends('front_new.layouts.app')

@section('title', 'Detail Pengaduan Masyarakat')

@section('content')
    <div class="py-5">
        <section class="container">
            <h1 class="text-center text-primary mb-5">Detail
                @if ($pengaduan->type == 'complaint')
                    Pengaduan
                @elseif ($pengaduan->type == 'appreciation')
                    Apresiasi
                @endif
                dari {{ $pengaduan->name }}
            </h1>

            <div class="card shadow">
                <div class="card-body p-4">
                    <h4 class="card-title mb-4">
                        @if ($pengaduan->type == 'complaint')
                            Pengaduan
                        @elseif ($pengaduan->type == 'appreciation')
                            Apresiasi
                        @endif
                        dari {{ $pengaduan->name }}
                    </h4>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{ $pengaduan->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $pengaduan->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">No Telepon</th>
                                <td>{{ $pengaduan->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>{{ $pengaduan->address }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kecamatan</th>
                                <td>{{ $pengaduan->district }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kelurahan</th>
                                <td>{{ $pengaduan->village }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Pengaduan</th>
                                <td>{{ $pengaduan->created_at->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Isi Laporan</th>
                                <td>{{ $pengaduan->message }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @if ($pengaduan->image)
                        <div class="mb-4">
                            <h5>Lampiran Gambar:</h5>
                            <img src="{{ asset('storage/' . $pengaduan->image) }}" alt="Lampiran"
                                class="img-fluid rounded shadow">
                        </div>
                    @endif

                    @if ($pengaduan->response_details)
                        <div class="mt-5">
                            <h5 class="text-primary">Jawaban Admin:</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Dijawab oleh</th>
                                        <td>{{ $pengaduan->name_admin }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Isi Jawaban</th>
                                        <td>{{ $pengaduan->response_details }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('pengaduan') }}" class="btn btn-primary">Kembali ke Daftar Pengaduan</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
