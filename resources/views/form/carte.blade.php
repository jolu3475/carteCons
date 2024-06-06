@extends('baseForm')

@section('title', 'carte Consulaire')

@section('head')

    <p class="h1 ti"><strong>Formulaire Carte consulaire</strong></p>
    <blockquote class="blockquote">
        <p><span class="badge bg-primary">Note</span> tout les champs suivi par une étoile (<span class="red">*</span>)
            sont obligatoire</p>
    </blockquote>

@endsection

@section('content')

    @include('form.carteCons')

@endsection

@section('btn', 'Envoyer')
