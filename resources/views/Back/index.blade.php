@extends('backOfiice')


@section('title', 'Dashboard')

@section('css')
    {{-- css pour datatables --}}
    <link rel="stylesheet" href={{ asset('datatables/css/dataTables.bootstrap5.css') }}>
    <link rel="stylesheet" href={{ asset('datatables/css/responsive.bootstrap5.css') }}>
@endsection


@section('content')
    <p class="my-5 p-2 rounded h1 border border-primary-subtle">Graphique de donnée</p>

    <div class=" rounded-3 p-4 shadow bg-info-subtle text-info-emphasis">
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </div>

    <p class="my-5 p-2 rounded h1 border border-primary-subtle">Mon Tableau de Bord</p>
    <div class=" rounded-3 p-5 shadow bg-info-subtle text-info-emphasis">

        <div class="container bg-transparent text-body border border-primary-subtle rounded-3 p-3">

            <table id="example" class="table table-striped nowrap p-3 caption-top" style="width:100%">
                <caption>Liste des cartes reçus</caption>
                <thead class=" bg-dark">
                    <tr>
                        <th>Numero Carte</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Valider</th>
                        <th>Date d'envoye</th>
                        <th>Plus d'information</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                        <tr>
                            <td>{{ $user->numero }}</td>
                            <td>{{ $user->regular()->get('nom')->first()->nom }}</td>
                            <td>{{ $user->regular()->get('prenom')->first()->prenom }}</td>
                            <td>
                                @if ($user->valide == 1)
                                    <span class="badge bg-success">Valider</span>
                                @else
                                    <span class="badge bg-danger">Non Valider</span>
                                @endif
                            </td>
                            <td>{{ $user->updated_at }}</td>
                            <td><a href="{{ route('back.show', ['carte' => $user->id, 'user' => $user->regularId]) }}"
                                    class="btn btn-primary">Voir</a></td>
                        </tr>
                    @endforeach
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
