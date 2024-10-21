<footer class="footer pt-60 bg-dark">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <!-- Kolom logo -->
            <div class="col-lg-4 col-sm-7">
                <div class="footer-logo">
                    <a href="{{ route('front.home') }}">
                        <img src="{{ asset('/assets/image/logo_ptsp_transparent.png') }}" alt=""
                            style="width: 150px;" />
                    </a>
                </div>
                <p class="d-block text-gray my-4 fs-12 text-gray">
                    Copyrights © 2018 - 2024 DPMPTSP Kabupaten Sumedang
                </p>
            </div>
            <!-- Kolom logo media sosial -->
            <div class="col-xxl-3 col-lg-4 col-sm-6 text-lg-center text-sm-end text-center order-1 order-lg-1">
                <div
                    class="social-icon d-flex justify-content-lg-center justify-content-sm-start justify-content-center">
                    <a href="{{ $settings['facebook_url'] }}" target="_blank">
                        <div
                            style="color: white; background-color: #1877F2; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; margin-right: 10px;">
                            <i class="fa-brands fa-facebook-f fs-18" style="color: white;"></i>
                            <!-- Facebook -->
                        </div>
                    </a>

                    <a href="{{ $settings['twitter_url'] }}" target="_blank" style="margin-right: 10px;">
                        <div
                            style="color: white; background-color: #1DA1F2; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-brands fa-twitter fs-18" style="color: white;"></i>
                            <!-- Twitter -->
                        </div>
                    </a>

                    <a href="{{ $settings['instagram_url'] }}" target="_blank">
                        <div
                            style="color: white; background-color: #E1306C; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-brands fa-instagram fs-18" style="color: white;"></i>
                            <!-- Instagram -->
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer>
