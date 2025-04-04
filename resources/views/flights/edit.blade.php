@extends('layouts.app')

@section('content')
    <h2>Modifica Volo</h2>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('flights.update', $flight) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Compagnia Aerea:</label>
        <select name="airline_id" required>
            @foreach($airlines as $airline)
                <option value="{{ $airline->id }}" {{ $flight->airline_id == $airline->id ? 'selected' : '' }}>
                    {{ $airline->nome_compagnia }}
                </option>
            @endforeach
        </select><br>

        <label>Aeroporto Partenza:</label>
        <input type="text" name="aeroporto_partenza" value="{{ $flight->aeroporto_partenza }}" required><br>

        <label>Aeroporto Arrivo:</label>
        <input type="text" name="aeroporto_arrivo" value="{{ $flight->aeroporto_arrivo }}" required><br>

        <label>Data Partenza:</label>
        <input type="date" name="data_partenza" value="{{ $flight->data_partenza }}" required><br>

        <label>Ora Partenza:</label>
        <input type="time" name="ora_partenza" value="{{ $flight->ora_partenza }}" required><br>

        <label>Ora Arrivo:</label>
        <input type="time" name="ora_arrivo" value="{{ $flight->ora_arrivo }}" required><br>

        <label>Prezzo Base (€):</label>
        <input type="number" name="prezzo_base" step="0.01" value="{{ $flight->prezzo_base }}" required><br><br>

        <button type="submit">💾 Aggiorna Volo</button>
    </form>

    <a href="{{ route('flights.index') }}">⬅️ Torna all'elenco voli</a>
@endsection
