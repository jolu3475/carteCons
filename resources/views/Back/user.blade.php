@extends('backOfiice')

@section('title', 'Gestion utilisateur')

@section('content')

    <p class="my-5 p-2 rounded h1 border border-primary-subtle">Gestion d'utilisateur</p>

    <div class=" rounded-3 p-5 shadow bg-info-subtle text-info-emphasis">

        <div class="container bg-transparent text-body border border-primary-subtle rounded-3 p-3">

            <table id="example" class="table table-striped nowrap p-3 caption-top" style="width:100%">
                <caption>Liste des Administrateur</caption>
                <thead class=" bg-dark">
                    <tr>
                        <th>Username</th>
                        <th>email</th>
                        <th>sudo</th>
                        <th>Editer</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->valider }}</td>
                            <td>{{ $user->update_at }}</td>
                            <td><a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">Voir</a></td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

        </div>

    </div>

    {{-- call of the js --}}
    <script src={{ asset('jquery/jquery-3.7.1.min.js') }}></script>
    <script src={{ asset('datatables/js/dataTables.js') }}></script>
    <script src={{ asset('datatables/js/dataTables.bootstrap5.js') }}></script>
    <script src={{ asset('datatables/js/dataTables.responsive.js') }}></script>
    <script src={{ asset('datatables/js/responsive.bootstrap5.js') }}></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "language": {
                    "url": "{{ asset('datatables/langue/fr_fr.json') }}",
                },
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50, 100],
                "order": [
                    [0, "asc"]
                ],
                "searching": true,
                "paging": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });

            // Fonction pour recréer DataTables sur redimensionnement
            function resizeDataTable() {
                if ($.fn.DataTable.isDataTable('#example')) {
                    table.destroy(); // Détruit l'instance actuelle de DataTables
                }
                table = $('#example').DataTable({
                    "language": {
                        "url": "{{ asset('datatables/langue/fr_fr.json') }}",
                    },
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50, 100],
                    "order": [
                        [0, "asc"]
                    ],
                    "searching": true,
                    "paging": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true
                });
            }

            // Écouteur d'événement de redimensionnement de la fenêtre
            $(window).resize(function() {
                resizeDataTable();
            });

            // Assurez-vous d'initialiser DataTables au démarrage
            resizeDataTable();
        });
    </script>

@endsection
