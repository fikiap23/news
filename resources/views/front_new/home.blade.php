@extends('front_new.layouts.app')
@section('title')
    {!! !empty(getSEOTools()->home_title) ? getSEOTools()->home_title : __('messages.details.home') !!}
@endsection
@section('pageCss')
    <link href="{{ asset('front_web/build/scss/home.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="home-page">
        <!-- start hero section -->
        <section class="hero-section">
            <div class="w-full">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="hero-image carousel-item active position-relative">
                            <a href="#detailPage">
                                <img src="/assets/image/slider/ptsp.jpg" class="w-100 h-100" alt="Image 1" />
                            </a>
                            <!-- Overlay -->
                            <div class="overlay position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.5);">
                            </div>
                            <div
                                class="hero-content position-absolute d-flex align-items-center justify-content-center w-100 h-100">
                                <div class="text-center text-white" style="max-width: 80%; padding: 20px;">
                                    <h1 class="text-white pb-2 fs-1" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">
                                        DPMPTSP KABUPATEN SUMEDANG</h1>
                                    <p class="fs-10 text-white" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">
                                        Selamat datang di website DPMPTSP Kab. Website ini digunakan sebagai salah satu
                                        bentuk
                                        memaksimalkan pelayanan publik kepada masyarakat dalam bidang penanaman modal,
                                        perizinan,
                                        dan non-perizinan di Kab. Sumedang.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="hero-image carousel-item position-relative">
                            <a href="#detailPage">
                                <img src="/assets/image/slider/fotbar.jpg" class="w-100 h-100" alt="Image 2" />
                            </a>
                            <!-- Overlay -->
                            <div class="overlay position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.5);">
                            </div>
                            <div
                                class="hero-content position-absolute d-flex align-items-center justify-content-center w-100 h-100">
                                <div class="text-center text-white" style="max-width: 80%; padding: 20px;">
                                    <h1 class="text-white pb-2 fs-1" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">
                                        DPMPTSP KABUPATEN SUMEDANG</h1>
                                    <p class="fs-10 text-white" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">
                                        Selamat datang di website DPMPTSP Kab. Website ini digunakan sebagai salah satu
                                        bentuk
                                        memaksimalkan pelayanan publik kepada masyarakat dalam bidang penanaman modal,
                                        perizinan,
                                        dan non-perizinan di Kab. Sumedang.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="hero-image carousel-item position-relative">
                            <a href="#detailPage">
                                <img src="/assets/image/post-image/post-16.jpg" class="w-100 h-100" alt="Image 3" />
                            </a>
                            <!-- Overlay -->
                            <div class="overlay position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.5);">
                            </div>
                            <div
                                class="hero-content position-absolute d-flex align-items-center justify-content-center w-100 h-100">
                                <div class="text-center text-white" style="max-width: 80%; padding: 20px;">
                                    <h1 class="text-white pb-2 fs-1" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">
                                        DPMPTSP KABUPATEN SUMEDANG</h1>
                                    <p class="fs-10 text-white" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">
                                        Selamat datang di website DPMPTSP Kab. Website ini digunakan sebagai salah satu
                                        bentuk
                                        memaksimalkan pelayanan publik kepada masyarakat dalam bidang penanaman modal,
                                        perizinan,
                                        dan non-perizinan di Kab. Sumedang.
                                    </p>
                                </div>
                            </div>
                        </div>
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
        </section>
    @endsection
    @section('script')
        {{--    <script src="{{ mix('assets/js/front/home.js') }}"></script> --}}
    @endsection
