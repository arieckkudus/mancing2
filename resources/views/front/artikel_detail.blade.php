<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Asosiasi Pemancingan Indonesia</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('Arsha/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('Arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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

  <style>
    .post-thumbnail {
        width: 100%;         /* penuh sesuai kotak */
        height: 70px;       /* boleh sesuaikan tinggi tetap */
        object-fit: cover;   /* supaya gambar crop rapi, tidak melebar/gepeng */
        border-radius: 5px;  /* opsional biar agak rounded */
    }
    .clamp-text {
      display: -webkit-box;
      -webkit-line-clamp: 3; /* tampil max 3 baris */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
  
</head>

<body class="blog-details-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">Arsha</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('landing_page') }}">Home</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('landing_page') }}">Home</a></li>
            <li><a href="{{ route('artikel') }}">Artikel</a></li>
            <li class="current">Detail Artikel</li>
          </ol>
        </nav>
        <h1>Detail Artikel</h1>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container" data-aos="fade-up">

              <article class="article">

                <div class="hero-img" data-aos="zoom-in">
                  <img src="{{ asset($detail_artikel->pict) }}" alt="Featured blog image" class="img-fluid" loading="lazy">
                  <div class="meta-overlay">
                    <div class="meta-categories">
                    </div>
                  </div>
                </div>

                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                  <div class="content-header">
                    <h1 class="title">{{ $detail_artikel->title }}</h1>

                    <div class="author-info">
                      <div class="author-details">
                        <img src="assets/img/person/person-f-8.webp" alt="Author" class="author-img">
                        <div class="info">
                          <h4>{{ $detail_artikel->penerbit }}</h4>
                          <span class="role">{{ $detail_artikel->role }}</span>
                        </div>
                      </div>
                      <div class="post-meta">
                        <span class="date">
                          <i class="bi bi-calendar3"></i> 
                          {{ \Carbon\Carbon::parse($detail_artikel->created_at)->translatedFormat('d F Y') }}
                      </span>
                      </div>
                    </div>
                  </div>

                  <div class="content">

                    <div class="artikel-content">
                      {!! $detail_artikel->content !!}
                  </div>

                  </div>
                </div>

              </article>

            </div>
          </section><!-- /Blog Details Section -->

          <!-- Blog Comment Form Section -->
          <section id="blog-comment-form" class="blog-comment-form section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

            </div>

          </section><!-- /Blog Comment Form Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

                <h3 class="widget-title">Artikel Terbaru</h3>

                @foreach ($artikel_baru as $item)
                    <div class="post-item">
                      @if ($item->pict ?? false)
                          <img src="{{ asset($item->pict) }}" 
                              alt="{{ $item->title }}" 
                              class="post-thumbnail">
                      @else
                          <img src="{{ asset('Arsha/assets/img/blog/blog-post-square-1.webp') }}" 
                              alt="Default Thumbnail" 
                              class="post-thumbnail">
                      @endif

                      <div>
                          <h4>
                              <a href="{{ route('artikel.detail', $item->id) }}">
                                  {{ $item->title }}
                              </a>
                          </h4>
                          <time datetime="{{ $item->created_at }}">
                              {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                          </time>
                      </div>
                   </div>
                @endforeach
            </div>

          </div>

        </div>

      </div>
    </div>

  </main>

  <footer id="footer" class="footer">

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Arsha</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

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

</body>

</html>