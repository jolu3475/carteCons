<!doctype html>
<html lang="en">

<head>

    <title>@yield('title')</title>

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
        <form method="POST" action="@yield('action')">

            @csrf



            <img src={{ asset('image/logo-mae.png') }} class="img-thumbnail align-items-center" alt="...">
            <h1 class="h3 mt-3 mb-3 fw-normal">@yield('name')</h1>

            @yield('content')
        </form>
    </main>

    @include('dark')

</body>

</html>
