<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ asset('bootstrap/css/bootstrap.css') }}>
    <link rel="stylesheet" href={{ asset('css/back.css') }}>
    <script src={{ asset('jquery/jquery-3.7.1.min.js') }}></script>
    <script src={{ asset('bootstrap/js/bootstrap.js') }}></script>

    @yield('css')

    <link rel="stylesheet" href={{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">

        {{-- Sidebar --}}
        <div class="sidebar">
            <div class="sidebar-wrapper">
                <div class="navbar navbar-expand-md navbar-dark">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href={{ route('back.index') }}><i
                                    class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('back.profile') }}><i class="fas fa-user"></i> Profile
                                d'utilsateur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('back.user') }}><i class="fas fa-user-secret"></i> Gestion
                                d'utilisateur</a>
                        </li>
                        <li class="nav-item">
                            <form action={{ route('login.logout') }} method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="nav-link"><i class="fas fa-sign-out-alt"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- main content --}}

        <div class="main-content">

            <div class="content main-content p-3" style="background-color: #d1ccc4; height:100vh; overflow:auto">
                {{-- navbar nave rounded-3 shadow --}}
                <nav class="navbar navbar-expand-lg bg-body-tertiary nave rounded-3 shadow">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user"></i>
                                        {{ Illuminate\Support\Facades\Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>


                @yield('content')
            </div>

        </div>

    </div>

</body>

</html>
