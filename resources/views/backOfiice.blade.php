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

<body style="overflow: hidden">
    {{-- The header of the page --}}
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Ministère des Affaires
            Etrangère</a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="Toggle search">
                    <i class="fas fa-solid fa-magnifying-glass"></i>
                </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
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
    <div class="container-fluid ">
        <div class="row" style="height: calc(100vh - 35px)">

            {{-- The sidebar of the page --}}
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                                    href="#">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Customers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Reports
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Integrations
                                </a>
                            </li>
                        </ul>

                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                            <span>Saved reports</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Last quarter
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Social engagement
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Year-end sale
                                </a>
                            </li>
                        </ul>

                        <hr class="my-3">

                        <ul class="nav flex-column mb-auto mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
                                    Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action={{ route('login.logout') }} method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="nav-link d-flex align-items-center gap-2" type="submit">Se
                                        deconnecter</button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            {{-- The main content of the page --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="overflow-y: auto!important; height:100%">
                @yield('content')

            </main>
        </div>
    </div>

    {{-- Toogle theme --}}
    @include('dark')

    {{-- Creation of the dashboard --}}

    <script src={{ asset('bootstrap/js/bootstrap.bundle.min.js') }}></script>
</body>

</html>
