@extends('baseForm')

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
        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Verifier</button>
        <span class="input-group-text" id="addon-wrapping">@<span class="red">*</span></span>
        <input type="email" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"
            placeholder="Veuillez entrer une email valide" name="email" value='{{ old('email', session('email')) }}'>
    </div>

    @error('lieuNais')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror




@endsection


@section('another')

    <form action={{ route('form.verifyMail') }} method="post">

        @session('email')
            @csrf
            <div class="row mb-3">
                <label class='col-auto' for="inputToken">Nous vous avons envoyer et veuiller entrer le numero ici</label>
                <div class="col-sm-2">
                    <input type="number" min="1000" max='9999' class="form-control" id="inputToken" placeholder="0000"
                        name="token">
                </div>
            </div>
            @error('token')
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-solid fa-triangle-exclamation"></i>
                    {{ ' ' . $message }}
                </div>
            @enderror
        @endsession

        <button class="btn btn-primary mb-3" type="submit" name='verifier' value="verifier">Verifier</button>
    </form>

    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href={{ route('form.image', ['retour' => true]) }} name='precedent'>Précédent</a>
            </div>

            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                @session('success')
                    <button class="btn btn-success" type='submit' name='suivant' value='suivant'>Suivant</button>
                @else
                    <button class="btn disabled" disabled>Suivant</button>
                @endsession
            </div>
        </div>

    </form>
@endsection
