@extends('mail')

@section('title', $subject)

@section('content')

    <h1> {{ $contenu }} </h1>
    <p>Veuiller clicker dans ce lien pour activer votre compte <a href="{{ $link }}" class="btn btn-success">Ici</a>
    </p>
    <p>Cordialement,</p>

@endsection
