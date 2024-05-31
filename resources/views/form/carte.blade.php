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

@endsection

@section('btn', 'Envoyer')
