<!--start top-bar-section -->
<section class="top-bar-section py-lg-2 py-3 top-bar">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-1 col-sm-3 col-3 ">
                <a href="/" class="top-bar-logo ">
                    <img src="{{ $settings['logo'] }}" alt="" style="width: 130px" />
                </a>
            </div>
            <div class="col-xl-7 col-md-8 col-9 ">
                <div class="row align-items-center justify-content-end">
                    <div class="col-xl-8 col-lg-8 br-gray py-1 d-lg-block d-none">
                        <div class="d-flex gap-4">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-envelope fa-lg"
                                    style="color: black; margin-right: 10px; font-size: 30px"></i>
                                <div class="d-flex flex-column" style="font-size: 12px">
                                    <span>Kirim Email</span>
                                    <span style="color: #ff7300">dpmptsp@sumedangkab.go.id</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center" style="font-size: 12px">
                                <i class="fa-solid fa-phone fa-lg"
                                    style="color: black; margin-right: 10px; font-size: 30px"></i>
                                <div class="d-flex flex-column">
                                    <span>Hubungi Kami</span>
                                    <span style="color: #ff7300">0821-1617-1515</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="col-xl-2 col-lg-2 col-sm-6  d-flex flex-wrap justify-content-sm-between justify-content-end align-items-center">
                        <div
                            class="col-xl-2 col-lg-2 col-sm-6  d-flex flex-wrap justify-content-sm-between justify-content-end align-items-center">
                            <a href="javascript:void(0)" data-turbo="false" title="Switch to Light mode"
                                onclick="myFunction()">
                                <i id="dark-mode-landing"
                                    class="fa-solid fa-moon text-primary fs-2 apply-dark-mode"></i>
                            </a>
                        </div>

                        <button class="dropdown border-0 bg-transparent position-relative me-2 d-lg-none" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <a href="javascript:void(0)"><i class="fa-solid fa-magnifying-glass fs-15"></i></a>
                        </button>
                        <div class="dropdown-menu mobile-search">
                            <form action="{{ route('allPosts') }}" class="form search-form-box search-input">
                                <div class="form-group border-0 search-input">
                                    <input type="text" name="search" id="search" placeholder="Search..."
                                        class="form-control bg-light rt-search-control custom-input-control search-input mb-0"
                                        value="">
                                    <button type="submit" class="search-submit custom-submit search-input">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="offcanvas-toggle d-lg-none d-block">
                            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasToggle"
                                aria-controls="offcanvasToggle">
                                <i class="fa-solid fa-bars "></i>
                            </a>
                            <div class="offcanvas-wrapper offcanvas-wrapper-start" tabindex="-1" id="offcanvasToggle"
                                aria-labelledby="offcanvasToggleLabel">
                                <div class="offcanvas-content m-0">
                                    <div class="text-end">
                                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasToggle"
                                            aria-controls="offcanvasToggle">
                                            <i class="fa fa-close text-black fs-5 m-2 me-3"></i>
                                        </a>
                                    </div>
                                    <div class="set">
                                        <a href="/" class="fs-14 fw-6 {{ Request::is('/') ? 'active' : '' }}">
                                            {{ __('messages.home') }}
                                        </a>
                                    </div>
                                    @php
                                        $nav = getHeaderElement();
                                    @endphp
                                    <div class="set">
                                        <a href="/category/some-category-slug" class="fs-14 fw-6">Category Name 1</a>
                                        <a href="#" class="p-0" data-turbo="false"><i
                                                class="fa fa-plus"></i></a>
                                        <div class="content">
                                            <li><a class="fs-14 fw-6"
                                                    href="/category/some-category-slug/sub-category-1">Subcategory Name
                                                    1</a></li>
                                            <li><a class="fs-14 fw-6"
                                                    href="/category/some-category-slug/sub-category-2">Subcategory Name
                                                    2</a></li>
                                        </div>
                                    </div>

                                    <div class="set">
                                        <a href="/category/another-category-slug" class="fs-14 fw-6">Category Name 2</a>
                                        <a href="#" class="p-0" data-turbo="false"><i
                                                class="fa fa-plus"></i></a>
                                        <div class="content">
                                            <li><a class="fs-14 fw-6"
                                                    href="/category/another-category-slug/sub-category-3">Subcategory
                                                    Name 3</a></li>
                                            <li><a class="fs-14 fw-6"
                                                    href="/category/another-category-slug/sub-category-4">Subcategory
                                                    Name 4</a></li>
                                        </div>
                                    </div>

                                    <div class="set">
                                        <a href="/category/third-category-slug" class="fs-14 fw-6">Category Name 3</a>
                                        <a href="#" class="p-0" data-turbo="false"><i
                                                class="fa fa-plus"></i></a>
                                        <div class="content">
                                            <li><a class="fs-14 fw-6"
                                                    href="/category/third-category-slug/sub-category-5">Subcategory
                                                    Name 5</a></li>
                                            <li><a class="fs-14 fw-6"
                                                    href="/category/third-category-slug/sub-category-6">Subcategory
                                                    Name 6</a></li>
                                        </div>
                                    </div>


                                    <div class="set">
                                        <a href="{{ route('galleryPage') }}"
                                            class="fs-14 fw-6 {{ Request::is('g') || Request::is('g/*') ? 'active' : '' }}">
                                            {{ __('messages.details.gallery') }}
                                        </a>
                                    </div>
                                    <div class="set">
                                        <a href="{{ route('contact.index') }}"
                                            class="fs-14 fw-6 {{ 'Contact' == ucfirst(last(request()->segments())) ? 'active' : '' }}">
                                            {{ __('messages.details.contact_us') }}
                                        </a>
                                    </div>
                                    <div class="set">
                                        @if ($nav['pages']->count() > 0)
                                            <a href="javascript:void(0)"
                                                class="fs-14 fw-6 {{ 'Pages' == ucfirst(last(request()->segments())) ? 'active' : '' }}">
                                                {{ __('messages.pages') }}
                                            </a>
                                            <a href="#" class="p-0" data-turbo="false><i class=" fa
                                                fa-plus"></i></a>
                                        @endif
                                        <div class="content">
                                            @foreach ($nav['pages'] as $page)
                                                <li>
                                                    <a href="{{ route('pages.show-page-slug', $page->slug) }}"
                                                        class="fs-14 fw-6">
                                                        {!! $page->name !!}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if (getLogInUser())
                                        <div class="set">
                                            <a href="javascript:void(0)" class="fs-14 fw-6">
                                                {{ getLogInUser()->last_name }}
                                            </a>
                                            <a href="#" class="p-0" data-turbo="false><i class=" fa
                                                fa-plus"></i></a>
                                            <div class="content">
                                                <li>
                                                    <a href="{{ route('admin.dashboard') }}" class="fs-14 fw-6"
                                                        data-turbo="false">
                                                        {{ __('messages.details.admin_panel') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <form id="logout-form" action="{{ url('/logout') }}"
                                                        method="post">
                                                        @csrf
                                                    </form>
                                                    <a href="{{ url('logout') }}" class="fs-14 fw-6"
                                                        onclick="event.preventDefault();
                                        localStorage.clear();  document.getElementById('logout-form').submit();">
                                                        {{ __('messages.details.logout') }}
                                                    </a>
                                                </li>
                                            </div>
                                        </div>
                                    @else
                                        <div class="set">
                                            <a href="{{ route('login') }}"
                                                class="fs-14 fw-6 {{ 'Contact' == ucfirst(last(request()->segments())) ? 'active' : '' }}"
                                                data-turbo="false">
                                                {{ __('messages.common.login') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--end top-bar-section -->

<!-- start header section -->
<header class="bg-white d-lg-block d-none header border-top border-gray-50">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-11 col-12">
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link fs-14 fw-6 d-flex flex-column justify-content-center align-items-center text-black"
                                aria-current="page" href="/">
                                <span class="" style="margin-left: 30px">Home</span>
                                <span class="text-gray" style=" font-size: 12px ; margin-left: 30px">Beranda</span>
                            </a>
                        </li>
                        <li class="border-gray border-end"
                            style="border-width: 1px; height: 30px; align-self: center"></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link fs-14 fw-6 d-flex flex-column justify-content-center align-items-center text-black"
                                aria-current="page" href="/">
                                <span class="" style="margin-left: 30px">Profile</span>
                                <span class="text-gray" style=" font-size: 12px ; margin-left: 30px">Profile
                                    Dinas</span>
                            </a>
                            <ul class="dropdown-nav ps-0">
                                <li><a class="fs-14 fw-6" href="/page1">Sejarah</a></li>
                                <li><a class="fs-14 fw-6" href="/visi-misi">Visi & Misi</a></li>
                                <li><a class="fs-14 fw-6" href="/organizational-structure">Struktur Organisasi</a>
                                </li>
                                <li><a class="fs-14 fw-6" href="/page2">Tugas Pokok dan Fungsi</a></li>
                                <li><a class="fs-14 fw-6" href="/page2">Daftar Pegawai</a></li>
                                <li><a class="fs-14 fw-6" href="/page2">Prestasi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link fs-14 fw-6 d-flex flex-column justify-content-center align-items-center text-black"
                                aria-current="page" href="/">
                                <span class="" style="margin-left: 30px">Pelayanan</span>
                                <span class="text-gray" style=" font-size: 12px ; margin-left: 30px">Pelayanan
                                    Perizinan</span>
                            </a>
                            <ul class="dropdown-nav ps-0">
                                <li><a class="fs-14 fw-6" href="/service-standard">Standar Pelayanan</a></li>
                                <li><a class="fs-14 fw-6" href="/page1">Persyaratan Izin</a></li>
                                <li><a class="fs-14 fw-6" href="/page1">Grafik investasi</a></li>
                                <li><a class="fs-14 fw-6" href="/page1">Statistik harian perizinan</a></li>
                                <li><a class="fs-14 fw-6" href="/visi-misi">Tracking Izin</a></li>
                                <li><a class="fs-14 fw-6" href="/page2">Validasi SK</a></li>
                                <li><a class="fs-14 fw-6" href="/page2">Potensi dan Investasi</a></li>
                                <li><a class="fs-14 fw-6" href="/page2">Lowongan Pekerjaan</a></li>
                            </ul>
                        </li>
                        <li class="border-gray border-end"
                            style="border-width: 1px; height: 30px; align-self: center"></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link fs-14 fw-6 d-flex flex-column justify-content-center align-items-center text-black"
                                aria-current="page" href="/">
                                <span class="" style="margin-left: 30px">Informasi</span>
                                <span class="text-gray" style=" font-size: 12px ; margin-left: 30px">Informasi</span>
                            </a>
                            <ul class="dropdown-nav ps-0">
                                <li><a class="fs-14 fw-6" href="/news">Berita</a></li>
                                <li><a class="fs-14 fw-6" href="http://localhost/lapor/public">Pengaduan
                                        Masyarakat</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14 fw-6 mt-2" href="https://sipetis.sumedangkab.go.id"
                                id="sipetis" target="_blank"><img style="height: 20px;"
                                    src="https://sipetis.sumedangkab.go.id/assets/media/logos/sipetis-dark.png"
                                    alt="Canvas Logo"></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-1">
                <div class="dropdown header-icon d-lg-flex  justify-content-end d-none position-relative">
                    <button class="dropdown-toggle border-0 bg-transparent position-relative me-4" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <a href="javascript:void(0)"><i class="fa-solid fa-magnifying-glass fs-20 "></i></a>
                    </button>
                    <div class="dropdown-menu">
                        <form action="{{ route('allPosts') }}" class="form search-form-box search-input">
                            <div class="form-group border-0 search-input">
                                <input type="text" name="search" id="search"
                                    placeholder="{{ __('messages.search') }}"
                                    class="form-control bg-light rt-search-control custom-input-control search-input mb-0"
                                    value="">
                                <button type="submit" class="search-submit custom-submit search-input">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                        aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars  fs-20"></i>
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <a type="button" class="closebtn text-reset text-black" data-bs-dismiss="offcanvas"
                            aria-label="Close">&times;</a>
                        <div class="offcanvas-content pt-60">
                            <div class="news-logo mb-5">
                                <a href="/">
                                    <img src="{{ $settings['logo'] }}" alt="" style="width: 130px" />
                                </a>
                            </div>
                            <div class="contact-desc">
                                <h3 class="text-black fw-7 mb-4">{{ __('messages.setting.contact_information') }}</h3>
                                <div class="desc d-flex  mb-4">
                                    <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-location-dot  text-white"></i>
                                    </div>
                                    <a class="fs-14 text-black mb-0  ps-4">{!! $settings['contact_address'] !!}</a>
                                </div>
                                <div class="desc d-flex align-items-sm-center mb-4">
                                    <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-envelope  text-white"></i>
                                    </div>
                                    <a href="{{ 'mailto:' . $settings['email'] }}"
                                        class="fs-14 text-black mb-0  ps-4 d-flex  align-items-center"><span
                                            class="__cf_email__">{{ $settings['email'] }}</span></a>
                                </div>
                                <div class="desc d-flex align-items-sm-center mb-4 ">
                                    <div class="icon bg-primary  d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-phone  text-white"></i>
                                    </div>
                                    <a href="tel:+91 70963 36561"
                                        class="fs-14 text-black mb-0  ps-4 -flex  align-items-center">{{ $settings['contact_no'] }}</a>
                                </div>
                            </div>
                            <div class="social-icon d-flex  mt-4 flex-wrap">
                                <a href="{{ $settings['facebook_url'] }}" target="_blank"> <i
                                        class="fa-brands fa-facebook-f text-gray fs-18 me-3"></i> </a>
                                <a href="{{ $settings['twitter_url'] }}" target="_blank"> <i
                                        class="fa-brands fa-twitter text-gray fs-18 me-3"></i> </a>
                                <a href="{{ $settings['instagram_url'] }}" target="_blank"> <i
                                        class="fa-brands fa-instagram  text-gray fs-18 me-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header section -->
