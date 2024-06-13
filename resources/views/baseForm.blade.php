<!DOCTYPE html>
<html lang="fr">

<head>

    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.css') }}>
    <script src={{ asset('bootstrap/js/bootstrap.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <link rel="stylesheet" href={{ asset('bootstrap/css/the') }}>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

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

    <ul class="nav h-25 mt-3 mb-3 nave"></ul>

    <div class="container">
        <div class="shadow p-5 mb-5 bg-body rounded form">
            <form method="POST" action={{ route('form.submit') }}>
                @csrf

                <div class="row ">

                    @yield('head')

                </div>

                @yield('content')

            </form>
        </div>
    </div>

    <div>
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
    </div>

</body>

</html>
