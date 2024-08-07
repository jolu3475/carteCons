<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <div class="row">
        <div class="col-md-3">
            <label for="pays">Pays: </label>
            <select name="pays" id="pays" class="form-control">
                @foreach ($pays as $pa)
                    <option value="{{ $pa->id }}"> {{ $pa->nom }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="from">De</label>
            <input type="date" name="from" id="from" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="to">à</label>
            <input type="date" name="to" id="to" class="form-control">
        </div>
        <div class="col-md-3">
            <input type="button" value="filtrer" class="btn btn-success" onclick="getData()">
        </div>
    </div>
</div>
