@extends('Back.setting')

@section('user')
    <p>Notification {{ Auth::user()->name }}</p>
@endsection
