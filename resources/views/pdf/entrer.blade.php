<!DOCTYPE html>
<html lang="fr" data-bs-theme="auto">

<head>

    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.min.css') }}>
    <script src={{ asset('bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('js/color-modes.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href={{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}>
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body class='d-flex flex-column h-100 bg-secondary-subtle'>

    <div class="contenu-a5">
        <div class=" p-2 bg-body-tertiary border-5 rounded-3 border">
            <div class="text-center">
                <img src="{{ asset('image/logo-mae.png') }}" alt="logo-mae">
            </div>
            <h1 class="text-uppercase text-center" style="color: green; font-size:25px!important"><strong>Ambasade
                    de
                    Madagascar en France</strong> </h1>
            <div class="row">
                <div class="col-6 col-md-4">
                    <div class="row my-3 mx-1" style="height: 250px!important">
                        <div class="col-md-5 h-100 w-100">
                            <div class="d-flex h-100 w-100">
                                @php
                                    $path = asset('/storage' . $data['img']);
                                @endphp
                                <img src="{{ $path }}" class="img-fluid rounded" alt="Votre photo">
                            </div>
                        </div>
                    </div>
                    <div class="row text-center mx-3 justify-content-center mb-5">
                        Signature / Signature
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="justify-content-start text-danger fw-bolder" style="font-size: 20px">Carte Consulaire /
                        Consular Card
                    </h3>
                    <p class=" fst-italic m-0"> Nom / Name</p>
                    <p class=" fw-bolder m-0">{{ $data['nom'] }}</p>
                    <p class=" fst-italic m-0">Prénom / Given names</p>
                    <p class=" fw-bolder m-0">{{ $data['prenom'] }}</p>
                    <p class=" fst-italic m-0">Date de naissance / Date of birth</p>
                    <p class=" fw-bolder m-0">{{ $data['dateNais'] }}</p>
                    <p class=" fst-italic m-0">Lieu de naissance/ Place of Birth</p>
                    <p class=" fw-bolder m-0">{{ $data['lieuNais'] }}</p>
                    <p class=" fst-italic m-0">Profession / Occupation</p>
                    <p class=" fw-bolder m-0">{{ $data['proffession'] }}</p>
                    <p class=" fst-italic m-0">Adresse / Address</p>
                    <p class=" fw-bolder m-0">{{ $data['adr'] }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
