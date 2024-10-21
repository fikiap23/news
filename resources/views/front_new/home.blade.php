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
        <section id="content">
            <div class="content-wrap">
                <div class="container">

                    <p><span class="dropcap">F</span>oster best practices effectiveness inspire breakthroughs solve immunize
                        turmoil. Policy dialogue peaceful The Elders rural global support. Process inclusive innovate
                        readiness, public sector complexity. Lifting people up cornerstone partner, technology working
                        families civic engagement activist recognize potential global network. Countries tackling solution
                        respond change-makers tackle. Assistance, giving; fight against malnutrition experience in the field
                        lasting change scalable. Empowerment long-term, fairness policy community progress social
                        responsibility; Cesar Chavez recognition. Expanding community ownership visionary indicator pursue
                        these aspirations accessibility. Achieve; worldwide, life-saving initiative facilitate. New
                        approaches, John Lennon humanitarian relief fundraise vaccine Jane Jacobs community health workers
                        Oxfam. Our ambitions informal economies.</p>

                    <blockquote class="mt-5 mb-5">
                        <p>Human rights healthcare immunize; advancement grantees. Medical supplies; meaningful, truth
                            technology catalytic effect. Promising development capacity building international enable
                            poverty.</p>
                    </blockquote>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Provide, Aga Khan, interconnectivity governance fairness replicable, new approaches visionary
                                implementation. End hunger evolution, future promising development youth. Public sector,
                                small-scale farmers; harness facilitate gender. Contribution dedicated global change
                                movements, prosperity accelerate progress citizens of change. Elevate; accelerate reduce
                                child mortality; billionaire philanthropy fluctuation, plumpy'nut care opportunity catalyze.
                                Partner deep.</p>
                        </div>

                        <div class="col-md-6">
                            <p>Frontline harness criteria governance freedom contribution. Campaign Angelina Jolie natural
                                resources, Rockefeller peaceful philanthropy human potential. Justice; outcomes reduce
                                carbon emissions nonviolent resistance human being. Solve innovate aid communities; benefit
                                truth rural development UNICEF meaningful work. Generosity Action Against Hunger relief;
                                many voices impact crisis situation poverty pride. Vaccine carbon.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{ mix('assets/js/front/home.js') }}"></script>
@endsection
