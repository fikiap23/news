@extends('front_new.layouts.app')
@section('title')
    Standart Pelayanan
@endsection

@section('content')
    <div class="py-5">
        <!-- start header section -->
        <section class="bg-primary text-white text-center py-5">
            <div class="container">
                <h1 class="display-6 font-weight-bold">Standar Pelayanan</h1>
                <p class="lead mb-0">Pelayanan terbaik dengan sepenuh hati untuk masyarakat.</p>
            </div>
        </section>
        <!-- end header section -->

        <!-- start pdf-section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div style="margin-top:60px; margin-bottom: 30px; text-align: center;">
                    <h2 style="margin-bottom:30px;" align="center"> Standar Pelayanan </h2>
                    <div style="position: relative; padding-top: 0; height: 0; padding-bottom: 56.25%; overflow: hidden;">
                        <embed src="https://ptsp.sumedangkab.go.id/ptsp/data/download/SK_standar_pelayanan_FINAL.pdf"
                            type="application/pdf" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
        </section>
        <!-- end pdf-section -->
    </div>
@endsection
