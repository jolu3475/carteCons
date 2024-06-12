<div class="row mb-3">
    <label for="inputName" class="col-sm-2 col-form-label">Nom<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" placeholder="Votre Nom" name="nom">
    </div>
</div>

<div class="row mb-3">
    <label for="inputPrenom" class="col-sm-2 col-form-label">Prénom<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPrenom" placeholder="Votre Prénom" name="prenom">
    </div>
</div>

<div class="row mb-3">
    <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance<span class="red">*</span></label>
    <div class="col-sm-2">
        <input type="date" class="form-control" id="inputDate" name="dateNaiss">
    </div>
</div>

<div class="row mb-3">
    <label for="inputLieu" class="col-sm-2 col-form-label">Lieu de naissance<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputLieu" name="lieuNaiss">
    </div>
</div>

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

<div class="row mb-3">
    <label for="inputProf" class="col-sm-2 col-form-label">Profession<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputProf" placeholder="Votre Profession" name="prof">
    </div>
</div>

<div class="row mb-3">
    <label for="inputEnf" class="col-sm-2 col-form-label">Nombre d'enfants</label>
    <div class="col-sm-2">
        <input type="number" class="form-control" id="inputEnf" name="ndEnf">
    </div>
</div>

<div class="row mb-3">
    <label for="inputAdr" class="col-sm-2 col-form-label">Adresse actuelle<span class="red">*</span></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputAdr" placeholder="Votre adresse actuelle" name="adr">
    </div>
</div>

<div class="row mb-3">
    <label for="inputPa" class="col-sm-2 col-form-label">Pays actuelle<span class="red">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="inputPa" placeholder="Votre Pays actuelle" name="pays">
    </div>
</div>

<div class="row mb-3">
    <label for="inputTel" class="col-sm-2 col-form-label">Téléphone<span class="red">*</span></label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="inputTel" placeholder="Votre Numéro de téléphone"
            name="numTel">
    </div>
</div>

<div class="row mb-3">
    <label for="inputMail" class="col-sm-2 col-form-label">Adresse E-mail<span class="red">*</span></label>
    <div class="col-sm-5">
        <input type="email" class="form-control" id="inputMail" placeholder="Votre Adresse e-mail valide"
            name="email">
    </div>
    <button name="bi" class="col-sm-1 btn btn-primary" onclick="showInputForm(event)">Verifer</button>
    <div id="dynamicInputForm" style="display:none;">
        <div class="row mb-3">
            <label for="inputNewField" class="col-sm-2 col-form-label">New Field</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNewField" placeholder="Enter something">
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <label for="inputPass" class="col-sm-2 col-form-label">Numéro passeport<span class="red">*</span></label>
    <div class="col-sm-2">
        <input type="email" class="form-control" id="inputPass" placeholder="Votre Numéro passport"
            name="numPass">
    </div>
</div>

<div class="row mb-3">
    <label for="inputExpPass" class="col-sm-2 col-form-label">Date d'expiration passport<span
            class="red">*</span></label>
    <div class="col-sm-2">
        <input type="date" class="form-control" id="inputExpPass" name="dateExp">
    </div>
</div>

<div class="row mb-3">
    <label for="inputDateArr" class="col-sm-2 col-form-label">Date d'arrivée à l'étranger<span
            class="red">*</span></label>
    <div class="col-sm-2">
        <input type="date" class="form-control" id="inputDateArr" name="dateArr">
    </div>
</div>

<div class="row mb-3">
    <label for="inputImg" class="col-sm-2 col-form-label">Veuiller entrer une image<span
            class="red">*</span></label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="inputImg" name="img">
    </div>
    <div class="row m-5">
        <div class="card mb-3" style="max-width: 555px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src={{ asset('image/person.svg') }} class="img-fluid rounded-start m-2" style="width:555px"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><span class="badge bg-primary">Note</span></h5>
                        <p class="card-text">
                            @php
                                echo 'Dimensions: 431px X 555px<br/>Résolution: 300dpi<br/> Format:.jpg Taille < 50Ko';
                            @endphp
                        </p>
                        <a href={{ route('form.format') }} target="_blank"> VOIR LES EXIGENCES SUR LA PHOTO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success">Envoyer</button>

<script>
    function showInputForm(event) {
        // Prevent the default action (form submission)
        event.preventDefault();

        // Find the dynamic input form and change its display property to block
        $('#dynamicInputForm').css('display', 'block');
    }
</script>
