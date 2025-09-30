@php
    $currentRoute = Route::currentRouteName();
@endphp

<style>
    .app-nav .nav-item {
        display: flex;
        width: 100%;
        border-radius: 8px;
        overflow: hidden;
    }

    .app-nav .nav-link {
        width: 100%;
        cursor: pointer;
        position: relative;
        padding: 10px 1rem;
        color: #757575;
    }

    .app-nav .nav-link:hover {
        color: #B2EEFA;
    }

    .app-nav .nav-link.active {
        color: #333;
        background: #B2EEFA;
        border-left: none;
        font-weight: 500;
    }

    .app-nav .nav-icon {
        position: relative;
        left: 0px;
        top: 0px;
        margin-right: 12px;
    }
</style>

<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1 px-3 py-3">
    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute == 'form_daftar_individu' ? 'active' : '' }}"
                href="{{ route('form_daftar_individu') }}">
                <span class="nav-link-text">Form Daftar Individu</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute == 'form_daftar_komunitas' ? 'active' : '' }}"
                href="{{ route('form_daftar_komunitas') }}">
                <span class="nav-link-text">Form Daftar Komunitas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute == 'form_daftar_usaha' ? 'active' : '' }}"
                href="{{ route('form_daftar_usaha') }}">
                <span class="nav-link-text">Form Daftar Usaha</span>
            </a>
        </li>
    </ul>
</nav>
