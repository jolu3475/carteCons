@extends('backOfiice')


@section('title', 'Dashboard')

@section('css')
    {{-- css pour datatables --}}
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap5.css') }}">
    <style>
        table.dataTable tbody td {
            white-space: normal !important;
            /* Permet au texte de passer à la ligne suivante */
            vertical-align: top !important;
            /* Alignement vertical au top pour une meilleure lisibilité */
        }
    </style>

    {{-- call of the js --}}
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('datatables/js/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('datatables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('datatables/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('datatables/js/buttons.html5.min.js') }}"></script>
@endsection


@section('content')

    @session('success')
        <div class='alert alert-info my-4'>
            {{ session('success') }}
        </div>
    @endsession

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
                        <th>Pays</th>
                        <th>Verifier</th>
                        <th>Date d'envoye</th>
                        <th>Plus d'information</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                        <tr>
                            <td>{{ $user->carte?->numero }}</td>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>
                                @if ($user->carte?->valide == 1)
                                    <span class="badge bg-success">Valider</span>
                                @else
                                    <span class="badge bg-danger">Non Valider</span>
                                @endif
                            </td>
                            <td>
                                {{ $user->pays?->nom }}

                            </td>
                            <td>
                                @if ($user->carte?->vu === 1)
                                    <span class="badge bg-success">Verifier</span>
                                @else
                                    <span class="badge bg-danger">Non Verifier</span>
                                @endif
                            </td>
                            <td>{{ $user->updated_at }}</td>
                            <td><a href="{{ route('back.show', ['user' => $user->id]) }}" class="btn btn-primary">Voir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    {{-- Le graphique --}}
    <script src="{{ asset('Chart/chart.umd.js') }}"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>
    <script src={{ asset('js/dashboard.js') }}></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Blfrtip', // Configurez ici selon vos besoins
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
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
                "buttons": {
                    "dom": {
                        "button": {
                            "className": 'btn btn-outline-secondary my-2' // Ajoutez la classe Bootstrap aux boutons
                        }
                    }
                }
            });
        });
    </script>

@endsection
