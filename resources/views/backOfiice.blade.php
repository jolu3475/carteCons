<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <title>@yield('title')</title>

    {{-- Appel de fontawesome --}}
    <link rel="stylesheet" href={{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}>

    <!-- Call of the css -->
    <link href={{ asset('css/back.css') }} rel="stylesheet">
    <script src={{ asset('js/color-modes.js') }}></script>
    @yield('css')

    {{-- Appel de bootstrap --}}
    <link href={{ asset('bootstrap/css/bootstrap.min.css') }} rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">

</head>

@php
    $routeName = request()->route()->getName();
@endphp

<body style="overflow: hidden" class=" bg-body-tertiary text-light-emphasis">
    {{-- The header of the page --}}
    <header class="navbar sticky-top bg-primary text-primary-emphasis flex-md-nowrap p-0">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Ministère des Affaires Etrangère</a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch"
                    aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                    <i class="fas fa-solid fa-magnifying-glass"></i>
                </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class='fas fa-solid fa-bars'></i>
                </button>
            </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search"
                aria-label="Search">
        </div>
    </header>

    {{-- Content of the page --}}
    <div class="container-fluid">
        <div class="row" style="height: calc(100vh - 35px)">

            {{-- The sidebar of the page --}}
            <div class="sidebar col-md-3 col-lg-2 p-0 p-3">
                <div class=" bg-emerald-300 h-100 rounded bg-primary text-light">
                    <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu"
                        aria-labelledby="sidebarMenuLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="sidebarMenuLabel" class="text-light">Ministère des Affaires
                                Etrangère</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#sidebarMenu" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 px-3 overflow-y-auto">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('back.index') }}" @class([
                                        'nav-link gap-2 my-2 rounded text-body',
                                        'active' => $routeName === 'back.index',
                                        'not-active' => $routeName !== 'back.index',
                                    ])>
                                        <i class="fas fa-solid fa-address-card"></i>
                                        Gestion des cartes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @class([
                                        'nav-link gap-2 my-2 rounded text-body',
                                        'active' => Str::startsWith($routeName, 'back.user'),
                                        'not-active' => !Str::startsWith($routeName, 'back.user'),
                                    ]) href={{ route('back.user') }}>
                                        <i class="fas fa-solid fa-users-gear"></i>
                                        Gestion des utilisateurs
                                    </a>
                                </li>
                            </ul>

                            <hr class="my-3">

                            <ul class="nav flex-column mb-auto mb-auto">
                                <li class="nav-item">
                                    <a @class([
                                        'nav-link gap-2 my-2 rounded text-body',
                                        'active' =>
                                            Str::startsWith($routeName, 'back.setting') &&
                                            !Str::startsWith($routeName, 'back.settingBack'),
                                        'not-active' => !Str::startsWith($routeName, 'back.setting'),
                                    ]) href={{ route('back.setting.view') }}>
                                        <i class="fas fa-solid fa-user-gear"></i>
                                        Paramètre compte
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @class([
                                        'nav-link gap-2 my-2 rounded text-body',
                                        'active' => Str::startsWith($routeName, 'settingBack'),
                                        'not-active' => !Str::startsWith($routeName, 'settingBack'),
                                    ]) href={{ route('settingBack.repex.index') }}>
                                        <i class="fas fa-solid fa-gear"></i>
                                        Paramètre
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form action={{ route('login.logout') }} method="post">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="nav-link d-flex align-items-center gap-2 not-active rounded text-body"
                                            type="submit">
                                            <i class="fas fa-solid fa-arrow-right-from-bracket"></i>
                                            Se deconnecter
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- The main content of the page --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 h-100" style="overflow-y: auto!important; height:100%">
                <div class="">
                    @yield('content')
                </div>

                {{-- Footer of the page --}}
                <div class="container mt-auto">
                    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top">
                        <p class="col-md-6 mb-0 text-body-secondary">Copyright <span>&copy;</span> 2024 Ministère des
                            Affaires Etrangères - Tous
                            droits réservés.</p>

                        <div class="col-md-4 justify-content-end align-items-end">
                            <a href="/" class="mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                                Ministère des Affaires Etrangère
                            </a>
                        </div>
                    </footer>
                </div>
            </main>
        </div>
    </div>

    {{-- Toogle theme --}}
    @include('dark')

    {{-- Creation of the dashboard --}}

    <script src={{ asset('bootstrap/js/bootstrap.bundle.min.js') }}></script>
</body>

</html>
