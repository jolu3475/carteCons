@extends('backOfiice')

@section('title', 'Gestion utilisateur')

@section('css')

    {{-- css pour datatables --}}
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/responsive.bootstrap5.css') }}">

@endsection

@section('content')

    <p class="my-5 p-2 rounded h1 border border-primary-subtle">Gestion d'utilisateur</p>

    <div class=" rounded-3 p-5 shadow bg-info-subtle text-info-emphasis">

        <div class="container bg-transparent text-body border border-primary-subtle rounded-3 p-3">

            @if ($user->role === 1)
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <p class="me-md-2 py-auto" type="button">Créer un nouvelle utilisateur</p>
                    <a class="btn btn-primary" type="button" href="{{ route('back.create') }}">Créer</a>
                </div>
            @endif

            <table id="example" class="table table-striped nowrap p-3 caption-top" style="width:100%">
                <caption>Liste des Administrateur</caption>
                <thead class=" bg-dark">
                    <tr>
                        <th>Username</th>
                        <th>email</th>
                        <th>Activer</th>
                        @if ($user->role === 1)
                            <th>Suprimer</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dat)
                        <tr>
                            <td>{{ $dat->name }}</td>
                            <td>{{ $dat->email }}</td>
                            <td>
                                @if ($dat->email_verified_at !== null)
                                    <span class="badge bg-success">Activer</span>
                                @else
                                    <span class="badge bg-danger">Pas encore</span>
                                @endif
                            </td>
                            @if ($user->role === 1)
                                <td>
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

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
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>

@endsection
