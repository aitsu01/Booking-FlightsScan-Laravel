<x-layout>
<div class="container">
    <h1>Modifica Extra</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{ route('admin.extras.update', $extra->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome_extra">Nome Extra:</label>
            <input type="text" class="form-control" id="nome_extra" name="nome_extra" value="{{ $extra->nome_extra }}" required>
        </div>

        <!--<div class="form-group">
            <label for="prezzo">Prezzo (€):</label>
            <input type="number" step="0.01" class="form-control" id="prezzo" name="prezzo" value="{{ $extra->prezzo }}" required>
        </div>-->
        <div class="form-group">
            <label for="prezzo_extra">Prezzo (€):</label>
            <input type="number" step="0.01" class="form-control" id="prezzo_extra" name="prezzo_extra" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Aggiorna Extra</button>
    </form>
</div>
</x-layout>
