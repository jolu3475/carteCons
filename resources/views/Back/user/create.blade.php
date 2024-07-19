@extends('backOfiice')

@section('title', 'Gestion utilisateur')

@section('css')



@endsection

@section('content')

    <p class="my-5 p-2 rounded h1 border border-primary-subtle">Creation d'utilisateur</p>

    <div class=" rounded-3 p-5 shadow bg-info-subtle text-info-emphasis">

        <div class="container bg-transparent text-body border border-primary-subtle rounded-3 p-3">

            <form action="" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Adresse email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="email" name="email"
                            value={{ old('email', session('email')) }}>
                    </div>
                </div>
                @error('email')
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-solid fa-triangle-exclamation"></i>
                    {{ ' ' . $message }}
                </div>
                @enderror

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>

        </div>

    </div>

@endsection
