@extends('front.layouts.app')

@section('title', 'Landing Page')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section" style="background-color: #EBF4FF;">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                        <h1 style="color: #4D4D4D;">Asosiasi Pemancingan Indonesia</h1>
                        <p style="color: #717171;">Platform untuk pendataan dan informasi anggota komunitas pemancingan di seluruh Indonesia</p>
                        <div class="d-flex">
                            <a href="{{ route('form_daftar_individu') }}" class="btn-get-started"
                                style="border-radius: 2.78px; background-color: #24BADA;">Daftar</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle" style="color: #333;"></i><span style="color: #333;">Watch Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="Arsha/assets/img/hero-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang kami</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <h2>Tentang Kami</h2>
            <div class="row gy-4">

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p>
                        Asosiasi Pemancingan Indonesia adalah wadah bagi para pemancing untuk terhubung, berbagi informasi, dan
                        mendata keanggotaan secara lebih mudah dan terorganisir.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-circle"></i> <span>Pendataan anggota komunitas pemancing secara online.</span></li>
                        <li><i class="bi bi-check2-circle"></i> <span>Informasi kegiatan dan event pemancingan di seluruh Indonesia.</span></li>
                        <li><i class="bi bi-check2-circle"></i> <span>Memperkuat jaringan antar pemancing melalui sistem terpadu.</span></li>
                    </ul>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <p>
                        Dengan adanya sistem ini, anggota dapat mengakses data secara cepat, transparan, dan akurat. Tujuan kami
                        adalah mendukung perkembangan komunitas pemancingan Indonesia agar lebih solid dan profesional.
                    </p>
                    <a href="#" class="read-more"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                </div>

            </div>

            </div>

        </section><!-- /About Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background">

            <img src="Arsha/assets/img/bg/bg-8.jpg" alt="">

            <div class="container">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-9 text-center text-xl-start">
                        <h3>Bergabung Sekarang</h3>
                        <p>Daftarkan diri Anda sebagai anggota Asosiasi Pemancingan Indonesia untuk mendapatkan informasi terbaru,
                        mengikuti event, dan terhubung dengan komunitas pemancing di seluruh Indonesia.</p>
                    </div>
                    <div class="col-xl-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#">Daftar Anggota</a>
                    </div>
                </div>

            </div>

        </section><!-- /Call To Action Section -->

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pengurus</h2>
                <p>Struktur pengurus Asosiasi Pemancingan Indonesia yang mengelola organisasi dan kegiatan komunitas.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="Arsha/assets/img/person/person-m-7.webp" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="Arsha/assets/img/person/person-f-8.webp" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Sarah JHomenson</h4>
                                <span>Product Manager</span>
                                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="Arsha/assets/img/person/person-m-6.webp" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="Arsha/assets/img/person/person-f-4.webp" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section><!-- /Team Section -->

        <!-- Recent Blog Postst Section -->
        <section id="recent-blog-postst" class="recent-blog-postst section light-background">

           <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Artikel Kami</h2>
                <p>Kumpulan artikel seputar dunia pemancingan, tips & trik, serta informasi kegiatan komunitas.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    @foreach($artikel_bawah as $item)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                                <div class="post-img position-relative overflow-hidden" style="width:100%; height:250px;">
                                    <img src="{{ asset($item->pict) }}" class="img-fluid w-100 h-100" alt="{{ $item->title }}"
                                        style="object-fit:cover;">
                                    <span
                                        class="post-date">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $item->title }}</h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <span class="ps-2">{{ $item->penerbit }}</span>
                                        </div>
                                    </div>

                                    <hr>

                                    <a href="{{ route('artikel.detail', $item->id) }}" class="readmore stretched-link">
                                        <span>Lanjut Baca</span><i class="bi bi-arrow-right"></i>
                                    </a>

                                </div>

                            </div>
                        </div><!-- End post item -->
                    @endforeach

                </div>

            </div>

        </section><!-- /Recent Blog Postst Section -->


    </main>
@endsection
