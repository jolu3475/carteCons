@extends('Back.setting')

@section('user')
    <p>Nom : {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    @if (Auth::user()->role)
        <p>Super Admin</p>
    @else
        <p>Repex: {{ Auth::user()->repex?->label }} </p>
    @endif
    <p>Date de creation: {{ Auth::user()->created_at }}</p>
@endsection
