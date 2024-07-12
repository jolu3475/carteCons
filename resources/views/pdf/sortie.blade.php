<!DOCTYPE html>
<html lang="fr" data-bs-theme="auto">

<head>

    <title>@yield('title')</title>
    <style>
        @page {
            size: A5 landscape;
            margin: 0cm !important;
        }

        * {
            font-family: 'Times New Roman', Times, serif;
            margin: 0 !important;
            padding: 0 !important;
        }

        .contenu-a5 {
            max-width: 210mm !important;
            overflow: hidden;
            box-sizing: border-box;
            background-color: darkblue;
        }

        .center-logo {
            width: 100% !important;
            text-align: center;
        }

        .i-text {
            font-style: italic;
            color: #6a6a6a;
        }

        .b-text {
            font-weight: bolder;
        }

        .container {
            display: flex;
            width: 205mm !important;
            box-sizing: border-box;
        }

        .left-column {
            flex: 25%;
        }

        .right-column {
            flex: 75%;
        }

        .signature {
            text-align: center;
        }
    </style>

</head>

<body style="background-color:black">

    <div class="contenu-a5">
        <div class="center-logo">
            <img src="{{ asset('image/logo-mae.png') }}" alt="logo-mae">
        </div>
        <h1 style="color: rgba(8, 113, 8, 0.744); font-size:30px!important; text-align:center;margin-bottom:20px">
            <strong>Ambasade
                de
                Madagascar en France</strong>
        </h1>
        <div class='container'>
            <div class="left-column">
                <div style="height: max-content; margin-bottom:20px;width:100%">
                    @php
                        $path = asset('/storage' . $data['img']);
                    @endphp
                    <img src="{{ $path }}"
                        style="height: 50mm!important;margin:0 auto!important;display:flex;border-radius:5px!important;border:2px solid black;justify-content:center;align-items:center;"
                        alt="Votre photo">
                </div>
                <div style="text-align: center">
                    <p class="i-text">
                        Signature / Signature
                    </p>
                </div>
            </div>
            <div class="right-column">
                <h3 style="font-size: 20px;margin-bottom:10px;color:red">Carte Consulaire /
                    Consular Card
                </h3>
                <p class="i-text"> Nom / Name</p>
                <p class="b-text">{{ $data['nom'] }}</p>
                <p class="i-text">Prénom / Given names</p>
                <p class="b-text">{{ $data['prenom'] }}</p>
                <p class="i-text">Date de naissance / Date of birth</p>
                <p class="b-text">{{ $data['dateNais'] }}</p>
                <p class="i-text">Lieu de naissance/ Place of Birth</p>
                <p class="b-text">{{ $data['lieuNais'] }}</p>
                <p class="i-text">Profession / Occupation</p>
                <p class="b-text">{{ $data['proffession'] }}</p>
                <p class="i-text">Adresse / Address</p>
                <p class="b-text">{{ $data['adr'] }}</p>
            </div>
        </div>
    </div>
</body>

</html>
