@extends('backOfiice')


@section('title', 'Refus de donnée')

@section('content')
    <p class="my-5 p-2 rounded h1 border border-primary-subtle">La raison du refus</p>

    <div class=" rounded-3 p-5 shadow bg-info-subtle text-info-emphasis">

        <div class="container bg-transparent text-body border border-primary-subtle rounded-3 p-3">
            <form action="{{ route('back.refuserSend') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="Raison" class="col-sm-2 col-form-label">La raison</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="Raison" name="Raison" value=''></textarea>
                    </div>
                </div>
                @error('Raison')
                    <div class="alert alert-warning" role="alert">
                        <i class="fas fa-solid fa-triangle-exclamation"></i>
                        {{ ' ' . $message }}
                    </div>
                @enderror

                <div class="row">

                    <div class="col">
                        <a class="btn btn-primary"
                            href="{{ route('back.show', ['carte' => $data->id, 'user' => $data->id]) }}"
                            name='precedent'>Précédent</a>
                    </div>

                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success" type='submit' name='valider'
                            value="{{ $data->id }}">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
