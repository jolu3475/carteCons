@extends('baseForm')

@section('title', 'Format image')

@section('head')

    <p class="h1 ti"><strong>Les exigences relatives aux photos de passeport</strong></p>

@endsection

@section('content')

    <ul class="list-group list-group-flush">
        <li class="list-group-item">Photo d'identité au format passeport ou visa.</li>
        <li class="list-group-item">Votre photo doit être prise au plus tard six mois avant la date à laquelle vous soumettez
            votre demande (photo récente).</li>
        <li class="list-group-item">Photo prise avec une expression faciale neutre, sans lunettes, sans anneaux piercing.
        </li>
        <li class="list-group-item">Front et oreilles dégagés.</li>
        <li class="list-group-item">Les yeux ouverts et clairement visibles.</li>
        <li class="list-group-item">Bouche fermée, pas de sourire.</li>
        <li class="list-group-item">Eclairage uniforme et sans ombres.</li>
        <li class="list-group-item">Le visage et les épaules de la caméra: droits, centrés et carrés.</li>
        <li class="list-group-item">Un fond blanc cassé ou de couleur gris claire avec une nette différence entre votre
            visage et le fond.</li>
        <li class="list-group-item">Extension: .jpg.</li>
        <li class="list-group-item">
            @php
                echo 'Taille: < 50 Ko.';
            @endphp
        </li>
        <li class="list-group-item">Dimensions : 431px X 555px.</li>
        <li class="list-group-item">Résolution: 300dpi.</li>

    </ul>

@endsection
