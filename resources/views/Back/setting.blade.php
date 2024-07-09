@extends('backOfiice')

@section('title', 'Profile d\'utilsateur')

@php
    $routeName = request()->route()->getName();
@endphp

@section('content')

    <div class=" mt-3 p-5 rounded-3 bg-info-subtle ">
        <div class="py-5">
            <p class="p-2 rounded h1 border border-primary-subtle">
                Paramètre de votre compte </p>
        </div>
    </div>

    <div class=" mx-4 p-5 mb-4 rounded-3 bg-primary-subtle" style="margin-top: -50px;">
        <ul class="nav justify-content-end">
            <div class="rounded border border-secondary-subtle inline-flex bg-dark-subtle">
                <ul class="nav">

                    <li @class([
                        'nav-item',
                        'border border-primary-subtle bg-info-subtle text-info-emphasis rounded' =>
                            $routeName === 'back.setting.view',
                    ])>
                        <a class="nav-link actived rounded" href={{ route('back.setting.view') }}>Voir</a>
                    </li>
                    <li @class([
                        'nav-item',
                        'border border-primary-subtle bg-info-subtle text-info-emphasis rounded' =>
                            $routeName === 'back.setting.edit',
                    ])>
                        <a class="nav-link" href={{ route('back.setting.edit') }}>Editer</a>
                    </li>
                    <li @class([
                        'nav-item',
                        'border border-primary-subtle bg-info-subtle text-info-emphasis rounded' =>
                            $routeName === 'back.setting.notif',
                    ])>
                        <a class="nav-link" href={{ route('back.setting.notif') }}>Notification</a>
                    </li>
                </ul>
            </div>
        </ul>
        <div class="py-5">
            @yield('user')
        </div>
    </div>

@endsection
