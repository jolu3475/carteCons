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

@section('user')

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
                    <td>{{ $dat->juridiction?->repex_id }}</td>
                    @if ($us->role === 1)
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle='modal'
                                data-bs-target="#modal">Supprimer</button>
                            <div class="modal fade" id="modal"data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Supprimer
                                                {{ $dat->name }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Vouller-vous vraiment supprimer {{ $dat->nom }} ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <form action="" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" value='{{ $dat->id }}'
                                                    name="id">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
