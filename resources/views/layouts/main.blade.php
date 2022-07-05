<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kantin Kejujuran</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Kantin Kejujuran" name="keywords">
    <meta content="Kantin Kejujuran" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/img/favicon.ico')}}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
    <!-- CSS Libraries -->
    <!-- @notifyCss -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('assets/lib/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/slick/slick-theme.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/notify.css')}}" rel="stylesheet">

    @yield('styles')
    <style>
        .bottom-line {
            border-bottom: 2px solid black;
        }
    </style>

</head>

<body>
    <!-- Top bar End -->

    @include('layouts.header')
    <div style=" position:fixed; z-index: 999;">
        @include('notify::components.notify')
    </div>
    <div style="min-height: 500px;">
        @yield('content')
    </div>
    @include('layouts.footer')



    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <x:notify-messages />
    @notifyJs

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/lib/slick/slick.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    @yield('script')
</body>

</html>