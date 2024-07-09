@extends('login')

@section('title', 'Connexion')

@section('name', 'Connexion')

@section('content')

    @error('loginFailed')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
            value="{{ old('email') }}">
        <label for="floatingInput">Nom d'utilisateur ou email</label>
    </div>


    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
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

    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <script>
        $('document').ready(function() {
            $('#see').on('click', function() {
                if ($('#floatingPassword').attr('type') === 'password') {
                    $('#floatingPassword').attr('type', 'text');
                } else {
                    $('#floatingPassword').attr('type', 'password');
                }
            });
        });
    </script>
@endsection
