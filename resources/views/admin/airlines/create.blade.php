<x-layout>
<div class="container">
    <h1>Aggiungi Nuova Compagnia Aerea</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{ route('admin.airlines.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome_compagnia">Nome Compagnia:</label>
            <input type="text" class="form-control" id="nome_compagnia" name="nome_compagnia" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Salva Compagnia</button>
    </form>
</div>
</x-layout>
