<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://flixtv.volkovdesign.com/main/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="https://flixtv.volkovdesign.com/main/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://flixtv.volkovdesign.com/main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://flixtv.volkovdesign.com/main/css/slider-radio.css">
    <link rel="stylesheet" href="https://flixtv.volkovdesign.com/main/css/select2.min.css">
    <link rel="stylesheet" href="https://flixtv.volkovdesign.com/main/css/magnific-popup.css">
    <link rel="stylesheet" href="https://flixtv.volkovdesign.com/main/css/plyr.css">
    <link rel="stylesheet" href="https://flixtv.volkovdesign.com/main/css/main.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="https://flixtv.volkovdesign.com/main/icon/favicon-32x32.png"
        sizes="32x32">
    <link rel="apple-touch-icon" href="https://flixtv.volkovdesign.com/main/icon/favicon-32x32.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
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
    <script src="https://flixtv.volkovdesign.com/main/js/jquery-3.5.1.min.js"></script>
    <script src="https://flixtv.volkovdesign.com/main/js/bootstrap.bundle.min.js"></script>
    <script src="https://flixtv.volkovdesign.com/main/js/owl.carousel.min.js"></script>
    <script src="https://flixtv.volkovdesign.com/main/js/slider-radio.js"></script>
    <script src="https://flixtv.volkovdesign.com/main/js/select2.min.js"></script>
    <script src="https://flixtv.volkovdesign.com/main/js/smooth-scrollbar.js"></script>
    <script src="https://flixtv.volkovdesign.com/main/js/jquery.magnific-popup.min.js"></script>
    <script src="https://flixtv.volkovdesign.com/main/js/plyr.min.js"></script>
    <script src="https://flixtv.volkovdesign.com/main/js/main.js"></script>
</body>

</html>
