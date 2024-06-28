@extends('Back.setting')

@section('user')
    <p>Editer {{ Auth::user()->name }}</p>
@endsection
