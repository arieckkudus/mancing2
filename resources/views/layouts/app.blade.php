<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal APRI</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('dashboard-assets/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('dashboard-assets/assets/css/portal.css') }}">

    <style>
        body.app::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/assets/images/sea.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            opacity: 0.1;
            z-index: -1;
            /* background: none; */
        }
    </style>
</head>

<body class="app">
    @include('layouts.header')

    <div class="app-wrapper">
        @yield('content')
    </div>

    @include('sweetalert::alert')

    <!-- Javascript -->
    <script src="{{ asset('dashboard-assets/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('dashboard-assets/assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('dashboard-assets/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
