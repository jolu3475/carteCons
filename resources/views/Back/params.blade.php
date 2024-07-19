@extends('backOfiice')

@section('title')
    @yield('title')
@endsection

@php
    $routeName = request()->route()->getName();
@endphp

@section('content')
    <div class=" mt-3 p-5 rounded-3 bg-info-subtle shadow">
        <div class="py-5">
            <p class="p-2 rounded h1 border border-primary-subtle">
                Paramètre de l'application </p>
        </div>
    </div>

    <div class=" mx-4 p-5 mb-4 rounded-3 bg-body-secondary bg-gradient shadow" style="margin-top: -50px;">
        <ul class="nav w-full">
            <ul class="nav nav-tabs m-3 w-100">
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'active' => Str::startsWith($routeName, 'settingBack.repex'),
                    ]) aria-current="page"
                        href="{{ route('settingBack.repex.index') }}">Repex</a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'active' => Str::startsWith($routeName, 'settingBack.pays'),
                    ]) href="{{ route('settingBack.pays.index') }}">Pays</a>
                </li>
            </ul>
        </ul>
        <div class="py-5">
            @yield('user')
        </div>
    </div>
@endsection
