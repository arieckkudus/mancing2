@extends('front.layouts.app')

@section('title', 'Landing Page')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade" style="margin-top: 60px;">
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
                                    <img src="{{ asset($detail_artikel->pict) }}" alt="Featured blog image"
                                        class="img-fluid" loading="lazy">
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
                                                <img src="assets/img/person/person-f-8.webp" alt="Author"
                                                    class="author-img">
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
