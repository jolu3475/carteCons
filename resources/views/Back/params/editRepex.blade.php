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
        <form action="{{ route('settingBack.repex.update', $repex->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3 border border-info-subtle rounded p-2">
                <h3>Modifier le repex</h3>
            </div>
            <div class="row mb-3">
                <label for="label" class="col-sm-2 col-form-label">Label</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="label" name="label"
                        value="{{ old('label', $repex->label) }}">
                </div>
            </div>
            @error('label')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="row mb-3">
                <label for="adr" class="col-sm-2 col-form-label">Adresse</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="adr" name="adr"
                        value="{{ old('adr', $repex->adr) }}">
                </div>
            </div>
            @error('adr')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $repex->email) }}">
                </div>
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="row mb-3">
                <label for="pays" class="col-sm-2 col-form-label">Pays</label>
                <div class="col-sm-10">
                    <select class="form-select" id="pays" name="codePays">
                        @foreach ($pays as $dat)
                            <option value="{{ $dat->code }}" @if ($dat->code === $repex->codePays) selected @endif>
                                {{ $dat->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('codePays')
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
                    Appuyer sur le boutton pour supprimer {{ $repex->label }}
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
                                <label for="raison" class="col-form-label">{{ $repex->label }}</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <form action="{{ route('settingBack.repex.destroy', $repex->id) }}" method="post">
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

    <div class="container-fluid border border-primary-subtle rounded">
        <div class="row d-flex justify-content-between my-2">
            <div class="col-sm-10 d-flex align-items-center">
                <p>Ajouter un/des Pays a sa juridiction</p>
            </div>
            <div class="col-sm-2" style="width: fit-content">
                <button type="button" class="btn btn-primary text-end" data-bs-toggle="modal"
                    data-bs-target="#modalAdd">Ajouter</button>
            </div>
            <div class="modal fade modal-lg" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Ajouter</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('settingBack.juridiction.add', $repex->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-3 mx-3">
                                    <label for="pays">Les Pays</label>
                                </div>
                                <div class="row w-full d-flex overflow-y-auto mx-2 overflow-x-hidden"
                                    style="height: 150px">
                                    @foreach ($paysLib as $item)
                                        <div style="width:100%!important" class="m-1">
                                            <input type="checkbox" name="pays[]" id="{{ $item->code }}"
                                                value="{{ $item->code }}">
                                            <label for="{{ $item->code }}">{{ $item->nom }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <div class="col justify-content-md-end">
                                    <button class="btn btn-success" type='submit' name='valider'>Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid border border-primary-subtle rounded my-2">
        <div class="row d-flex justify-content-between my-2">
            <div class="col-sm-10 d-flex align-items-center">
                <p>Retirer un Pays de sa juridiction</p>
            </div>
            <div class="col-sm-2" style="width: fit-content">
                <button type="button" class="btn btn-danger text-end" data-bs-toggle="modal"
                    data-bs-target="#modalRet">Retirer</button>
            </div>
            <div class="modal fade modal-lg" id="modalRet" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Supprimer des pays de la
                                juridiction de {{ $repex->label }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('settingBack.juridiction.remove', $repex->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="modal-body">
                                <div class="row mb-3 mx-3">
                                    <label for="pays">Les Pays</label>
                                </div>
                                <div class="row w-full d-flex overflow-y-auto mx-2 overflow-x-hidden"
                                    style="height: 150px">
                                    @if ($repex->juridiction->count() === 0)
                                        <div class="row">
                                            <p>Aucun pays n'est dans la juridiction</p>
                                        </div>
                                    @endif
                                    @foreach ($repex->juridiction as $item)
                                        <div style="width:100%!important" class="m-1">
                                            <input type="checkbox" name="pays[]" id="{{ $item->codePays }}"
                                                value="{{ $item->codePays }}">
                                            <label for="{{ $item->codePays }}">{{ $item->pays?->nom }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <div class="col justify-content-md-end">
                                    <button class="btn btn-danger" type='submit' name='valider'>Supprimer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-3">
        <div class="row">
            <div class="d-flex justify-content-end col-sm-12">
                <a href="{{ route('settingBack.repex.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>

@endsection
