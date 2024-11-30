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
                        @foreach ($sliders as $index => $slider)
                            <div class="hero-image carousel-item {{ $index === 0 ? 'active' : '' }} position-relative">
                                <a href="{{ $slider->link ?? '#detailPage' }}">
                                    <img src="{{ asset($slider->image) }}" class="w-100 h-100" alt="{{ $slider->title }}" />
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
                                            <div class="card position-relative">
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
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{ mix('assets/js/front/home.js') }}"></script>
@endsection
