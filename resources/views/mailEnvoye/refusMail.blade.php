@extends('mail')

@section('title', $subject)

@section('content')
    <h1> Bonjour </h1>
    <p>Votre demande a été refuse pour la raison suivante: <br>{{ $contenu }} </p>
    Veuiller clicker sur le boutton <a class="btn btn-primary" href="{{ $link }}">Modifier</a>
    <p>Cordialement,</p>
@endsection
