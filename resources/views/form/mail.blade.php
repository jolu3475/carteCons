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

    <div class="input-group mb-3">
        <button class="btn btn-outline-secondary" id="inputGroupFileAddon03" type="submit" name='verifier'>Verifier</button>
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

    @session('email')
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
        <div class="d-grid gap-2 d-md-block mb-3">
            <button class="btn btn-primary" type="submit" name='verifMail'>Valider</button>
        </div>
    @endsession

    <div class="row">

        <div class="col">
            <a class="btn btn-primary" href={{ route('form.image', ['retour' => true]) }} name='precedent'>Précédent</a>
        </div>

        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
            @session('validMail')
                <button class="btn btn-primary" type='submit' name='suivant'>Suivant</button>
            @else
                <button class="btn disabled" disabled type='submit' name='suivant'>Suivant</button>
            @endsession
        </div>
    </div>
@endsection
