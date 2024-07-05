<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $subject }}</title>
</head>

<body>

    <h1> Bonjour </h1>
    <p>Votre demande a été refuse pour la raison suivante: <br>{{ $contenu }} </p>
    Veuiller clicker sur le boutton <a class="btn btn-primary" href="{{ $link }}">Modifier</a>
    <p>Cordialement,</p>

</body>

</html>
