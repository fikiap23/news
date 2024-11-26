@extends('front_new.layouts.app')

@section('title', 'Form Pengaduan Masyarakat')

@section('content')
    <div class="py-5">
        <section class="container">
            <h1 class="text-center text-primary mb-5">Form Pengaduan Masyarakat</h1>

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
                    <h4 class="card-title text-center mb-4">Silakan Isi Data Pengaduan</h4>

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
                            <label for="message" class="form-label" style="padding-left: 20px">Isi Pengaduan</label>
                            <textarea name="message" id="message" rows="5" class="form-control" required
                                placeholder="Jelaskan pengaduan Anda">{{ old('message') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label" style="padding-left: 20px">Lampiran Gambar
                                (Opsional)</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <small class="text-muted">Format yang diizinkan: JPG, PNG (max: 2MB)</small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Kirim Pengaduan</button>
                    </form>
                </div>
            </div>
            <div class="comments-section">
                <h4 class="text-center text-black">Data Pengaduan Website</h4>

                @foreach ($comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex mb-3" style="padding: 20px">
                                <img src="{{ asset('assets/image/user.png') }}" alt="User Avatar" class="avatar me-3">
                                <div>
                                    <a href="/detail/{{ $comment->id }}" class="text-decoration-none">
                                        <h5 class="card-title">
                                            Pengaduan dari {{ $comment->user_name }} - Tanggal:
                                            {{ $comment->created_at->format('d F Y') }}
                                        </h5>
                                        <p class="card-text">{{ $comment->short_description }}</p>
                                    </a>
                                </div>
                            </div>
                            <div style="padding-left: 20px">
                                <h6 class="text-primary">Jawaban: {{ $comment->response }}</h6>
                                <p>{{ $comment->response_details }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
    </div>
@endsection
