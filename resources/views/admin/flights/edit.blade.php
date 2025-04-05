<x-layout>


<div class="container">
    <h1>Modifica Volo</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{ route('admin.flights.update', $flight->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="airline_id">Compagnia Aerea:</label>
            <select class="form-control" name="airline_id" id="airline_id" required>
                @foreach($airlines as $airline)
                    <option value="{{ $airline->id }}" {{ $flight->airline_id == $airline->id ? 'selected' : '' }}>
                        {{ $airline->nome_compagnia }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="aeroporto_partenza">Aeroporto di Partenza:</label>
            <input type="text" class="form-control" name="aeroporto_partenza" id="aeroporto_partenza" value="{{ $flight->aeroporto_partenza }}" required>
        </div>

        <div class="form-group">
            <label for="aeroporto_arrivo">Aeroporto di Arrivo:</label>
            <input type="text" class="form-control" name="aeroporto_arrivo" id="aeroporto_arrivo" value="{{ $flight->aeroporto_arrivo }}" required>
        </div>

        <div class="form-group">
            <label for="data_partenza">Data di Partenza:</label>
            <input type="date" class="form-control" name="data_partenza" id="data_partenza" value="{{ $flight->data_partenza }}" required>
        </div>

        <div class="form-group">
            <label for="ora_partenza">Ora di Partenza:</label>
            <input type="time" class="form-control" name="ora_partenza" id="ora_partenza" value="{{ $flight->ora_partenza }}" required>
        </div>

        <div class="form-group">
            <label for="ora_arrivo">Ora di Arrivo:</label>
            <input type="time" class="form-control" name="ora_arrivo" id="ora_arrivo" value="{{ $flight->ora_arrivo }}" required>
        </div>

        <div class="form-group">
            <label for="prezzo_base">Prezzo Base (€):</label>
            <input type="number" step="0.01" class="form-control" name="prezzo_base" id="prezzo_base" value="{{ $flight->prezzo_base }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Aggiorna Volo</button>
    </form>
</div>
</x-layout>
