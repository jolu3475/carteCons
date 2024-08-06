@extends('Back.params')

@section('title', 'Gestion des Representation exterrieur')

{{-- @dd($us->role === 1) --}}

@section('css')

    {{-- css pour datatables --}}
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/responsive.bootstrap5.css') }}">

    {{-- call of the js --}}
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('datatables/js/responsive.bootstrap5.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "url": "{{ asset('datatables/langue/fr_fr.json') }}"
                },
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50, 100],
                "order": [
                    [0, "asc"]
                ],
                "searching": true,
                "paging": true,
                "info": true,
                "responsive": true,
                /*  "columnDefs": [{
                    "targets": "_all", // Cible la première colonne
                    "createdCell": function(td, cellData, rowData, row, col) {
                        $(td).css('max-width', '50px'); // Applique une largeur maximale
                    }
                }] */
            });
        });
    </script>
    <style>
        table.dataTable tbody td {
            white-space: normal !important;
            /* Permet au texte de passer à la ligne suivante */
            vertical-align: top !important;
            /* Alignement vertical au top pour une meilleure lisibilité */
        }
    </style>

@endsection

@section('user')

    @session('success')
        <div class="alert alert-success">{{ session('success') }}</div>
    @endsession
    @error('label')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('adr')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('codePays')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @if ($us->role === 1)
        <div class="row">
            <p class="col">Créer une nouvelle repexes</p>
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-primary text-end" data-bs-toggle="modal"
                    data-bs-target="#modalDel">Créer</button>
            </div>
        </div>
        {{-- Creation d'un repex --}}
        <div class="modal modal-lg fade" id="modalDel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Créer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('settingBack.repex.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-3">Créer une nouvelle repex</div>
                            <div class="row mb-3">
                                <label for="label" class="col-sm-2 col-form-label">Label</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="label" name="label"
                                        value="{{ old('label') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="adr" class="col-sm-2 col-form-label">Adresse</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="adr" name="adr"
                                        value="{{ old('adr') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pays" class="col-sm-2 col-form-label">Pays</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="pays" name="codePays">
                                        <option value="" selected>Veuiller selectionner un pays</option>
                                        @foreach ($pays as $dat)
                                            <option value="{{ $dat->code }}">
                                                {{ $dat->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <table id="example" class="table table-striped nowrap caption-top " style="width:100%!important">
        <caption>Liste des Repex dans la database</caption>
        <thead class=" bg-dark">
            <tr>
                <th>Pays</th>
                <th>label</th>
                <th>Adresse</th>
                <th>email</th>
                <th>Site Web</th>
                <th>Juridication</th>
                @if ($us->role === 1)
                    <th>Modifier</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($repex as $dat)
                <tr>
                    <td>{{ $dat->pays?->nom }}</td>
                    <td>{{ $dat->label }}</td>
                    <td> {{ $dat->adr }} </td>
                    <td>{{ $dat->email !== null || $dat->email === ' ' ? $dat->email : `Pas encore d'adresse mail` }}</td>
                    <td> {{ $dat->site !== null ? $dat->site : 'Pas encore de site' }} </td>
                    <th>
                        <p>
                            @foreach ($dat->juridiction as $pa)
                                {{ $pa?->pays?->nom }} @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </th>
                    @if ($us->role === 1)
                        <td>
                            <a href="{{ route('settingBack.repex.edit', $dat->id) }}" class="btn btn-primary">Modifier</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
