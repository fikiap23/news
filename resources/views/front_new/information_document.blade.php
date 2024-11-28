@extends('front_new.layouts.app')

@section('title', 'Agenda')

@section('content')
    <div class="container my-5">
        <!-- Start header section -->
        <section class="text-center py-5" style="background: linear-gradient(135deg, #ff7300, #f3d49b); color: #fff;">
            <div class="container">
                <h1 class="display-5 fw-bold">Dokumen Informasi</h1>
                <p class="lead">Lihat dokumen informasi terkini untuk berbagai kebutuhan Anda</p>
            </div>
        </section>
        <!-- End header section -->

        <div class="row mt-5">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Search Bar -->
                <div class="mb-4">
                    <div class="input-group shadow-sm">
                        <input type="text" class="form-control" placeholder="Cari dokumen...">
                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Card 1 -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">
                            <i class="bi bi-journal-text me-2"></i> Regulasi
                        </h5>
                        <p class="text-muted mb-2">
                            <small>
                                <i class="bi bi-person-circle"></i> Atykus &nbsp; | &nbsp;
                                <i class="bi bi-briefcase"></i> Semua Bidang &nbsp; | &nbsp;
                                <i class="bi bi-calendar2"></i> 12 Jan 2015
                            </small>
                        </p>
                        <p>Regulasi Dinas Penanaman Modal dan Perizinan Terpadu Satu Pintu</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Detail <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">
                            <i class="bi bi-journal-text me-2"></i> Publikasi Data
                        </h5>
                        <p class="text-muted mb-2">
                            <small>
                                <i class="bi bi-person-circle"></i> Harry Ridwan Ramadan &nbsp; | &nbsp;
                                <i class="bi bi-briefcase"></i> Semua Bidang &nbsp; | &nbsp;
                                <i class="bi bi-calendar2"></i> 12 Jan 2015
                            </small>
                        </p>
                        <p>Publikasi Data Penanaman Modal dan Perizinan Terpadu Satu Pintu</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            Detail <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold">Dokumen Informasi</h5>
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="bi bi-folder-fill text-primary me-2"></i> Regulasi
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="bi bi-folder-fill text-primary me-2"></i> Publikasi Data
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="bi bi-folder-fill text-primary me-2"></i> Lainnya
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        /* Typography Improvements */
        h1,
        h5 {
            font-family: 'Poppins', sans-serif;
        }

        .lead {
            font-size: 1.1rem;
            font-weight: 400;
        }

        /* Card Styling */
        .card {
            border-radius: 10px;
        }

        .card-title {
            font-size: 1.2rem;
        }

        .card-body p {
            font-size: 0.95rem;
        }

        /* Sidebar Links */
        .list-group-item {
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .list-group-item a:hover {
            color: #007bff;
            text-decoration: none;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }

            .lead {
                font-size: 0.95rem;
            }
        }
    </style>
@endsection
