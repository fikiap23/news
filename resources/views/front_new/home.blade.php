@extends('front_new.layouts.app')
@section('title')
    {!! !empty(getSEOTools()->home_title) ? getSEOTools()->home_title : __('messages.details.home') !!}
@endsection
@section('pageCss')
    <link href="{{ asset('front_web/build/scss/home.css') }}" rel="stylesheet" type="text/css">
@endsection
<style>
    /* Inovasi Section */
    .inovasi-section {
        padding: 60px 0;
        background-color: #f7f7f7;
    }

    .inovasi-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ff7300;
        /* Primary Color */
        margin-bottom: 40px;
    }

    .inovasi-section .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .inovasi-section .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Ensures the image covers the card without stretching */
        object-position: center;
        /* Keeps the center of the image visible */
    }

    .inovasi-section .card-body {
        padding: 20px;
    }

    .inovasi-section .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #ff7300;
    }

    .inovasi-section .card-text {
        font-size: 1rem;
        color: #666;
    }

    /* Hover Effect for Cards */
    .inovasi-section .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* Responsive Layout */
    @media (max-width: 768px) {
        .inovasi-section .col-md-6 {
            flex: 1 0 48%;
            /* 2 items per row on medium screens */
        }

        .inovasi-section .col-12 {
            flex: 1 0 100%;
            /* 1 item per row on small screens */
        }
    }

    @media (max-width: 576px) {
        .inovasi-section .col-md-6 {
            flex: 1 0 100%;
            /* 1 item per row on extra small screens */
        }
    }

    /* Cards */
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: transform 0.3s ease;
        opacity: 0;
        /* Start hidden */
        animation: fadeIn 1s ease-out forwards;
        /* Apply fade-in animation */
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #ff7300;
        /* Primary Color */
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }

    .fitur-website {
        background-color: #fff;
        padding: 40px 20px;
        text-align: center;
        opacity: 0;
        /* Start hidden */
        animation: fadeIn 1s ease-out forwards;
    }

    .fitur-website h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ff7300;
        /* Primary Color */
        margin-bottom: 20px;
    }

    .fitur-website p {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 40px;
    }

    /* Fitur Cards */
    .fitur-cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        opacity: 0;
        /* Start hidden */
        animation: fadeIn 1s ease-out forwards;
    }

    .fitur-cards .card {
        background-color: #f9f9f9;
        width: 250px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
        opacity: 0;
        /* Start hidden */
        animation: fadeIn 1s ease-out forwards;
    }

    .fitur-cards .card:hover {
        transform: translateY(-10px);
    }

    .fitur-cards .card-icon {
        font-size: 3rem;
        color: #ff7300;
        /* Primary Color */
        margin-bottom: 20px;
    }

    .fitur-cards .card h4 {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .fitur-cards .card p {
        font-size: 1rem;
        color: #555;
    }

    /* Proses Perizinan Section */
    .proses-perizinan-section {
        background-color: #f7f7f7;
        padding: 60px 0;
    }

    .proses-perizinan-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ff7300;
        /* Primary Color */
        margin-bottom: 20px;
    }

    .proses-perizinan-section p {
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 40px;
    }

    .proses-perizinan-section .row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        /* Add space between items */
    }

    .step {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        opacity: 0;
        /* Start hidden */
        animation: fadeIn 1s ease-out forwards;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        transition: opacity 1s ease-out;
    }

    .step h5 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
        margin-top: 10px;
        white-space: normal;
        /* Ensures text breaks correctly on smaller screens */
    }

    /* FadeIn Animation */
    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .proses-perizinan-section .col-sm-4 {
            flex: 1 0 45%;
            /* 2 items per row on medium screens */
        }

        .proses-perizinan-section .col-md-2 {
            flex: 1 0 45%;
            /* Adjust to 2 items per row on smaller screens */
        }
    }

    @media (max-width: 480px) {
        .proses-perizinan-section .col-sm-4 {
            flex: 1 0 100%;
            /* 1 item per row on very small screens */
        }
    }


    /* Lokasi Section */
    .lokasi-section {
        background-color: #f0f0f0;
        padding: 60px 20px;
        text-align: center;
        opacity: 0;
        animation: fadeIn 1s forwards;
        animation-delay: 1s;
        width: 100%;
    }

    .lokasi-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ff7300;
        /* Primary Color */
        margin-bottom: 30px;
    }

    .lokasi-description {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 40px;
    }

    .map-container {
        position: relative;
        width: 100%;
        /* Full width of the container */
        height: 500px;
        /* Adjust this value for better fit */
        margin: 0 auto;
        opacity: 0;
        animation: fadeIn 1s forwards;
        animation-delay: 1.2s;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 8px;
    }

    /* Responsiveness for mobile */
    @media (max-width: 767px) {
        .lokasi-section {
            padding: 40px 20px;
        }

        .lokasi-section h2 {
            font-size: 2rem;
        }

        .lokasi-description {
            font-size: 1rem;
        }

        .map-container {
            height: 300px;
        }
    }



    /* Responsive Design */
    @media (max-width: 767px) {
        .fitur-cards {
            flex-direction: column;
            gap: 20px;
        }
    }

    /* Fade-in animation */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@section('content')
    <div class="home-page">
        <!-- start hero section -->
        <section class="hero-section">
            <div class="w-full">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $index => $slider)
                            <div class="hero-image carousel-item {{ $index === 0 ? 'active' : '' }} position-relative">
                                <a href="{{ $slider->link ?? '#detailPage' }}">
                                    @if (Str::endsWith($slider->image, ['.mp4', '.avi', '.mov']))
                                        <!-- Video -->
                                        <video style="object-fit: cover; width: 100%; height: 100%;" autoplay loop muted>
                                            <source src="{{ asset($slider->image) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <!-- Image -->
                                        <img src="{{ asset($slider->image) }}"
                                            style="object-fit: cover; width: 100%; height: 100%;"
                                            alt="{{ $slider->title }}" />
                                    @endif
                                </a>
                                <!-- Overlay -->
                                <div class="overlay position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.5);">
                                </div>
                                <div
                                    class="hero-content position-absolute d-flex align-items-center justify-content-center w-100 h-100">
                                    <div class="text-center text-white" style="max-width: 80%; padding: 20px;">
                                        <h1 class="text-white pb-2 fs-1" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">
                                            {{ $slider->title }}</h1>
                                        <p class="fs-10 text-white" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">
                                            {!! $slider->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <i class="icon fa-solid fa-arrow-left text-white"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <i class="icon fa-solid fa-arrow-right text-white"></i>
                    </button>
                </div>
            </div>
        </section>
        <!-- end hero section -->

        <section id="content">
            <div class="content-wrap">
                <div class="container">
                    <section id="profile" class="profile-section py-60">
                        <div class="container">
                            <div class="row align-items-center">
                                <!-- Konten Profil -->
                                <div class="col-md-8">
                                    <div class="profile-content">
                                        <h2 class="text-black mb-3">DPMPTSP KABUPATEN SUMEDANG</h2>
                                        <p class="fs-16 text-gray">
                                            Selamat datang di website DPMPTSP Kab. Website ini di gunakan sebagai salah satu
                                            bentuk memaksimalkan pelayanan publik kepada masyarakat dalam bidang penanaman
                                            modal, perizinan dan non-perizinan di Kab. Sumedang.
                                        </p>
                                        <a href="/visi-misi" class="btn btn-primary mt-3">Detail Profile</a>
                                    </div>
                                </div>
                                <!-- Gambar Profil -->
                                <div class="col-md-4">
                                    <div class="profile-image">
                                        <img src="{{ asset('assets/image/logo_dpmtsp.png') }}" alt="Profile Image"
                                            class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <div class="container">
                    <section id="inovasi" class="inovasi-section py-60">
                        <div class="container">
                            <h2 class="text-center mb-5">Inovasi Pelayanan</h2>
                            <div class="row">
                                <!-- Item 1 -->
                                <div class="col-lg-4 col-md-6 col-12 mb-4" data-aos="fade-up">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/inovasi/mpp.jpg') }}" alt="MPP"
                                            class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">MPP</h5>
                                            <p class="card-text">Mal Pelayanan Publik</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item 2 -->
                                <div class="col-lg-4 col-md-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/inovasi/layanan_online.jpg') }}" alt="Laperon"
                                            class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Laperon</h5>
                                            <p class="card-text">Layanan Perizinan Online</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item 3 -->
                                <div class="col-lg-4 col-md-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="200">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/inovasi/pakta_integritas.jpg') }}"
                                            alt="Pakta Integritas" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Pakta Integritas</h5>
                                            <p class="card-text">Pakta Integritas Elektronik</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item 4 -->
                                <div class="col-lg-4 col-md-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="300">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/inovasi/one_stop_service.jpg') }}"
                                            alt="One Stop Service" class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">One Stop Service</h5>
                                            <p class="card-text">Tidak berhenti di satu layanan, kami berusaha memenuhi
                                                kebutuhan masyarakat dalam berinvestasi di Kab. Sumedang.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item 5 -->
                                <div class="col-lg-4 col-md-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="400">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/inovasi/online_single_subb.jpg') }}" alt="OSS"
                                            class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Online Single Submission</h5>
                                            <p class="card-text">Masyarakat hanya melakukan permohonan perizinan di PTSP
                                                tanpa harus ke Dinas Terkait untuk mendapatkan surat rekomendasi, karena
                                                sistem sudah terintegrasi dengan Dinas terkait.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item 6 -->
                                <div class="col-lg-4 col-md-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="600">
                                    <div class="card h-100">
                                        <img src="{{ asset('images/inovasi/cetak_mandiri.jpg') }}" alt="Cetak Mandiri"
                                            class="card-img-top" />
                                        <div class="card-body">
                                            <h5 class="card-title">Cetak Mandiri</h5>
                                            <p class="card-text">Pelayanan perizinan dan non-perizinan yang memungkinkan
                                                pemohon dapat mengunduh SK perizinan dan mencetaknya secara mandiri.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="fitur-website">
                        <h2>FITUR WEBSITE</h2>
                        <p>Untuk memudahkan pelayanan, kami sertakan fitur sebagai berikut:</p>
                        <div class="fitur-cards">
                            <div class="card">
                                <div class="card-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="card-body">
                                    <h4>Daftar Izin Online</h4>
                                    <p>Pendaftaran pengajuan perizinan dilakukan secara online, dengan cara membuat akun.
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div class="card-body">
                                    <h4>Helpdesk</h4>
                                    <p>Digunakan untuk pusat bantuan, kritik, saran atau pengaduan.</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="card-body">
                                    <h4>Tracking Izin</h4>
                                    <p>Digunakan untuk penelusuran status proses pengajuan permohonan izin.</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="card-body">
                                    <h4>Grafik Investasi</h4>
                                    <p>Mempresentasikan potensi dan investasi di Kab. Sumedang dalam bentuk data dan grafik.
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="card-body">
                                    <h4>Persyaratan Izin</h4>
                                    <p>Persyaratan yang harus dilengkapi ketika mengajukan permohonan perizinan dan
                                        non-perizinan.</p>
                                </div>
                            </div>
                            <!-- New Validasi SK Card -->
                            <div class="card">
                                <div class="card-icon">
                                    <i class="fas fa-check-circle"></i> <!-- Icon for validation -->
                                </div>
                                <div class="card-body">
                                    <h4>Validasi SK</h4>
                                    <p>Fitur untuk memverifikasi dan mengecek keabsahan Surat Keputusan (SK) yang diajukan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="proses-perizinan" class="proses-perizinan-section py-60">
                        <h2 class="text-center mb-5">Tahapan Proses Perizinan</h2>
                        <p class="text-center mb-5">Berikut adalah proses sederhana dari pengajuan permohonan perizinan di
                            Kabupaten Sumedang</p>
                        <div class="row text-center">
                            <div class="col-md-2 col-sm-4 mb-4">
                                <div class="step">
                                    <i class="fas fa-pen-alt fa-3x mb-3" style="color: #ff7300;"></i>
                                    <h5>DAFTAR</h5>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 mb-4">
                                <div class="step">
                                    <i class="fas fa-check-circle fa-3x mb-3" style="color: #ff7300;"></i>
                                    <h5>VERIFIKASI</h5>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 mb-4">
                                <div class="step">
                                    <i class="fas fa-map-marker-alt fa-3x mb-3" style="color: #ff7300;"></i>
                                    <h5>SURVEY</h5>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 mb-4">
                                <div class="step">
                                    <i class="fas fa-signature fa-3x mb-3" style="color: #ff7300;"></i>
                                    <h5>PENANDATANGAN</h5>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 mb-4">
                                <div class="step">
                                    <i class="fas fa-file-invoice-dollar fa-3x mb-3" style="color: #ff7300;"></i>
                                    <h5>RETRIBUSI</h5>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 mb-4">
                                <div class="step">
                                    <i class="fas fa-check fa-3x mb-3" style="color: #ff7300;"></i>
                                    <h5>SELESAI</h5>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- start latest-news-section -->
                @if (isset($latestPosts) && !$latestPosts->isEmpty())
                    <div class="container">
                        <section class="latest-news-section pt-60">
                            <div class="section-heading border-bottom-0">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 section-heading-left">
                                        <h2 class="text-black mb-0">{{ __('messages.details.latest_news') }}</h2>
                                    </div>
                                    <div class=" col-sm-6 text-end">
                                        <a href="{{ route('allPosts') }}"
                                            class="fs-14 btn fw-6">{{ __('messages.details.view_more') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="latest-news-post pt-40">
                                <div class="row">
                                    @foreach ($latestPosts as $latestPost)
                                        <div class="col-lg-3 col-md-4 col-sm-6 pb-lg-0 pb-sm-3">
                                            <div class="card position-relative p-2">
                                                <div class="news-post-image rounded-10">
                                                    <a href="{{ route('detailPage', $latestPost->slug) }}">
                                                        {{--                                                            <img data-src="{{$latestPost->post_image}}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="w-100 h-100 lazy"> --}}
                                                        @if ($latestPost->post_types == \App\Models\Post::AUDIO_TYPE_ACTIVE)
                                                            <button class="common-music-icon all-posts-music-icon"
                                                                type="button">
                                                                <i class="icon fa-solid fa-music text-white "></i>
                                                            </button>
                                                            <img src="{{ $latestPost->post_image }}" class="w-100 h-100"
                                                                alt="" />
                                                        @elseif($latestPost->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE)
                                                            @php
                                                                $thumbUrl =
                                                                    !empty($latestPost->postVideo) &&
                                                                    !empty($latestPost->postVideo->thumbnail_image_url)
                                                                        ? $latestPost->postVideo->thumbnail_image_url
                                                                        : null;
                                                                $thumbImage =
                                                                    !empty($latestPost->postVideo) &&
                                                                    !empty($latestPost->postVideo->uploaded_thumb)
                                                                        ? $latestPost->postVideo->uploaded_thumb
                                                                        : asset('front_web/images/default.jpg');
                                                            @endphp
                                                            <button class="common-music-icon all-posts-music-icon"
                                                                type="button">
                                                                <i class="icon fa-solid fa-play text-white "></i>
                                                            </button>
                                                            <img src="{{ !empty($thumbUrl) ? $thumbUrl : $thumbImage }}"
                                                                class="w-100 h-100" alt="" />
                                                        @else
                                                            <img src="{{ $latestPost->post_image }}" class="w-100 h-100"
                                                                alt="" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <a href="{{ route('categoryPage', $latestPost->category->slug) }}"
                                                    class="tags position-absolute fw-7">{{ $latestPost->category->name }}</a>
                                                <div class="news-post-content">
                                                    <h3 class="text-black py-2 fw-7 mb-0 ">
                                                        <a href="{{ route('detailPage', $latestPost->slug) }}"
                                                            class="text-black py-2 fw-7">{!! $latestPost->title !!}</a>
                                                    </h3>
                                                    <p class="fs-14 text-gray mb-0 pb-2">
                                                        {!! Str::limit($latestPost->description, 220) !!}
                                                    </p>
                                                    <div class="desc d-flex">

                                                        <p class="fs-14 text-black mb-0"><a
                                                                href="{{ route('userDetails', $latestPost->user->username ?? $latestPost->user->id) }}"
                                                                class="text-black">{{ __('messages.common.by') }}
                                                                {{ $latestPost->user->full_name }}</a>
                                                        </p>
                                                        <span class=" text-primary  px-2"> | </span>
                                                        <p class="fs-14 text-black mb-0">
                                                            {{ ucfirst(__('messages.common.' . strtolower($latestPost->created_at->format('M')))) }}
                                                            {{ $latestPost->created_at->format('d , Y') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                @endif
                <!-- end latest-news-section -->

                <div class="container-fluid">
                    <section class="lokasi-section">
                        <h2>Lokasi Kami</h2>
                        <p class="lokasi-description">
                            Temukan kami di alamat berikut untuk mendapatkan pelayanan terbaik dan informasi lebih lanjut
                            mengenai layanan kami.
                        </p>

                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.251526879751!2d107.91824897420888!3d-6.860429167118236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68d110d776cc7b%3A0x59e7d0b55b7ce695!2sMPP%20Mal%20Pelayanan%20Publik%20-%20(DPMPTSP)%20Kabupaten%20Sumedang!5e0!3m2!1sid!2sid!4v1733183546598!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{ mix('assets/js/front/home.js') }}"></script>
@endsection
