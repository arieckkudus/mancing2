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

<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li>
            <div style="padding-left: 2rem; font-size: 12px; margin-bottom: 8px;">
                <span>MAIN</span>
            </div>
            <ul style="padding-left: 1rem; padding-right: 1rem;">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.anggota') }}">
                        <span class="nav-icon">
                            {{-- Icon People (Anggota) --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                class="bi bi-people" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 7a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                <path fill-rule="evenodd"
                                    d="M14 13c0 1-1 2-2 2H4c-1 0-2-1-2-2 0-1.086.627-2.177 1.684-2.828C4.748 9.514 6.344 9 8 9s3.252.514 4.316 1.172C13.373 10.823 14 11.914 14 13z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Anggota</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.komunitas') }}">
                        <span class="nav-icon">
                            {{-- Icon People (Anggota) --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                class="bi bi-people" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 7a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                <path fill-rule="evenodd"
                                    d="M14 13c0 1-1 2-2 2H4c-1 0-2-1-2-2 0-1.086.627-2.177 1.684-2.828C4.748 9.514 6.344 9 8 9s3.252.514 4.316 1.172C13.373 10.823 14 11.914 14 13z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Komunitas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.komunitas') }}">
                        <span class="nav-icon">
                            {{-- Icon People (Anggota) --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                class="bi bi-people" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 7a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                <path fill-rule="evenodd"
                                    d="M14 13c0 1-1 2-2 2H4c-1 0-2-1-2-2 0-1.086.627-2.177 1.684-2.828C4.748 9.514 6.344 9 8 9s3.252.514 4.316 1.172C13.373 10.823 14 11.914 14 13z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Usaha</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.artikel') }}">
                        <span class="nav-icon">
                            {{-- Icon File Text (Artikel) --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                class="bi bi-file-text" viewBox="0 0 16 16">
                                <path
                                    d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm3 4.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H7zm-1 2a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6zm0 2a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Artikel</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
