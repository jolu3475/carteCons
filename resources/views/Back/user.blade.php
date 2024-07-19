@extends('backOfiice')

@section('title', 'Gestion utilisateur')

@section('css')

    {{-- css pour datatables --}}
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/responsive.bootstrap5.css') }}">

@endsection

@section('content')

    @session('success')
        <div class='alert alert-info my-5'>
            {{ session('success') }}
        </div>
    @endsession
    @session('error')
        <div class='alert alert-danger my-5'>
            {{ session('error') }}
        </div>
    @endsession

    <p class="my-5 p-2 rounded h1 border border-primary-subtle">Gestion d'utilisateur</p>

    <div class=" rounded-3 p-5 shadow bg-info-subtle text-info-emphasis">
        <div class="container bg-transparent text-body border border-primary-subtle rounded-3 p-3">

            <div class="modal fade modal-lg" id="staticBack" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Creer un nouvelle utilisateur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('back.createUsr') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-2 col-form-label">Adresse email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="email"
                                            name="email" value={{ old('email', session('email')) }}>
                                    </div>
                                </div>
                                @session('status')
                                @endsession
                                <div class="row mb-3">
                                    <label for="inputPa" class="col-sm-2 col-form-label">Pays actuelle</label>
                                    <div class="col-sm-8">
                                        <select id="country" class='form-select' name="repex_id"
                                            selected={{ old('codePays', session('codePays')) }}>
                                            @foreach ($pays as $code)
                                                <option value="{{ $code->id }}">
                                                    {{ $code->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" type='submit' name='valider'>Créer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if ($user->role === 1)
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <p class="me-md-2 py-auto" type="button">Créer un nouvelle utilisateur</p>
                    <button class="btn btn-primary" type='button' name='refuser' data-bs-toggle="modal"
                        data-bs-target="#staticBack">Creer</button>
                </div>
            @endif

            <table id="example" class="table table-striped nowrap p-3 caption-top" style="width:100%">
                <caption>Liste des Administrateur</caption>
                <thead class=" bg-dark">
                    <tr>
                        <th>Username</th>
                        <th>Repex</th>
                        <th>email</th>
                        <th>Date de creation</th>
                        <th>Activer</th>
                        <th>Date d'activation</th>
                        @if ($user->role === 1)
                            <th>Suprimer</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dat)
                        <tr>
                            <td>{{ $dat->name }}</td>
                            <td>{{ $dat->repex_id }}</td>
                            <td>{{ $dat->email }}</td>
                            <td>{{ $dat->created_at }}</td>
                            <td>
                                @if ($dat->email_verified_at !== null)
                                    <span class="badge bg-success">Activer</span>
                                @else
                                    <span class="badge bg-danger">Pas encore</span>
                                @endif
                            </td>
                            <td>
                                @if ($dat->email_verified_at !== null)
                                    {{ $dat->email_verified_at }}
                                @else
                                    Pas encore activer
                                @endif
                            </td>
                            @if ($user->role === 1)
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
                                                    Vouller-vous vraiment le supprimer ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                    <form action="" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"
                                                            value='{{ $dat->id }}' name="id">Supprimer</button>
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
