<!doctype html>
<html class="no-js" lang="zxx">
@include('website.layouts.partials.head')

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('website') }}/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('website.layouts.partials.nav')
    @yield('content')
    @include('website.layouts.partials.footer')

    <!-- JS here -->
    @include('website.layouts.partials.scripts')

</body>

</html>
