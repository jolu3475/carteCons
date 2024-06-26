<!doctype html>
<html lang="en">

<head>

    <title>Se connecter</title>

    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.min.css') }}>


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href={{ asset('css/signin.css') }} rel="stylesheet">
    <script src={{ asset('bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('js/color-modes.js') }}></script>
</head>

<body class="text-center bg-tertiary-subtle">

    <main class="form-signin shadow p-3 bg-body rounded form bg-info-subtle border-primary-subtle">
        <form method="POST">

            @csrf

            <img src={{ asset('image/logo-mae.png') }} class="img-thumbnail align-items-center" alt="...">
            <h1 class="h3 mt-3 mb-3 fw-normal">Veuillez-vous connecter</h1>

            @error('loginFailed')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="email" value="{{ old('email') }}">
                <label for="floatingInput">Nom d'utilisateur ou email</label>
            </div>


            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password"
                    placeholder="Password">
                <label for="floatingPassword">Mot de passe</label>
            </div>

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
        </form>
    </main>

    @include('dark')

</body>

</html>
