@extends('Back.setting')

@section('user')
    <form action="" method="post">
        @csrf
        @session('error')
            <div class="alert bg-warning">
                <i class="fas fa-solid fa-warning"></i>
                {{ session('error') }}
            </div>
        @endsession
        @session('success')
            <div class="alert bg-success">
                <i class="fas fa-solid fa-check"></i>
                {{ session('success') }}
            </div>
        @endsession
        <div class="container-fluid">
            <div class="row mb-3">
                <label for="name" class="col-sm-3">Votre nom d'utilisateur : </label>
                <div class="col-sm-7">
                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"
                        class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3">Ancien mot de passe : </label>
                <div class="col-sm-7">
                    <input type="password" name="password1" id="password1" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3">Nouveau mot de passe : </label>
                <div class="col-sm-7">
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3">Verification mot de passe : </label>
                <div class="col-sm-7">
                    <input type="password" name="password2" id="password2" class="form-control">
                </div>
            </div>
            <div class="input-group mb-3 w-25">
                    <input class="form-check-input mt-0" type="checkbox" id="see"
                <div class="input-group-text">
                        aria-label="Checkbox for following text input">
                </div>
            </div>
                <label for="see" class="form-control"> Voir le mot de passe</label>
            <div class="row d-flex justify-content-end">
                <button id="sub" type="submit" class="btn btn-primary">Modifier</button>
            </div>

        </div>
    </form>

    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <script>
        $('document').ready(function() {
            if ($('#password').val() === '' || $('#password1').val() === '' || $('#password2').val() === '') {
                $('#sub').attr('disabled', 'disabled');
            }
            console.log($('#password').val() !== '')
            $('#password2').on('input', function() {
                if ($('#password2').val() != $('#password').val()) {
                    $('#password2').addClass('is-invalid').removeClass('is-valid');
                    $('#sub').attr('disabled', 'disabled');
                } else {
                    if ($('#password').val() !== '') {
                        $('#password2').removeClass('is-invalid').addClass('is-valid');
                        $('#sub').removeAttr('disabled');
                    }
                }
            });
        });

        $('document').ready(function() {
            $('#see').on('click', function() {
                if ($('#password').attr('type') === 'password') {
                    $('#password').attr('type', 'text');
                    $('#password1').attr('type', 'text');
                    $('#password2').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                    $('#password1').attr('type', 'password');
                    $('#password2').attr('type', 'password');
                }
            });
        });
    </script>
@endsection
