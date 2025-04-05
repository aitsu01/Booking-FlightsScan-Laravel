<x-layout>
<div class="container">
    <h1>Crea Nuovo Volo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.flights.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="airline_id">Compagnia Aerea:</label>
            <select name="airline_id" id="airline_id" class="form-control" required>
                <option value="">-- Seleziona una compagnia --</option>
                @foreach($airlines as $airline)
                    <option value="{{ $airline->id }}">{{ $airline->nome_compagnia }}</option>
                @endforeach
            </select>
        </div>

        <!-- Altri campi per il volo, per esempio: -->
        <div class="form-group">
            <label for="aeroporto_partenza">Aeroporto di Partenza:</label>
            <input type="text" name="aeroporto_partenza" id="aeroporto_partenza" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="aeroporto_arrivo">Aeroporto di Arrivo:</label>
            <input type="text" name="aeroporto_arrivo" id="aeroporto_arrivo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_partenza">Data di Partenza:</label>
            <input type="date" name="data_partenza" id="data_partenza" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ora_partenza">Ora di Partenza:</label>
            <input type="time" name="ora_partenza" id="ora_partenza" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ora_arrivo">Ora di Arrivo:</label>
            <input type="time" name="ora_arrivo" id="ora_arrivo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prezzo_base">Prezzo Base (€):</label>
            <input type="number" step="0.01" name="prezzo_base" id="prezzo_base" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Salva Volo</button>
    </form>
</div>
</x-layout>
