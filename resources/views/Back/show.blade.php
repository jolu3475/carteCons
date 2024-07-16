@extends('backOfiice')

@section('title', 'Verification')

@section('content')

    {{-- @dd($carte) --}}
    <p class="my-5 p-2 rounded h1 border border-primary-subtle">Le numero de la carte est <span
            class=" text-danger">{{ $data->carte()->get('numero')->first()->numero }}</span></p>

    @error('Raison')
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-solid fa-triangle-exclamation"></i>
            {{ ' Vous dever ajouter la raison de son refus' }}
        </div>
    @enderror

    <div class=" rounded-3 p-5 shadow bg-info-subtle text-info-emphasis">

        <div class="container bg-transparent text-body border border-primary-subtle rounded-3 p-5">


            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3 p">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->nom }}>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">prenom</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->prenom }}>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Date de naissance</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->dateNais }}>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Lieu de naissance</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->lieuNais }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Situation matrimoniale</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->sitMat }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Proffession</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->proffession }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nombre d'enfant</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->nbEnf }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Adresse actuelle</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->adr }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Pays actuelle</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->pays->nom }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Telephone mobile</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->tel }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Numero de passport</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->numPass }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Expiration de passport</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->expPass }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Arriver à l'étranger</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->arrExt }}>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Adresse Email</label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $data->email }}>
                </div>
            </div>

            <div class="card mb-3" style="width: 557px;">
                <div class="row">
                    <div class="col-md-5">
                        <div class="d-flex">
                            <img src="/storage/{{ $data->img }}" class="img-fluid rounded m-2" style="width: 555px;"
                                alt="Votre photo">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Envoyer le </label>
                <div class="col-sm-10 border border-primary-subtle rounded-3">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value={{ $carte->created_at }}>
                </div>
            </div>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Valider la carte numero
                                {{ $data->carte()->get('numero')->first()->numero }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            En etes-vous sur????
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <form action="{{ route('back.pdfGenerator', $data->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade modal-lg" id="staticBack" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pourquoi voullez-vous refuser la carte
                                numero
                                {{ $data->carte()->get('numero')->first()->numero }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('back.refuserSend') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="row mb-3 mx-3">
                                    <label for="raison" class="col-form-label">La raison :</label>
                                    <textarea class="form-control" id="raison" name="Raison"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-danger" type='submit' name='valider'
                                        value="{{ $data->id }}">Refuser</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <a class="btn btn-primary" href={{ route('back.index') }} name='precedent'>Précédent</a>
                </div>

                <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                    @if ($carte->vu === 0)
                        <button class="btn btn-danger" type='button' name='valider' data-bs-toggle="modal"
                            data-bs-target="#staticBack">Refuser</button>
                        <button class="btn btn-success" type='button' name='valider' data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Valider</button>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
