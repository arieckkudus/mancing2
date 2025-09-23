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
    }

    .index-page .header .sitename {
        color: #333;
    }

    .header a.btn-getstarted {
        border-radius: 2.78px;
        background-color: #24BADA;
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
                <li><a href="#about">About</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="{{ route('artikel') }}">Artikel</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

    </div>
</header>
