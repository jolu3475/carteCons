<!DOCTYPE html>
<html lang="fr" data-bs-theme="auto">

<head>

    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.min.css') }}>
    <script src={{ asset('bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('js/color-modes.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href={{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}>

</head>

<body class='class="d-flex flex-column h-100 bg-secondary-subtle"'>

    <div class="container">
        <div class="row mt-2 lo">

            <div class="col-auto">
                <div class="row">
                    <img src={{ asset('image/logo-mae.png') }} class="img-thumbnail" alt="...">
                </div>
            </div>

        </div>
        <div class="row mt-2 lo">

            <div class="col-auto">
                <div class="row mt-2">
                    <p class='h1'><strong>Ministère des Affaires Etrangères</strong></p>
                </div>
            </div>

        </div>
    </div>

    <ul class="nav h-25 mt-3 mb-3 nave"> </ul>

    <div class="container">
        <div class="shadow p-5 mb-5 bg-body rounded form">

            <div class="row border-bottom">

                <p class="h1 ti"><strong>Formulaire Carte consulaire</strong></p>
                <blockquote class="blockquote">
                    <p>@yield('note')</p>
                    <p><span class="badge bg-primary">Note</span> tout les champs suivi
                        par une étoile (<span class="red">*</span>)
                        sont obligatoire</p>
                </blockquote>

            </div>


            <form method="POST" @yield('action')>
                @csrf

                <div class="mt-3">
                    @yield('content')
                </div>

            </form>
            @yield('another')

        </div>
    </div>


    {{-- Footer of the page --}}
    <div class="container-fluid border-top shadow-lg">
        <footer class="pt-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#"
                                class="nav-link p-0 text-body-secondary">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#"
                                class="nav-link p-0 text-body-secondary">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#"
                                class="nav-link p-0 text-body-secondary">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">

                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 border-top">
                <p>&copy; 2024 Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"> <a class="link-body-emphasis" href="#">
                            <svg class="bi" width="24" height="24">
                                <use xlink:href="#twitter" />
                            </svg>
                        </a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#">
                            <svg class="bi" width="24" height="24">
                                <use xlink:href="#instagram" />
                            </svg>
                        </a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#">
                            <svg class="bi" width="24" height="24">
                                <use xlink:href="#facebook" />
                            </svg>
                        </a></li>
                </ul>
            </div>
        </footer>
    </div>

    @include('dark')

</body>

</html>
