@extends('baseForm')

@section('title', 'login')

@section('head')

    <p class="h1 ti"><strong>Formulaire de connexion</strong></p>

@endsection

@section('content')

    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email or username</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3">
        </div>
    </div>

@endsection

@section('btn', 'se connecter')
