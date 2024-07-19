@extends('Back.params')

@section('title', 'Gestion des Pays')

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

@endsection

{{-- @dd($pays->first()) --}}

@section('user')

    @session('success')
        <div class="alert alert-success">{{ session('success') }}</div>
    @endsession
    @error('code')
        <div class="alert alert-warning">{{ $message }} </div>
    @enderror
    @error('nom')
        <div class="alert alert-warning">{{ $message }} </div>
    @enderror
    @error('indicatif')
        <div class="alert alert-warning">{{ $message }} </div>
    @enderror

    @if ($us->role === 1)
        <div class="row">
            <p class="col">Créer un nouveau Pays</p>
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-primary text-end" data-bs-toggle="modal"
                    data-bs-target="#modalDel">Créer</button>
            </div>
        </div>
        <div class="modal fade" id="modalDel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Créer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('settingBack.pays.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-3">Créer un nouveau Pays</div>
                            <div class="row mb-3">
                                <label for="label" class="col-sm-2 col-form-label">Code du Pays</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code" name="code"
                                        value="{{ old('code') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="adr" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom" name="nom"
                                        value="{{ old('nom') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Indicatif</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="indicatif" name="indicatif"
                                        value="{{ old('indicatif') }}">
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

    <table id="example" class="table table-striped nowrap p-3 caption-top" style="width:100%">
        <caption>Liste des Pays dans le database</caption>
        <thead class=" bg-dark">
            <tr>
                <th>Code Pays</th>
                <th>Nom</th>
                <th>indicatif telephonique</th>
                <th>Sous la Juridiction</th>
                @if ($us->role === 1)
                    <th>Suprimer</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($pays as $dat)
                <tr>
                    <td>{{ $dat->code }}</td>
                    <td>{{ $dat->nom }}</td>
                    <td>{{ $dat->indicatif }}</td>
                    @php
                        $test = 0;
                    @endphp
                    @foreach ($juridictions as $juri)
                        @if ($juri->codePays === $dat->code)
                            @php
                                $test = 1;
                            @endphp
                            <td>{{ $juri->repex?->label }}</td>
                        @endif
                        @if ($juridictions->last() === $juri && $test === 0)
                            <td>Aucune Juridictions</td>
                        @endif
                    @endforeach
                    @if ($us->role === 1)
                        <td>
                            <a type="submit" class="btn btn-primary"
                                href="{{ route('settingBack.pays.edit', $dat->code) }}">Modifier</a>

                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
