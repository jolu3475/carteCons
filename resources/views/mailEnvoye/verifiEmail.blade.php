@extends('mail')

@section('title', $subject)

@section('content')

    <h1> {{ $contenu }} </h1>
    <p>Voici votre numero de verification de mail: {{ $numVer }} </p>
    <p>Cordialement,</p>

@endsection
