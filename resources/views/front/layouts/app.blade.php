<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>APRI - Asosiasi Pemancingan Indonesia</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- icon -->
  <link href="{{ asset('Arsha/assets/img/logo.png') }}" rel="icon">
  <link href="{{ asset('Arsha/assets/img/logo.png') }}" rel="touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('Arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('Arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('Arsha/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Arsha/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('Arsha/assets/css/main.css') }}" rel="stylesheet">
  
</head>

<body class="index-page">

  @include('front.layouts.header')

  <main class="main">

  @yield('content')

  </main>

  @include('front.layouts.footer')

  @include('sweetalert::alert')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  @if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Pendaftaran Berhasil',
          text: '{{ session('success') }}',
          confirmButtonText: 'OK'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = "{{ route('landing_page') }}";
          }
      });
  </script>
  @endif

  <!-- Vendor JS Files -->
  <script src="{{ asset('Arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Arsha/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('Arsha/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('Arsha/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('Arsha/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('Arsha/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('Arsha/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('Arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('Arsha/assets/js/main.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>