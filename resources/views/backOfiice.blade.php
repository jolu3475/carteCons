<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.css') }}>
    <link rel="stylesheet" href={{ asset('css/back.css') }}>
    <script src={{ asset('bootstrap/js/bootstrap.js') }}></script>
    <script src={{ asset('jquery/jquery-3.7.1.min.js') }}></script>

    {{-- css pour datatables --}}
    <link href="{{ asset('datatable/css/dataTables.bootstrap5.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('datatable/css/buttons.bootstrap5.css') }}" type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">

        <div class="sidebar">
            <div class="sidebar-wrapper">
                <div class="navbar navbar-expand-md navbar-dark">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i
                                    class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user"></i> User Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-content">

            <div class="content main-content p-3" style="background-color: #d1ccc4; height:100vh; overflow:auto">
                @yield('content')
            </div>

        </div>

    </div>

</body>

</html>
