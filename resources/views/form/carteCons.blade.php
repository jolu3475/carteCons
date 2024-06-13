<div class="row mb-3">
    <label for="inputName" class="col-sm-2 col-form-label">Nom<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" placeholder="Votre Nom" name="nom"
            value={{ old('nom') }}>
    </div>
</div>
@error('nom')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputPrenom" class="col-sm-2 col-form-label">Prénom<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPrenom" placeholder="Votre Prénom" name="prenom"
            value={{ old('prenom') }}>
    </div>
</div>
@error('prenom')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance<span class="red">*</span></label>
    <div class="col-sm-2">
        <input type="date" class="form-control" id="inputDate" name="dateNais" value={{ old('dateNais') }}>
    </div>
</div>
@error('dateNais')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputLieu" class="col-sm-2 col-form-label">Lieu de naissance<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputLieu" name="lieuNais" value={{ old('lieuNais') }}>
    </div>
</div>
@error('lieuNais')
    {{ $message }}
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
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputProf" class="col-sm-2 col-form-label">Profession<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputProf" placeholder="Votre Profession" name="proffession"
            value={{ old('proffession') }}>
    </div>
</div>
@error('proffession')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputEnf" class="col-sm-2 col-form-label">Nombre d'enfants</label>
    <div class="col-sm-2">
        <input type="number" class="form-control" id="inputEnf" name="ndEnf" value={{ old('ndEnf') }}>
    </div>
</div>
@error('ndEnf')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputAdr" class="col-sm-2 col-form-label">Adresse actuelle<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputAdr" placeholder="Votre adresse actuelle" name="adr"
            value={{ old('adr') }}>
    </div>
</div>
@error('adr')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputPa" class="col-sm-2 col-form-label">Pays actuelle<span class="red">*</span></label>
    <div class="col-sm-2">
        <select id="country" class='form-select' name="country">
            @foreach ($pays as $code => $name)
                <option value="{{ $code }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
</div>
@error('pays')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputTel" class="col-sm-2 col-form-label">Téléphone<span class="red">*</span></label>
    <div class="col-sm-5">
        <div class="input-group mb-3">
            <span class="input-group-text col-sm-2" id="basic-addon1"><input style="width: 100%" type="text"
                    id="indicatif" name="indicatif"></span>
            <input type="text" class="form-control" id="inputTel" placeholder="Votre Numéro de téléphone"
                name="tel" value={{ old('tel') }}>
        </div>
    </div>
</div>
@error('tel')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputMail" class="col-sm-2 col-form-label">Adresse E-mail<span class="red">*</span></label>
    <div class="col-sm-5">
        <div class="row">
            <input type="email" class="form-control" id="inputMail" placeholder="Votre Adresse e-mail valide"
                name="email" value={{ old('email') }}>
        </div>
        <div class="row">
            <button name="bi" class="col-auto btn btn-primary" onclick="showInputForm(event)">Verifer</button>
        </div>
    </div>
    <div id="dynamicInputForm" style="display:none;">
        <div class="row mb-3">
            <label for="inputNewField" class="col-sm-2 col-form-label">New Field</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNewField" placeholder="Enter something">
            </div>
        </div>
    </div>
</div>
@error('email')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputPass" class="col-sm-2 col-form-label">Numéro passeport<span class="red">*</span></label>
    <div class="col-sm-2">
        <input type="numerique" class="form-control" id="inputPass" placeholder="Votre Numéro passport"
            name="numPass" value={{ old('numPass') }}>
    </div>
</div>
@error('numPass')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputExpPass" class="col-sm-2 col-form-label">Date d'expiration passport<span
            class="red">*</span></label>
    <div class="col-sm-2">
        <input type="date" class="form-control" id="inputExpPass" name="expPass" value={{ old('expPass') }}>
    </div>
</div>
@error('expPass')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputDateArr" class="col-sm-2 col-form-label">Date d'arrivée à l'étranger<span
            class="red">*</span></label>
    <div class="col-sm-2">
        <input type="date" class="form-control" id="inputDateArr" name="arrExt" value={{ old('arrExt') }}>
    </div>
</div>
@error('arrExt')
    {{ $message }}
@enderror

<div class="row mb-3">
    <label for="inputImg" class="col-sm-2 col-form-label">Veuiller entrer une image<span
            class="red">*</span></label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="inputImg" name="img" value={{ old('img') }}>
    </div>
    <div class="row">
        <div class="card mb-3" style="max-width: 555px;">
            <div class="row g-0">
                <div class="col-md-4 border-2 rounded-2">
                    <img src={{ asset('image/person.gif') }} class="img-fluid rounded-start m-2" style="width:555px"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><span class="badge bg-primary">Note</span></h5>
                        <p class="card-text">
                            @php
                                echo 'Dimensions: 431px X 555px<br/>Résolution: 300dpi<br/> Format:.jpg Taille < 50Ko<br> Extension: .jpg.';
                            @endphp
                        </p>
                        <a href={{ route('form.format') }} target="_blank"> VOIR LES EXIGENCES SUR LA PHOTO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@error('img')
    {{ $message }}
@enderror

<button type="submit" class="btn btn-success">Envoyer</button>

<script>
    var indicatifs = @json($indicatifs); // Convertit le tableau PHP en objet JavaScript
</script>

<script>
    function showInputForm(event) {
        // Prevent the default action (form submission)
        event.preventDefault();

        // Find the dynamic input form and change its display property to block
        $('#dynamicInputForm').css('display', 'block');
    }
    $(document).ready(function() {
        $('#country').change(function() {
            var selectedCountryCode = $(this).val();
            var selectedCountryIndicatif = indicatifs[
                selectedCountryCode]; // Accède à l'indicatif via l'objet JavaScript
            $('#indicatif').val(selectedCountryIndicatif);
        });
    });
</script>
