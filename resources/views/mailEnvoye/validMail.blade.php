@extends('mail')

@section('title', $subject)

@section('content')

    <h1> {{ $contenu }} </h1>
    <p>Voici votre carte consulaire en pièce jointe.</p>
    <p>Cordialement,</p>

@endsection
