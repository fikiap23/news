@extends('front_new.layouts.app')
@section('title')
    {{ __('messages.post.gallery') }}
@endsection
@section('pageCss')
    <link href="{{ asset('front_web/build/scss/gallery-details.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <main class="main">
        <div class="gallery-details-page">
            <!-- start gallery-section -->
            <section class="gallery-details-section py-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-11 p-0">
                            <div class="filters text-center">
                                <ul class="nav justify-content-center">
                                    <li class="nav-item ">
                                        <button class="btn fil-cat filter animation nav-category active text-black"
                                            href="javascript:void(0)" data-filter="all">{{ __('messages.all') }}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div id="portfolio" class="gallery-images column-count">
                            <div class="grid">

                                @php
                                    $val = 5;
                                @endphp
                                @if (!empty($galleryImages))
                                    @foreach ($galleryImages as $galleryImage)
                                        @foreach ($galleryImage->gallery_image as $gallery)
                                            <div class="tile scale-anm">
                                                <a href="{{ $gallery }}" target="_blank" data-lightbox="gallery"
                                                    class="w-100">
                                                    <figure class="mb-0">
                                                        {{--                                                    <img data-src="{{$gallery}}" alt="" src="{{ asset('front_web/images/bg-process.png') }}" class="lazy"> --}}
                                                        <img src="{{ $gallery }}" alt="">
                                                    </figure>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
        </div>
    </main>
@endsection
@section('script')
    {{--    <script src="{{asset('assets/js/jquery.mixitup.min.js')}}"></script> --}}
    {{--    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script> --}}
    {{--    <script src="{{ asset('assets/js/front/gallery-page.js') }}"></script> --}}
@endsection
