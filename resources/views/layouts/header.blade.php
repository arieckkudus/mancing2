<header class="app-header fixed-top"
    style="background-color: transparent; box-shadow: none; border: none; height: 64px; display: flex; flex-direction: row; width: 100%;">
    <div class="app-header-inner ps-4" style="height: 100%; width: 100%;">
        <div class="container-fluid py-2 d-flex align-items-center"
            style="height: 100%; border: 1px solid #ddd; background-color: #fff; border-end-start-radius: 10px;">
            <div class="app-header-content d-flex align-items-center justify-content-between w-100">
                <h1 class="app-page-title mb-0 ms-2">Dashboard Admin</h1>
                <div class="d-flex align-items-center" style="width: 320px;">
                    <button type="button" class="btn me-2" style="background-color: #4A8E9C; color: #fff;">...</button>
                    <button type="button" class="btn me-2"
                        style="background-color: #4A8E9C; color: #fff;">Share</button>
                </div>
                {{-- <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="app-utilities col-auto">

                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                role="button" aria-expanded="false"><img src="/assets/images/user.png"
                                    alt="user profile"></a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="account.html">Account</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->
    <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding" style="margin-bottom: 0.5rem; padding: 0px;">

                <div class="app-utility-item app-user-dropdown dropdown w-100" style="padding: 1rem;">
                    <a id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="display: flex; flex-direction: row; align-items: center; height: 100%; width: 100%;">
                        <img src="/assets/images/user.png" alt="user profile" style="margin-right: 12px;">
                        <div style="display: flex; flex-direction: column;">
                            <span style="font-size: 13px; color: #757575; line-height: 12px; margin-bottom: 4px;">PENGURUS</span>
                            <span style="font-size: 16px; color: #000; line-height: 20px;">Hamdani Hasan</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                        <li><a class="dropdown-item" href="account.html">Account</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
                {{-- <a class="app-logo" href="{{ route('dashboard') }}">
                    <img class="logo-icon me-2" src="{{ asset('Arsha/assets/img/logo.png') }}" alt="logo">
                    <span class="logo-text">APRI</span>
                </a> --}}
            </div>

            <div style="padding-inline: 1rem;">
                <hr>
            </div>

            @include('layouts.sidebar')


            <div class="app-sidepanel-footer" style="border-top: none;">
                <nav class="app-nav app-nav-footer">
                    <ul class="app-menu footer-menu list-unstyled">
                        <li class="nav-item">
                            <a href="#"
                                style="width: 100%; padding: 0.875rem 1rem; padding-left: 2rem; color: #757575;">
                                <span class="nav-link-text">Help</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                style="width: 100%; padding: 0.875rem 1rem; padding-left: 2rem; color: #D55F5A;">
                                <span class="nav-link-text">Logout Account</span>
                            </a>
                        </li>
                    </ul><!--//footer-menu-->
                </nav>
            </div><!--//app-sidepanel-footer-->

        </div><!--//sidepanel-inner-->
    </div><!--//app-sidepanel-->
</header>
