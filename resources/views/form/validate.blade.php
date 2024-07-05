@extends('baseForm')

@section('title', 'Carte Consulaire')

@section('note')
    <u class=" text-danger">Etape final:</u> Vérification des information renseigné et soumis de votre demande
@endsection

@section('action')
    action={{ route('form.validSend') }}
@endsection

@section('content')
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nom et prenom</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('nom') }}>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">prenom</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('prenom') }}>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Date de naissance</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('dateNais') }}>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Lieu de naissance</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('lieuNais') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Situation matrimoniale</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('sitMat') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Proffession</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                value={{ session('proffession') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre d'enfant</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('nbEnf') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Adresse actuelle</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('adr') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Pays actuelle</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('pays') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Telephone mobile</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('tel') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Numero de passport</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('numPass') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Expiration de passport</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('expPass') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Arriver à l'étranger</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('arrExt') }}>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Adresse Email</label>
        <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{ session('email') }}>
        </div>
    </div>

    <div class="card mb-3" style="width: 650px;">
        <div class="row">
            <div class="col-md-5">
                <div class="d-flex">
                    <img src="/storage/{{ session('img') }}" class="img-fluid rounded m-2" style="width: 555px;"
                        alt="Votre photo">
                </div>
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title"><span class="badge bg-primary">Note</h5>
                    <p class="card-text">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Vérifier qu'il respecte bien les consignes comme suit</li>
                        <li class="list-group-item">Dimensions: 431px X 555px</li>
                        <li class="list-group-item">Résolution: 300dpi</li>
                        <li class="list-group-item">Format:.jpg Taille &lt; 50Ko</li>
                    </ul>
                    <p class="card-text">
                        <small class="text-body-secondary">
                            <i class="fas fa-light fa-circle-question"></i>
                            </i>
                            <a href="{{ route('form.format') }}" target="blank"
                                class="link-offset-2 link-underline link-underline-opacity-0"> Voir les
                                exigences sur la photo</a>
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2" style="--bs-aspect-ratio: 50%;">
            <div>{!! captcha_img() !!}</div>
        </div>
        <div class="col-sm-10">
            <input type="text" name="captcha">
        </div>
    </div>
    @error('captcha')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row">

        <div class="col">
            <a class="btn btn-primary" href={{ route('form.mail', ['retour' => true]) }} name='precedent'>Précédent</a>
        </div>

        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-success" type='submit' name='suivant'>Suivant</button>
        </div>
    </div>
@endsection
