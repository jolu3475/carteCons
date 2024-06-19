<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>

    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.css') }}>
    <script src={{ asset('bootstrap/js/bootstrap.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.css') }}>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href={{ asset('fontawesome-free-6.5.2-web/css/all.css') }}>

</head>

<body class='class="d-flex flex-column h-100"'>

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



    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
                </ul>
                <p class="text-center text-body-secondary">&copy; 2024 Ministère des Affaires Etrangère, Inc</p>
            </footer>
        </div>
    </footer>

</body>

</html>
