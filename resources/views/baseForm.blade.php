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
    <div class="container-fluid shadow-lg p-0 overflow-hidden">
        <footer class="">
            <div class=" m-5 mx-5 row border-top pt-4">
                <div class="col-6 col-md-2 mb-3 mx-5">
                    <h5>Contact</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">Adresse:
                            B.P 836, Rue Andriamifidy, Anosy 101 Antananarivo - Madagascar
                        </li>
                        <li class="nav-item mb-2">Email:<br>info-web@diplomatie.gov.mg</li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Politique étrangère</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Expansion
                                économique</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Intégration
                                régionale</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Diaspora
                                Malagasy</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Partenariat
                                pour le Développement</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Services</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Services
                                consulaires</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Affaires
                                générales</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"> Bourses et
                                Formations

                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">

                </div>
            </div>

            <div class="d-flex bg-danger flex-column flex-sm-row justify-content-center border-top mb-auto">
                <div class="mt-3 mx-5 border-top pt-3">
                    <p>Copyright <span>&copy;</span> 2024 Ministère des Affaires Etrangères - Tous
                        droits réservés.</p>
                    <ul class="list-unstyled d-flex justify-content-center">
                        <li class="ms-3">
                            <a class="link-body-emphasis" href="#">
                                <i class="fas fa-brands fa-x-twitter"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a class="link-body-emphasis" href="#">
                                <i class="fas fa-brands fa-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    @include('dark')

</body>

</html>
