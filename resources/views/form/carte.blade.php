@extends('baseForm')

@section('title', 'carte Consulaire')

@section('head')

    <p class="h1 ti"><strong>Formulaire Carte consulaire</strong></p>
    <blockquote class="blockquote">
        <p>Note: tout les champs suivi par une étoile (<span class="red">*</span>) sont obligatoire</p>
    </blockquote>

@endsection

@section('content')


    <div class="row mb-3">
        <label for="inputName" class="col-sm-2 col-form-label">Nom<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" placeholder="Votre Nom">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputPrenom" class="col-sm-2 col-form-label">Prénom<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPrenom" placeholder="Votre Prénom">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance<span class="red">*</span></label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="inputDate" placeholder="Votre Prénom">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputLieu" class="col-sm-2 col-form-label">Lieu de naissance<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLieu" placeholder="Votre lieu de naissance">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputLieu" class="col-sm-2 col-form-label">Situation matrimoniale<span class="red">*</span></label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example">
                <option selected>Faite votre choix</option>
                <option value="Célibataire">Célibataire</option>
                <option value="Divorcé(e)">Divorcé(e)</option>
                <option value="Marié">Marié</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputProf" class="col-sm-2 col-form-label">Profession<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputProf" placeholder="Votre Profession">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputEnf" class="col-sm-2 col-form-label">Nombre d'enfants</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEnf" placeholder="Votre Profession">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputAdr" class="col-sm-2 col-form-label">Adresse actuelle<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputAdr" placeholder="Votre Profession">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputPa" class="col-sm-2 col-form-label">Pays actuelle<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPa" placeholder="Votre Pays actuelle">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputTel" class="col-sm-2 col-form-label">Téléphone<span class="red">*</span></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="inputTel" placeholder="Votre Numéro de téléphone">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputMail" class="col-sm-2 col-form-label">Adresse E-mail<span class="red">*</span></label>
        <div class="col-sm-5">
            <input type="email" class="form-control" id="inputMail" placeholder="Votre Adresse e-mail valide">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputPass" class="col-sm-2 col-form-label">Numéro passeport<span class="red">*</span></label>
        <div class="col-sm-3">
            <input type="email" class="form-control" id="inputPass" placeholder="Votre Numéro de passport">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputExpPass" class="col-sm-2 col-form-label">Date d'expiration passport<span
                class="red">*</span></label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="inputExpPass">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputDateArr" class="col-sm-2 col-form-label">Date d'arrivée à l'étranger<span
                class="red">*</span></label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="inputDateArr">
        </div>
    </div>

@endsection

@section('btn', 'Envoyer')
