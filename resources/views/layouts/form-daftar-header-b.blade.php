<style>
    .index-page .header .container-fluid {
        padding: 11px;
    }

    .index-page .header {
        background-color: #fff;
        height: 60px;
        padding: 0px;
    }

    #navmenu ul li a {
        color: #333;
        text-decoration: none;
    }

    .index-page .header .sitename {
        color: #333;
    }

    .header a.btn-getstarted {
        border-radius: 2.78px;
        background-color: #24BADA;
    }

    .header a.btn-getstarted:hover {
        border-radius: 2.78px;
        background-color: #1b8da6;
    }

    .blog-posts .content .read-more a {
        border-radius: 2.78px;
        background-color: #24BADA;
    }

    .recent-posts-widget .post-item h4 a {
        color: #555;
    }
</style>

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center h-100">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            <h1 class="sitename">APRI</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('landing_page') }}" class="active">Home</a></li>
                @if (Route::currentRouteName() == 'landing_page')
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#team">Pengurus</a></li>
                @endif
                <li><a href="{{ route('artikel') }}">Artikel</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

    </div>

    <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            @include('layouts.form-daftar-sidebar')
        </div>
    </div>
</header>
