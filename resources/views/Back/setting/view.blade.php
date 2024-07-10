@extends('Back.setting')

@section('user')
    <p>Welcome back {{ Auth::user()->name }}</p>
    <p></p>
@endsection
