@php
    $currentRoute = Route::currentRouteName();
@endphp

<style>
    .app-nav .nav-item {
        display: flex;
        width: 100%;
        border-radius: 8px;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0);
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

    .sidepanel-inner {
        background-color: rgba(0, 0, 0, 0) !important;
        box-shadow: none !important;
    }
</style>

<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1 px-3 py-3" style="width: 250px; position: fixed; z-index: 100; margin-top: 60px;">
    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute == 'form_daftar_individu' ? 'active' : '' }}"
                href="{{ route('form_daftar_individu') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </span>
                <span class="nav-link-text">Daftar Individu</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute == 'form_daftar_komunitas' ? 'active' : '' }}"
                href="{{ route('form_daftar_komunitas') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg>
                </span>
                <span class="nav-link-text">Daftar Komunitas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentRoute == 'form_daftar_usaha' ? 'active' : '' }}"
                href="{{ route('form_daftar_usaha') }}">
                <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-shop" viewBox="0 0 16 16">
                        <path
                            d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                    </svg>
                </span>
                <span class="nav-link-text">Daftar Usaha</span>
            </a>
        </li>
    </ul>
</nav>
