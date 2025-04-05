@extends('layouts.app')

@section('content')
    <h2>Nuova Prenotazione</h2>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf

        <label>Seleziona un volo:</label>
        <select name="flight_id" required>
            <option value="">-- Seleziona un volo --</option>
            @foreach($flights as $flight)
                <option value="{{ $flight->id }}">
                    {{ $flight->aeroporto_partenza }} → {{ $flight->aeroporto_arrivo }} ({{ $flight->data_partenza }} - €{{ $flight->prezzo_base }})
                </option>
            @endforeach
        </select><br><br>

        <h4>Passeggeri</h4>
        <div id="passenger-section">
            <div class="passenger">
                <label>Nome:</label>
                <input type="text" name="passengers[0][nome]" required>

                <label>Cognome:</label>
                <input type="text" name="passengers[0][cognome]" required>

                <label>Data di nascita:</label>
                <input type="date" name="passengers[0][data_nascita]" required>
            </div>
        </div>

        <button type="button" onclick="addPassenger()">➕ Aggiungi passeggero</button><br><br>
        <h4>Servizi Extra</h4>
        @foreach(App\Models\Extra::all() as $extra)
        <div>
        <label>
            <input type="checkbox" name="extras[{{ $extra->id }}][checked]" value="1">
            {{ $extra->nome_extra }} (€{{ $extra->prezzo }})
        </label>

        <label>Quantità:</label>
        <input type="number" name="extras[{{ $extra->id }}][quantità]" value="1" min="1" style="width: 60px;">
        </div>
        @endforeach


        <button type="submit">💾 Conferma Prenotazione</button>
    </form>

    <a href="{{ route('bookings.index') }}">⬅️ Torna alle prenotazioni</a>

    <script>
        let index = 1;
        function addPassenger() {
            const section = document.getElementById('passenger-section');
            const div = document.createElement('div');
            div.classList.add('passenger');
            div.innerHTML = `
                <label>Nome:</label>
                <input type="text" name="passengers[${index}][nome]" required>

                <label>Cognome:</label>
                <input type="text" name="passengers[${index}][cognome]" required>

                <label>Data di nascita:</label>
                <input type="date" name="passengers[${index}][data_nascita]" required>
                <br><br>
            `;
            section.appendChild(div);
            index++;
        }
    </script>
@endsection
