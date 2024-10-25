@extends('front_new.layouts.app')
@section('title')
    Visi, Misi, Moto & Maklumat Pelayanan
@endsection

@section('content')
    <div class="py-5">
        <!-- start header section -->
        <section class="bg-primary text-white text-center py-5">
            <div class="container">
                <h1 class="display-6 font-weight-bold">Visi, Misi, Moto & Maklumat Pelayanan</h1>
                <p class="lead mb-0">Pelayanan terbaik dengan sepenuh hati untuk masyarakat.</p>
            </div>
        </section>
        <!-- end header section -->

        <!-- start visi misi-section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Visi Pelayanan -->
                    <div class="col-xl-9 text-center mb-5">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body py-5 bg-white">
                                <blockquote class="blockquote mb-0">
                                    <h2 class="text-primary mb-4">Visi Pelayanan</h2>
                                    <p class="lead font-italic">
                                        “Menjadi Perangkat Daerah terdepan dalam penyelenggaraan pelayanan publik yang
                                        cepat, transparan, sinergis dan berintegritas.”
                                    </p>
                                    <p></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <!-- Misi Pelayanan -->
                    <div class="col-xl-9 text-center mb-5">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body py-5 bg-white">
                                <blockquote class="blockquote mb-0">
                                    <h2 class="text-primary mb-4">Misi Pelayanan</h2>
                                    <ul class="list-unstyled text-start lead">
                                        <li class="mb-3">
                                            <i class="fas fa-quote-left text-primary fa-lg me-2"></i> Meningkatkan kualitas
                                            sumberdaya manusia penyelenggara pelayanan.
                                        </li>
                                        <li class="mb-3">
                                            <i class="fas fa-quote-left text-primary fa-lg me-2"></i> Meningkatkan sarana
                                            dan
                                            prasarana pelayanan.
                                        </li>
                                        <li class="mb-3">
                                            <i class="fas fa-quote-left text-primary fa-lg me-2"></i> Menjalin sinergitas
                                            dalam
                                            pelaksanaan tugas dengan perangkat daerah teknis.
                                        </li>
                                        <li class="mb-3">
                                            <i class="fas fa-quote-left text-primary fa-lg me-2"></i> Mewujudkan
                                            akuntabilitas
                                            kinerja, transparansi, dan efektivitas dalam penyelenggaraan pelayanan.
                                        </li>
                                    </ul>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <!-- Moto Pelayanan -->
                    <div class="col-xl-9 text-center mb-5">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body py-5 bg-white">
                                <blockquote class="blockquote">
                                    <h2 class="text-primary mb-4">Moto Pelayanan</h2>
                                    <p class="font-weight-bold lead display-6">“MELAYANI DENGAN SEPENUH HATI”</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <!-- Maklumat Pelayanan -->
                    <div class="col-xl-9 text-center mb-5">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body py-5 bg-white">
                                <h2 class="text-primary mb-4">Maklumat Pelayanan</h2>
                                <div class="text-center">
                                    <img src="{{ asset('assets/image/maklumat.jpg') }}" alt="Maklumat Pelayanan"
                                        class="img-fluid rounded shadow-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end visi misi-section -->
    </div>
@endsection
