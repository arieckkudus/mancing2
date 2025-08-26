<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Asosiasi Pemancingan Indonesia</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="Arsha/assets/img/logo.png" rel="icon">
    <link href="Arsha/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="Arsha/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="Arsha/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="Arsha/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="Arsha/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="Arsha/assets/css/main.css" rel="stylesheet">

    <style>
        .post-thumbnail {
            width: 100%;
            /* penuh sesuai kotak */
            height: 70px;
            /* boleh sesuaikan tinggi tetap */
            object-fit: cover;
            /* supaya gambar crop rapi, tidak melebar/gepeng */
            border-radius: 5px;
            /* opsional biar agak rounded */
        }

        .clamp-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* tampil max 3 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

</head>

<body class="blog-page">

    @include('front.layouts.header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('landing_page') }}">Home</a></li>
                        <li class="current">Artikel</li>
                    </ol>
                </nav>
                <h1>Artikel Kami</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">
                        <div class="container" data-aos="fade-up" data-aos-delay="100">
                            <div class="row gy-4">

                                @foreach($artikel as $item)
                                    <div class="col-lg-6">
                                        <article>
                                            <div class="post-img">
                                                @if($item->pict)
                                                    <img src="{{ asset($item->pict) }}" alt="{{ $item->title }}"
                                                        style="width:100%; height:auto; object-fit:contain;">
                                                @else
                                                    <img src="{{ asset('default-thumbnail.jpg') }}" alt="No Image"
                                                        style="width:100%; height:auto; object-fit:contain;">
                                                @endif
                                            </div>
                                            <h2 class="title">
                                                <a href="{{ route('artikel.detail', $item->id) }}">{{ $item->title }}</a>
                                            </h2>

                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-person"></i> {{ $item->penerbit }}
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-clock"></i>
                                                        <time datetime="{{ $item->created_at }}">
                                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                                        </time>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="content">
                                                <p class="clamp-text">{{ strip_tags($item->content) }}</p>
                                                <div class="read-more">
                                                    <a href="{{ route('artikel.detail', $item->id) }}">Lanjut baca</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach

                            </div><!-- End blog posts list -->
                        </div>
                    </section>

                    <!-- Pagination -->
                    <section id="pagination-2" class="pagination-2 section">
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                {{ $artikel->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </section>
                </div>


                <div class="col-lg-4 sidebar">

                    <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

                        <!-- Search Widget -->
                        <!-- <div class="search-widget widget-item">

              <h3 class="widget-title">Cari</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div> -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">

                            <h3 class="widget-title">Artikel Terbaru</h3>

                            @foreach ($artikel_baru as $item)
                                <div class="post-item">
                                    @if ($item->pict ?? false)
                                        <img src="{{ asset($item->pict) }}" alt="{{ $item->title }}" class="post-thumbnail">
                                    @else
                                        <img src="{{ asset('Arsha/assets/img/blog/blog-post-square-1.webp') }}"
                                            alt="Default Thumbnail" class="post-thumbnail">
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
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Arsha</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="Arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Arsha/assets/vendor/php-email-form/validate.js"></script>
    <script src="Arsha/assets/vendor/aos/aos.js"></script>
    <script src="Arsha/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="Arsha/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="Arsha/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="Arsha/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="Arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="Arsha/assets/js/main.js"></script>

</body>

</html>
