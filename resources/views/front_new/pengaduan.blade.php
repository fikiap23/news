@extends('front_new.layouts.app')

@section('title', 'Form Pengaduan Masyarakat')

@section('content')
    <div class="py-5">
        <section class="container">
            <h1 class="text-center text-primary mb-5">Form Laporan Masyarakat</h1>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-body p-4">
                    <h4 class="card-title text-center mb-4">Silakan Isi Data Laporan</h4>

                    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label" style="padding-left: 20px">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" required placeholder="Masukkan nama lengkap Anda">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label" style="padding-left: 20px">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required placeholder="Masukkan email Anda">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label" style="padding-left: 20px">No Telepon</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ old('phone') }}" required placeholder="Masukkan nomor telepon Anda">
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label" style="padding-left: 20px">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ old('address') }}" required placeholder="Masukkan alamat Anda">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="district" class="form-label" style="padding-left: 20px">Kecamatan</label>
                                <input type="text" name="district" id="district" class="form-control"
                                    value="{{ old('district') }}" required placeholder="Masukkan kecamatan Anda">
                            </div>
                            <div class="col-md-6">
                                <label for="village" class="form-label" style="padding-left: 20px">Kelurahan</label>
                                <input type="text" name="village" id="village" class="form-control"
                                    value="{{ old('village') }}" required placeholder="Masukkan kelurahan Anda">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label" style="padding-left: 20px">Jenis
                                Laporan</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="complaint" {{ old('type') == 'Pengaduan' ? 'selected' : '' }}>
                                    Pengaduan</option>
                                <option value="appreciation" {{ old('type') == 'Apresiasi' ? 'selected' : '' }}>
                                    Apresiasi</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="message" class="form-label" style="padding-left: 20px">Isi Laporan</label>
                            <textarea name="message" id="message" rows="5" class="form-control" required
                                placeholder="Jelaskan lapoaran Anda">{{ old('message') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label" style="padding-left: 20px">Lampiran Gambar
                                (Opsional)</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <small class="text-muted">Format yang diizinkan: JPG, PNG (max: 2MB)</small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Kirim Laporan</button>
                    </form>
                </div>
            </div>
            <div class="comments-section">
                <h4 class="text-center text-black">Data Laporan Website</h4>

                <form method="GET" action="{{ route('pengaduan') }}" class="mb-4">
                    <div class="row ">
                        <div class="col-md-4">
                            <select name="type" class="form-select" onchange="this.form.submit()">
                                <option value="">-- Semua Jenis --</option>
                                <option value="complaint" {{ request('type') == 'complaint' ? 'selected' : '' }}>Pengaduan
                                </option>
                                <option value="appreciation" {{ request('type') == 'appreciation' ? 'selected' : '' }}>
                                    Apresiasi</option>
                            </select>
                        </div>
                    </div>
                </form>

                @foreach ($pengaduanRespon as $pr)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex mb-3" style="padding: 20px">
                                <img src="{{ asset('assets/image/user.png') }}" alt="User Avatar" class="avatar me-3">
                                <div>
                                    <a href="/detail/{{ $pr->id }}" class="text-decoration-none">
                                        <p class="card-title">
                                            <span style="font-weight: bold;">
                                                @if ($pr->type == 'complaint')
                                                    Pengaduan
                                                @elseif ($pr->type == 'appreciation')
                                                    Apresiasi
                                                @endif
                                            </span>
                                            dari {{ $pr->name }} - Tanggal: {{ $pr->created_at->format('d F Y') }}
                                        </p>
                                        <p class="card-text">{{ $pr->message }}</p>
                                    </a>
                                </div>
                            </div>
                            <div style="padding-left: 20px">
                                <h6 class="text-primary">Jawaban: {{ $pr->name_admin }}</h6>
                                <p>{{ $pr->response_details }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </section>
    </div>
@endsection
