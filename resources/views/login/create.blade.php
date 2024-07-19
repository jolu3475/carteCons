@extends('login')

@section('title', 'Créer un compte')

@section('name', 'Créer un compte')

@section('content')

    <input type="hidden" name="slug" value="{{ $slug }}">


    <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name"
            value="{{ old('name') }}">
        <label for="floatingInput">Nom d'utilisateur</label>
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-floating my-3">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Mot de passe</label>
    </div>

    <div class="form-floating my-3">
        <input type="password" class="form-control" id="floatingPassword1" name="password" placeholder="Password">
        <label for="floatingPassword">Confirmation de passe</label>
    </div>

    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="input-group mb-3">
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" value="" id="see"
                aria-label="Checkbox for following text input">
        </div>
        <label for="see" class="form-control"> Voir le mot de passe</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" id="dis" type="submit">Créer</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>

    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <script>
        $('document').ready(function() {
            if ($('#floatingPassword').val() === '' || $('#floatingPassword1').val() === '') {
                $('#dis').attr('disabled', 'disabled');
            }
            $('#floatingPassword1').on('input', function() {
                if ($('#floatingPassword').val() != $('#floatingPassword1').val()) {
                    $('#floatingPassword1').addClass('is-invalid');
                    $('#dis').attr('disabled', 'disabled');
                } else {
                    $('#floatingPassword1').removeClass('is-invalid');
                    $('#dis').removeAttr('disabled');
                }
            });

        });

        $('document').ready(function() {
            $('#see').on('click', function() {
                if ($('#floatingPassword').attr('type') === 'password') {
                    $('#floatingPassword').attr('type', 'text');
                    $('#floatingPassword1').attr('type', 'text');
                } else {
                    $('#floatingPassword').attr('type', 'password');
                    $('#floatingPassword1').attr('type', 'password');
                }
            });
        });
    </script>
@endsection
