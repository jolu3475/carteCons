@extends('Back.params')

@section('title', `Modifier `)

{{-- @dd($us->role === 1) --}}

@section('css')

@endsection

{{-- @dd($repex->juridiction->first()) --}}

@section('user')

    @error('label')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    @error('adr')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    @error('email')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    @error('codePays')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    @error('pays')
        <div class="alert alert-warning">{{ $message }} </div>
    @enderror
    <div class="container-fluid">
        <form action="{{ route('settingBack.pays.update', $pays->code) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3 border border-info-subtle rounded p-2">
                <h3>Modifier le repex</h3>
            </div>
            <div class="row mb-3">
                <label for="label" class="col-sm-2 col-form-label">code du Pays</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control disabled" value="{{ $pays->code }}" disabled>
                    <input type="hidden" name="code" value="{{ $pays->code }}">
                </div>
            </div>
            @error('code')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror
            <div class="row mb-3">
                <label for="adr" class="col-sm-2 col-form-label">Nom du Pays</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom" name="nom"
                        value="{{ old('adr', $pays->nom) }}">
                </div>
            </div>
            @error('nom')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">indicatif téléphonique </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="indicatif" name="indicatif"
                        value="{{ old('email', $pays->indicatif) }}">
                </div>
            </div>
            @error('indicatif')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class='d-flex justify-content-end'>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>

    <div class="container-fluid my-3 border border-primary-subtle rounded">
        <div class="d-flew row justify-content-between my-2">
            <div class="col-sm-10 d-flex align-items-center" style="width: fit-content!important">
                <p>
                    Appuyer sur le boutton pour supprimer le pays {{ $pays->label }}
                </p>
            </div>
            <div class="col-sm-2" style="width: fit-content">
                <button type="button" class="btn btn-danger text-end" data-bs-toggle="modal"
                    data-bs-target="#modalDel">Supprimer</button>
            </div>
            <div class="modal fade" id="modalDel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Supprimer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3 mx-3">
                                <label for="raison" class="col-form-label">Voullez-vous vraiment supprimer le pays
                                    {{ $pays->label }} ?</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <form action="{{ route('settingBack.pays.destroy', $pays->code) }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="col d-grid gap-2 d-md-flex justify-content-md-+end">
                                    <button class="btn btn-danger" type='submit' name='valider'>Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-3">
        <div class="row">
            <div class="d-flex justify-content-end col-sm-12">
                <a href="{{ route('settingBack.pays.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>

@endsection
