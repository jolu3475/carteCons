<!DOCTYPE html>
<html lang="fr">

<head>

    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.css') }}>
    <script src={{ asset('bootstrap/js/bootstrap.js') }}></script>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>

</head>

<body>

    <div class="container">
        <div class="row mt-2 lo">

            <div class="col-auto">
                <img src={{ asset('image/logo-mae.png') }} class="img-thumbnail align-items-center" alt="...">
            </div>

            <div class="col-auto">
                <img src={{ asset('image/logo-mae.png') }} class="img-thumbnail align-items-end" alt="...">
            </div>

            <div class=" col-auto">
                <img src={{ asset('image/logo-mae.png') }} class="img-thumbnail" alt="...">
            </div>

        </div>
    </div>
    <ul class="nav h-25 mt-3 mb-3 nave"></ul>
    <div class="container">
        <div class="shadow p-3 mb-5 bg-body rounded form">
            <form>

                <div class="row ">

                    @yield('head')

                </div>

                @yield('content')


                <button type="submit" class="btn btn-success">@yield('btn')</button>

            </form>
        </div>
    </div>

</body>

</html>
