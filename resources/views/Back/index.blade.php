@extends('backOfiice')


@section('title', 'Dashboard')

@section('css')
    {{-- css pour datatables --}}
    <link rel="stylesheet" href={{ asset('datatables/css/dataTables.bootstrap5.css') }}>
    <link rel="stylesheet" href={{ asset('datatables/css/responsive.bootstrap5.css') }}>
@endsection


@section('content')
    <p class="p-5 h1 ">Graphique de donnée</p>

    <div class=" rounded-3 p-4 shadow bg-secondary-subtle">
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </div>

    <p class="p-5 h1">Mon Tableau de Bord</p>
    <div class=" rounded-3 p-5 shadow bg-secondary-subtle">

        <div class="container bg-dark-subtle rounded-3 p-3">

            <table id="example" class="table table-striped nowrap p-3 caption-top" style="width:100%">
                <caption>List of users</caption>
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Valider</th>
                        <th>Plus d'information</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->valider }}</td>
                            <td><a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">Voir</a></td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

        </div>

    </div>

    {{-- Le graphique --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>
    <script src={{ asset('js/dashboard.js') }}></script>

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
