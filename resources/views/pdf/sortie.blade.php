<!DOCTYPE html>
<html lang="fr" data-bs-theme="auto">

<head>

    <title>@yield('title')</title>
    <style>
        * {
            font-family: 'Europa', sans-serif;
            margin: 0 !important;
            padding: 0 !important;
        }

        .contenu-a5 {
            max-width: 210mm !important;
            height: 148mm !important;
            overflow: hidden;
            box-sizing: border-box;
            padding-top: 20px !important;
            overflow: hidden;
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

        .signature {
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="contenu-a5">
        <div class="center-logo">
            <img src="{{ asset('image/logo-mae.jpg') }}" alt="logo-mae">
        </div>
        <h1
            style="color: rgba(8, 113, 8, 0.744); font-size:30px!important; text-align:center;margin-bottom:20px!important">
            <strong>{{ $repex['label'] }}</strong>
        </h1>
        <table>
            <tbody>
                <tr>
                    <td>
                        <div style="width: fit-content; padding:0 40px!important">
                            <div style="height: max-content; margin:0 0 20px 0!important;width:fit-content">
                                @php
                                    $path = asset('/storage' . $data['img']);
                                @endphp
                                <img src="{{ $path }}"
                                    style="height: 50mm!important;margin:auto 0!important;display:flex;border-radius:5px!important;border:2px solid black;justify-content:center;align-items:center;"
                                    alt="Votre photo">
                            </div>
                            <div style="text-align: center">
                                <p class="i-text">
                                    Signature / Signature
                                </p>
                            </div>
                        </div>
                    </td>
                    <td style="width: 100%">
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
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="contenu-a5">
        <h1 style="color: rgba(8, 113, 8, 0.744); font-size:30px!important; padding: 40px 40px 0 40px!important;">
            <strong>Carte Consulaire / Consular Card</strong>
        </h1>
        <table>
            <tbody>
                <tr>
                    <td>
                        <div style="width: 125mm; padding:0 40px!important">
                            <div style="margin: 40px 0!important; color:red;font-weight:normal">
                                <h2>
                                    N° {{ $carte['numero'] }}
                                </h2>
                            </div>
                            <p class="i-text"> Date d'emission / Date of Issue</p>
                            <p class="b-text">{{ $carte['dateRemise'] }}</p>
                            <p class="i-text">Date d'expiration / Expiry Date</p>
                            <p class="b-text">{{ $carte['dateExpiration'] }}</p>
                            <p class="i-text">Authorite Emetrice / Issuing Authority</p>
                            <p class="b-text">{{ $repex['label'] }}</p>
                            <p class="i-text">Adresse / Adress</p>
                            <p class="b-text">{{ $repex['adr'] }}</p>
                            <p class="b-text">{{ $repex['email'] }}</p>
                        </div>
                    </td>
                    <td style="width: 100%">
                        <div>
                            {!! DNS2D::getBarcodeHTML(route('verifCarte', $data['slug']), 'QRCODE', 5, 5) !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
