@extends('baseForm')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Carte Consulaire')

@section('note')
    <u class=" text-danger">Etape 3:</u> Verification de votre email
@endsection

@section('action')
    action='{{ route('form.submitMail') }}'
@endsection

@section('content')

    @session('warning')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . session('warning') }}
        </div>
    @endsession

    @session('success')
        <div class="alert alert-success" role="alert">
            <i class="fas fa-solid fa-check"></i>
            {{ ' ' . session('success') }}
        </div>
    @endsession

    <div class="input-group mb-3">
        <span class="input-group-text" id="addon-wrapping">@<span class="red">*</span></span>
        <input type="email" class="form-control" id="email" aria-describedby="inputGroupFileAddon03"
            placeholder="Veuillez entrer une email valide" name="email" value='{{ old('email', session('email')) }}'>
    </div>

    @error('lieuNais')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <script></script>


@endsection


@section('another')

    <form action={{ route('form.verifyMail') }} method="post">
        @csrf
        <div class="row mb-3" hidden id="validData">
            <label class='col-auto' for="inputToken">Nous vous avons envoyer un mail et veuiller entrer le numero
                ici</label>
            <div class="col-sm-2">
                @session('valid')
                    <input type="number" value="{{ session('valid') }}" class="form-control" readonly id="inputToken"
                        name="token">
                @else
                    <input type="number" min="1000" max='9999' class="form-control" id="inputToken" placeholder="0000"
                        name="token">
                @endsession
            </div>
        </div>
        @error('token')
            <div class="alert alert-warning" role="alert">
                <i class="fas fa-solid fa-triangle-exclamation"></i>
                {{ ' ' . $message }}
            </div>
        @enderror

        {{-- <button class="btn btn-primary mb-3" type="submit" name='verifier' value="verifier">Verifier</button> --}}
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href={{ route('form.image', ['retour' => true]) }} name='precedent'>Précédent</a>
            </div>

            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn disabled" disabled id="btn" href="{{ route('form.valid') }}">Suiv</a>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {

            function send(email) {
                var formData = new FormData();
                formData.append('email', email);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/api/email',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }

            function test(val) {
                email = val.val();
                regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!regex.test(email)) {
                    val.removeClass('is-valid');
                    val.addClass('is-invalid');
                } else {
                    val.removeClass('is-invalid');
                    val.addClass('is-valid');
                    send(email);
                    $('#validData').removeAttr('hidden');
                }
            }

            console.log($('#email'));

            test($('#email'));

            $('#email').on('input', function() {
                test($('#email'));
            })


            $('#inputToken').on('input', function() {
                token = $(this).val();
                if (token.length === 4) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/api/verify',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status === 200) {
                                $('#btn').removeClass('disabled');
                                $('#btn').removeAttr('disabled');
                                $('#btn').attr('type', 'submit');
                                $('#btn').text('Suivant');
                                $('#btn').attr('class', 'btn btn-success');
                                $('#inputToken').attr('class', 'form-control is-valid');
                            } else {
                                console.log(response);
                                $('#btn').addClass('disabled');
                                $('#btn').attr('disabled', 'disabled');
                                $('#btn').text('non verifier');
                                $('#inputToken').attr('class', 'form-control is-invalid');
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    })
                } else {
                    $(this).removeClass('is-valid');
                    $(this).addClass('is-invalid');
                }
            })
        })
    </script>

@endsection
