<!doctype html>
<html class="no-js" lang="zxx">
@include('website.layouts.partials.head')

<body>

    <!-- Preloader Start -->
    @include('website.layouts.partials.nav')
    @yield('content')
    @include('website.layouts.partials.footer')

    <!-- JS here -->
    @include('website.layouts.partials.scripts')

</body>

</html>
