<x-layout>
<div class="container">
    <h1>Prenota il Volo</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Dettagli Volo</h5>
            <p><strong>ID:</strong> {{ $flight->id }}</p>
            <p><strong>Aeroporto Partenza:</strong> {{ $flight->aeroporto_partenza }}</p>
            <p><strong>Aeroporto Arrivo:</strong> {{ $flight->aeroporto_arrivo }}</p>
            <p><strong>Data Partenza:</strong> {{ $flight->data_partenza }}</p>
        </div>
    </div>

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <input type="hidden" name="flight_id" value="{{ $flight->id }}">

       
        <div class="form-group">
            <label for="nome">Nome Passeggero:</label>
            <input type="text" name="passengers[0][nome]" id="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cognome">Cognome Passeggero:</label>
            <input type="text" name="passengers[0][cognome]" id="cognome" class="form-control" required>
        </div>

        <div class="form-group">
    <label for="data_nascita">Data di Nascita:</label>
    <input type="date" class="form-control" name="passengers[0][data_nascita]" id="data_nascita" required>
    </div>

    <!-- Sezione per gli extra -->
    <h3>Seleziona Extra</h3>
        @foreach($extras as $extra)
            <div class="form-group">
                <label>
                    <input type="checkbox" name="extras[{{ $extra->id }}][checked]" value="1">
                    {{ $extra->nome_extra }} ({{ $extra->prezzo_extra }} €)
                </label>
                <input type="number" name="extras[{{ $extra->id }}][quantità]" value="1" min="1" class="form-control" style="width:100px; display:inline-block;">
            </div>
        @endforeach

        


        <button type="submit" class="btn btn-primary mt-2">Conferma Prenotazione</button>
    </form>
</div>
</x-layout>

