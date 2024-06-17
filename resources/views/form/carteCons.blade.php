@extends('baseForm')

@section('title', 'Carte Consulaire')

@section('note')
    <u class=" text-danger">Etape 1:</u> Remplissage des information
@endsection

@section('action')
    action={{ route('form.submit') }}
@endsection

@section('content')
    <div class="row mb-3">
        <label for="inputName" class="col-sm-2 col-form-label">Nom<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" placeholder="Votre Nom" name="nom"
                value={{ old('nom') }}>
        </div>
    </div>
    @error('nom')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputPrenom" class="col-sm-2 col-form-label">Prénom<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPrenom" placeholder="Votre Prénom" name="prenom"
                value={{ old('prenom') }}>
        </div>
    </div>
    @error('prenom')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance<span class="red">*</span></label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="inputDate" name="dateNais" value={{ old('dateNais') }}>
        </div>
    </div>
    @error('dateNais')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputLieu" class="col-sm-2 col-form-label">Lieu de naissance<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLieu" name="lieuNais" value={{ old('lieuNais') }}>
        </div>
    </div>
    @error('lieuNais')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label id="imputMat" class="col-sm-2 col-form-label">Situation matrimoniale<span class="red">*</span></label>
        <div class="col-sm-2">
            <select class="form-select" id="imputMat" aria-label="Default select example" name='sitMat'>
                <option selected>Faite votre choix</option>
                <option value="Célibataire">Célibataire</option>
                <option value="Divorcé(e)">Divorcé(e)</option>
                <option value="Marié">Marié</option>
            </select>
        </div>
    </div>
    @error('sitMat')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputProf" class="col-sm-2 col-form-label">Profession<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputProf" placeholder="Votre Profession" name="proffession"
                value={{ old('proffession') }}>
        </div>
    </div>
    @error('proffession')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputEnf" class="col-sm-2 col-form-label">Nombre d'enfants</label>
        <div class="col-sm-2">
            <input type="number" class="form-control" id="inputEnf" name="ndEnf" value={{ old('ndEnf', 0) }}
                min="0">
        </div>
    </div>
    @error('ndEnf')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputAdr" class="col-sm-2 col-form-label">Adresse actuelle<span class="red">*</span></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputAdr" placeholder="Votre adresse actuelle" name="adr"
                value={{ old('adr') }}>
        </div>
    </div>
    @error('adr')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputPa" class="col-sm-2 col-form-label">Pays actuelle<span class="red">*</span></label>
        <div class="col-sm-2">
            <select id="country" class='form-select' name="pays">
                @foreach ($pays as $code => $name)
                    <option value="{{ $code }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @error('pays')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputTel" class="col-sm-2 col-form-label">Téléphone<span class="red">*</span></label>
        <div class="col-sm-5">
            <div class="input-group mb-3 row">
                <select class="form-select col-sm-2" id="indicatif" name="indicatif">
                    @foreach ($indicatifs as $indicatif)
                        <option value="{{ $indicatif }}">{{ $indicatif }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" placeholder="Votre Numéro de téléphone" name="tel"
                    value="{{ old('tel') }}">
            </div>
        </div>
    </div>
    @error('tel')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputPass" class="col-sm-2 col-form-label">Numéro passeport<span class="red">*</span></label>
        <div class="col-sm-2">
            <input type="numerique" class="form-control" id="inputPass" placeholder="Votre Numéro passport"
                name="numPass" value={{ old('numPass') }}>
        </div>
    </div>
    @error('numPass')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputExpPass" class="col-sm-2 col-form-label">Date d'expiration passport<span
                class="red">*</span></label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="inputExpPass" name="expPass" value={{ old('expPass') }}>
        </div>
    </div>
    @error('expPass')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <div class="row mb-3">
        <label for="inputDateArr" class="col-sm-2 col-form-label">Date d'arrivée à l'étranger<span
                class="red">*</span></label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="inputDateArr" name="arrExt" value={{ old('arrExt') }}>
        </div>
    </div>
    @error('arrExt')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' ' . $message }}
        </div>
    @enderror

    <button type="submit" class="btn btn-success">Suivant</button>

    <script>
        var indicatifs = @json($indicatifs); // Convertit le tableau PHP en objet JavaScript
    </script>

    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var selectedCountryCode = $(this).val();
                var selectedCountryIndicatif = indicatifs[
                    selectedCountryCode]; // Accède à l'indicatif via l'objet JavaScript
                $('#indicatif').val(selectedCountryIndicatif);
            });
        });
    </script>
@endsection
