<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/bootstrap-grid.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/slider-radio.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/plyr.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/main.css">

    @stack('css_frontend')

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('favicon-32x32.png') }}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>FlixTV – {{ $title_page }} </title>

</head>

<body>
    <!-- header (relative style) -->
    @include('frontend.layout.header')
    <!-- end header -->

    @yield('content')

    <!-- footer -->
    @include('frontend.layout.footer')
    <!-- end footer -->

    <!-- JS -->
    <script src="{{ asset('frontend/js') }}/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('frontend/js') }}/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/js') }}/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend/js') }}/slider-radio.js"></script>
    <script src="{{ asset('frontend/js') }}/select2.min.js"></script>
    <script src="{{ asset('frontend/js') }}/smooth-scrollbar.js"></script>
    <script src="{{ asset('frontend/js') }}/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend/js') }}/plyr.min.js"></script>
    <script src="{{ asset('frontend/js') }}/main.js"></script>

    @stack('js_frontend')
</body>

</html>
