@extends('baseForm')

@section('title', 'Carte Consulaire')

@section('note')
    <u class=" text-danger">Etape 2:</u> Insertion de votre photos
@endsection

@section('action')
    action={{ route('form.img') }} enctype="multipart/form-data"
@endsection

@section('content')
    <div class="input-group mb-3">
        <button class="btn btn-outline-secondary" id="inputGroupFileAddon03" type="submit" name='verifier'>Verifier<span
                class="red">*</span></button>
        <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"
            aria-label="Envoye" name="image" value{{ old('img', session('img')) }}>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                @session('img')
                    <img src={{ asset('/storage/' . session('img')) }} class="img-fluid rounded m-2" style="width: 555px"
                        alt="Votre photo">
                @else
                    <img src={{ asset('image/person.gif') }} class="img-fluid rounded m-2" style="width: 555px"
                        alt="Exemple photo">
                @endsession
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><span class="badge bg-primary">Note</span></h5>
                    <p class="card-text">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Dimensions: 431px X 555px</li>
                        <li class="list-group-item">Résolution: 300dpi</li>
                        <li class="list-group-item">{{ 'Format:.jpg Taille < 50Ko' }} </li>
                    </ul>
                    </p>
                    <p class="card-text"><small class="text-body-secondary"><i class="fas fa-light fa-circle-question">
                            </i><a href={{ route('form.format') }} target="blank"
                                class="link-offset-2 link-underline link-underline-opacity-0"> Voir les
                                exigences sur la photo</a></small></p>
                </div>
            </div>
        </div>
    </div>
    @error('image')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror
    <div class="row">

        <div class="col">
            <a class="btn btn-primary" href={{ route('form.index', ['retour' => true]) }} name='precedent'>Précédent</a>
        </div>

        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
            @session('img')
                <button class="btn btn-success" type='submit' name='suivant'>Suivant</button>
            @else
                <button class="btn disabled" disabled>Suivant</button>
            @endsession
        </div>
    </div>
@endsection
