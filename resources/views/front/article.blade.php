@extends('front.layouts.app')

@section('title', 'Landing Page')

@section('content')
    <main class="main">
        <div class="page-title" data-aos="fade" style="margin-top: 60px;">
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
                                                        style="width:100%; height:250px; object-fit:cover;">
                                                @else
                                                    <img src="{{ asset('default-thumbnail.jpg') }}" alt="No Image"
                                                        style="width:100%; height:250px; object-fit:cover;">
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
                                                <p class="clamp-text" style="word-break: break-word;">{{ strip_tags('$item->content') }}</p>
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
                                        <img src="{{ asset($item->pict) }}" alt="{{ $item->title }}" class="post-thumbnail"
                                            style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('Arsha/assets/img/blog/blog-post-square-1.webp') }}"
                                            alt="Default Thumbnail" class="post-thumbnail"
                                            style="width: 80px; height: 80px; object-fit: cover;">
                                    @endif
                                    <div>
                                        <h4>
                                            <a href="{{ route('artikel.detail', $item->id) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h4>
                                        <span style="font-size: 12px;">{{ $item->penerbit }}</span>
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
@endsection
